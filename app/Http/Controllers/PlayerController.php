<?php

namespace App\Http\Controllers;

use App\Models\BootcampPurchase;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Forum;
use App\Models\Lesson;
use App\Models\Watch_history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlayerController extends Controller
{
    public function course_player(Request $request, $company = "", $slug, $id = '')
    {
        $course = Course::where('slug', $slug)->first();

        // check if course is paid
        if ($course->is_paid && auth()->user()->role != 'admin') {
            $enrollment = Enrollment::where('course_id', $course->id)->where('user_id', auth()->user()->id)->first();
            if (! $enrollment) {
                if (auth()->user()->role == 'instructor' && $course->user_id != auth()->user()->id) {
                    Session::flash('error', get_phrase('Not valid instructor.'));
                    return redirect()->route('my.courses');
                }
                Session::flash('error', get_phrase('Not registered for this course.'));
                return redirect()->route('my.courses');
            }
        }

        $check_lesson_history = Watch_history::where('course_id', $course->id)
            ->where('student_id', auth()->user()->id)->first();
        $first_lesson_of_course = Lesson::where('course_id', $course->id)->orderBy('sort', 'asc')->value('id');
        if ($id == '') {
            $id = $check_lesson_history->watching_lesson_id ?? $first_lesson_of_course;
        }

        // if user has any watched history or not
        if (! $check_lesson_history && $id > 0) {
            $data = [
                'course_id'          => $course->id,
                'student_id'         => auth()->user()->id,
                'watching_lesson_id' => $id,
                'completed_lesson'   => json_encode([])
            ];
            Watch_history::insert($data);
        }

        // when user plays a lesson, update that lesson id as watch history
        if ($id > 0) {
            Watch_history::where('course_id', $course->id)
                ->where('student_id', auth()->user()->id)
                ->update(['watching_lesson_id' => $id]);
        }

        $page_data['course_details'] = $course;
        $page_data['lesson_details'] = Lesson::where('id', $id)->first();
        $page_data['history']        = Watch_history::where('course_id', $course->id)->where('student_id', auth()->user()->id)->first();

        $forum_query = Forum::join('users', 'forums.user_id', 'users.id')
            ->select('forums.*', 'users.name as user_name', 'users.photo as user_photo')
            ->latest('forums.id')
            ->where('forums.parent_id', 0)
            ->where('forums.course_id', $course->id);

        if (isset($_GET['search'])) {
            $forum_query->where(function ($query) use ($request) {
                $query->where('forums.title', 'like', '%' . $request->search . '%')->where('forums.description', 'like', '%' . $request->search . '%');
            });
        }

        $page_data['questions'] = $forum_query->get();
        return view('course_player.index', $page_data);
    }

    public function set_watch_history(Request $request)
    {
        $course     = Course::where('id', $request->course_id)->first();
        $enrollment = Enrollment::where('course_id', $course->id)->where('user_id', auth()->user()->id)->first();
        if (! ($enrollment && auth()->user()->role != 'admin' || ! is_course_instructor($course->id))) {
            Session::flash('error', get_phrase('Not registered for this course.'));
            return redirect()->back();
        }

        $data['course_id']  = $request->course_id;
        $data['student_id'] = auth()->user()->id;

        $total_lesson = Lesson::where('course_id', $request->course_id)->pluck('id')->toArray();

        $watch_history = Watch_history::where('course_id', $request->course_id)
            ->where('student_id', auth()->user()->id)->first();

        if (isset($watch_history)) {
            $lessons = (array) json_decode($watch_history->completed_lesson);
            if (! in_array($request->lesson_id, $lessons)) {
                array_push($lessons, $request->lesson_id);
            }
            $data['completed_lesson']   = json_encode($lessons);
            $data['watching_lesson_id'] = $request->lesson_id;
            $data['completed_date']     = (count($total_lesson) == count($lessons)) ? time() : null;
            Watch_history::where('course_id', $request->course_id)->where('student_id', auth()->user()->id)->update($data);
        } else {
            $lessons                    = [$request->lesson_id];
            $data['completed_lesson']   = json_encode($lessons);
            $data['watching_lesson_id'] = $request->lesson_id;
            $data['completed_date']     = (count($total_lesson) == count($lessons)) ? time() : null;
            Watch_history::insert($data);
        }
        return redirect()->back();
    }

    //Bootcamp

    public function bootcamp_player(Request $request, $company = "", $slug)
    {
        $page_data['bootcamp'] = BootcampPurchase::join('bootcamps', 'bootcamp_purchases.bootcamp_id', 'bootcamps.id')
            ->where('bootcamp_purchases.user_id', auth()->user()->id)
            ->where('bootcamp_purchases.status', 1)
            ->where('bootcamps.slug', $slug)
            ->select('bootcamps.*')->latest('id')->first();

        if (! $page_data['bootcamp']) {
            Session::flash('error', get_phrase('Data not found.'));
            return redirect()->back();
        }

        return view('bootcamp_player.index', $page_data);
    }
}