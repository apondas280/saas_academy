<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CurriculumController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
        ]);

        $section            = new Section();
        $section->title     = $request->title;
        $section->user_id   = auth()->user()->id;
        $section->course_id = $request->course_id;
        $done               = $section->save();
        Session::flash('success', get_phrase('Section added successfully'));
        return redirect()->back();
    }

    public function update(Request $request)
    {

        Section::where('id', $request->section_id)->update(['title' => $request->up_title]);
        Session::flash('success', get_phrase('update successfully'));
        return redirect()->back();
    }

    public function delete($id)
    {

        Section::where('id', $id)->delete();
        Session::flash('success', get_phrase('Delete successfully'));
        return redirect()->back();
    }

    public function section_sort(Request $request)
    {
        $sections = json_decode($request->itemJSON);
        foreach ($sections as $key => $value) {
            $updater = $key + 1;
            Section::where('id', $value)->update(['sort' => $updater]);
        }

        Session::flash('success', get_phrase('Sections sorted successfully'));
    }

    public function lesson_store(Request $request)
    {


        $data['title']       = $request->title;
        $data['user_id']     = auth()->user()->id;
        $data['course_id']   = $request->course_id;
        $data['section_id']  = $request->section_id;
        $data['is_free']     = $request->free_lesson;
        $data['lesson_type'] = $request->lesson_type;
        $data['summary']     = $request->summary;
        if ($request->lesson_type == 'text') {
            $data['attachment']      = $request->text_description;
            $data['attachment_type'] = $request->lesson_provider;
        } elseif ($request->lesson_type == 'video-url') {

            $data['video_type'] = $request->lesson_provider;
            $data['lesson_src'] = $request->lesson_src;
            $duration_formatter = explode(':', $request->duration);
            $hour               = sprintf('%02d', $duration_formatter[0]);
            $min                = sprintf('%02d', $duration_formatter[1]);
            $sec                = sprintf('%02d', $duration_formatter[2]);
            $data['duration']   = $hour . ':' . $min . ':' . $sec;
        } elseif ($request->lesson_type == 'html5') {

            $data['video_type'] = $request->lesson_provider;
            $data['lesson_src'] = $request->lesson_src;
            $duration_formatter = explode(':', $request->duration);
            $hour               = sprintf('%02d', $duration_formatter[0]);
            $min                = sprintf('%02d', $duration_formatter[1]);
            $sec                = sprintf('%02d', $duration_formatter[2]);
            $data['duration']   = $hour . ':' . $min . ':' . $sec;
        } elseif ($request->lesson_type == 'document_type') {

            if ($request->attachment == '') {
                $file = '';
            } else {
                $item      = $request->file('attachment');
                $file_name = strtotime('now') . random(4) . '.' . $item->getClientOriginalExtension();

                $path = public_path('assets/upload/lesson_file/attachment');
                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                } else {
                    $item->move(public_path('assets/upload/lesson_file/attachment/'), $file_name);
                }
                $file = $file_name;
            }
            $data['attachment']      = $file;
            $data['attachment_type'] = $request->attachment_type;
        } elseif ($request->lesson_type == 'image') {

            if ($request->attachment == '') {
                $file = '';
            } else {
                $item      = $request->file('attachment');
                $file_name = strtotime('now') . random(4) . '.' . $item->getClientOriginalExtension();

                $path = public_path('assets/upload/lesson_file/attachment');
                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                } else {
                    $item->move(public_path('assets/upload/lesson_file/attachment/'), $file_name);
                }
                $file = $file_name;
            }
            $data['attachment']      = $file;
            $data['attachment_type'] = $item->getClientOriginalExtension();
        } elseif ($request->lesson_type == 'vimeo-url') {

            $data['video_type'] = $request->lesson_provider;
            $data['lesson_src'] = $request->lesson_src;
            $duration_formatter = explode(':', $request->duration);
            $hour               = sprintf('%02d', $duration_formatter[0]);
            $min                = sprintf('%02d', $duration_formatter[1]);
            $sec                = sprintf('%02d', $duration_formatter[2]);
            $data['duration']   = $hour . ':' . $min . ':' . $sec;
        } elseif ($request->lesson_type == 'iframe') {

            $data['lesson_src'] = $request->iframe_source;
        } elseif ($request->lesson_type == 'google_drive') {

            $data['video_type'] = $request->lesson_provider;
            $data['lesson_src'] = $request->lesson_src;
            $duration_formatter = explode(':', $request->duration);
            $hour               = sprintf('%02d', $duration_formatter[0]);
            $min                = sprintf('%02d', $duration_formatter[1]);
            $sec                = sprintf('%02d', $duration_formatter[2]);
            $data['duration']   = $hour . ':' . $min . ':' . $sec;
        } elseif ($request->lesson_type == 'system-video') {

            if ($request->system_video_file == '') {
                $file = '';
            } else {
                $item      = $request->file('system_video_file');
                $file_name = strtotime('now') . random(4) . '.' . $item->getClientOriginalExtension();

                $path = public_path('assets/upload/lesson_file/videos');
                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                } else {
                    $item->move(public_path('assets/upload/lesson_file/videos/'), $file_name);
                }
                $file = $file_name;
            }

            $data['video_type'] = $request->lesson_provider;
            $data['lesson_src'] = $file;
            $duration_formatter = explode(':', $request->duration);
            $hour               = sprintf('%02d', $duration_formatter[0]);
            $min                = sprintf('%02d', $duration_formatter[1]);
            $sec                = sprintf('%02d', $duration_formatter[2]);
            $data['duration']   = $hour . ':' . $min . ':' . $sec;
        }

        Lesson::insert($data);
        Session::flash('success', get_phrase('lesson added successfully'));
        return redirect()->back();
    }

    public function lesson_sort(Request $request)
    {
        $lessons = json_decode($request->itemJSON);
        foreach ($lessons as $key => $value) {
            $updater = $key + 1;
            Lesson::where('id', $value)->update(['sort' => $updater]);
        }
        Session::flash('success', get_phrase('Lessons sorted successfully'));
    }

    public function lesson_edit(Request $request)
    {

        $lesson['title']      = $request->title;
        $lesson['section_id'] = $request->section_id;
        $lesson['summary']    = $request->summary;
        if ($request->lesson_type == 'text') {
            $lesson['description'] = $request->text_description;
        } elseif ($request->lesson_type == 'video-url') {
            $lesson['lesson_src'] = $request->lesson_src;
            $duration_formatter   = explode(':', $request->duration);
            $hour                 = sprintf('%02d', $duration_formatter[0]);
            $min                  = sprintf('%02d', $duration_formatter[1]);
            $sec                  = sprintf('%02d', $duration_formatter[2]);
            $lesson['duration']   = $hour . ':' . $min . ':' . $sec;
        } elseif ($request->lesson_type == 'html5') {
            $lesson['lesson_src'] = $request->lesson_src;
            $duration_formatter   = explode(':', $request->duration);
            $hour                 = sprintf('%02d', $duration_formatter[0]);
            $min                  = sprintf('%02d', $duration_formatter[1]);
            $sec                  = sprintf('%02d', $duration_formatter[2]);
            $lesson['duration']   = $hour . ':' . $min . ':' . $sec;
        } elseif ($request->lesson_type == 'document_type') {

            if ($request->attachment == '') {
                $file = '';
            } else {
                $item      = $request->file('attachment');
                $file_name = strtotime('now') . random(4) . '.' . $item->getClientOriginalExtension();

                $path = public_path('assets/upload/lesson_file/attachment');
                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                } else {
                    $item->move(public_path('assets/upload/lesson_file/attachment/'), $file_name);
                }
                $file = $file_name;
            }
            $lesson['attachment']      = $file;
            $lesson['attachment_type'] = $request->attachment_type;
        } elseif ($request->lesson_type == 'image') {

            if ($request->attachment == '') {
                $file = '';
            } else {
                $item      = $request->file('attachment');
                $file_name = strtotime('now') . random(4) . '.' . $item->getClientOriginalExtension();

                $path = public_path('assets/upload/lesson_file/attachment');
                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                } else {
                    $item->move(public_path('assets/upload/lesson_file/attachment/'), $file_name);
                }
                $file = $file_name;
            }
            $lesson['attachment']      = $file;
            $lesson['attachment_type'] = $item->getClientOriginalExtension();
        } elseif ($request->lesson_type == 'vimeo-url') {
            $lesson['lesson_src'] = $request->lesson_src;
            $duration_formatter   = explode(':', $request->duration);
            $hour                 = sprintf('%02d', $duration_formatter[0]);
            $min                  = sprintf('%02d', $duration_formatter[1]);
            $sec                  = sprintf('%02d', $duration_formatter[2]);
            $lesson['duration']   = $hour . ':' . $min . ':' . $sec;
        } elseif ($request->lesson_type == 'iframe') {
            $lesson['lesson_src'] = $request->iframe_source;
        } elseif ($request->lesson_type == 'google_drive') {
            $lesson['lesson_src'] = $request->lesson_src;
            $duration_formatter   = explode(':', $request->duration);
            $hour                 = sprintf('%02d', $duration_formatter[0]);
            $min                  = sprintf('%02d', $duration_formatter[1]);
            $sec                  = sprintf('%02d', $duration_formatter[2]);
            $lesson['duration']   = $hour . ':' . $min . ':' . $sec;
        } elseif ($request->lesson_type == 'system-video') {

            if ($request->system_video_file == '') {
                $file = '';
            } else {
                $item      = $request->file('system_video_file');
                $file_name = strtotime('now') . random(4) . '.' . $item->getClientOriginalExtension();

                $path = public_path('assets/upload/lesson_file/videos');
                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                } else {
                    $item->move(public_path('assets/upload/lesson_file/videos/'), $file_name);
                }
                $file = $file_name;
            }

            $lesson['lesson_src'] = $file;
            $duration_formatter   = explode(':', $request->duration);
            $hour                 = sprintf('%02d', $duration_formatter[0]);
            $min                  = sprintf('%02d', $duration_formatter[1]);
            $sec                  = sprintf('%02d', $duration_formatter[2]);
            $lesson['duration']   = $hour . ':' . $min . ':' . $sec;
        }

        Lesson::where('id', $request->id)->update($lesson);
        Session::flash('success', get_phrase('lesson update successfully'));
        return redirect()->back();
    }

    public function lesson_delete($id)
    {
        Lesson::where('id', $id)->delete();
        Session::flash('success', get_phrase('Delete successfully'));
        return redirect()->back();
    }

    // quiz
    public function quiz_store(Request $request)
    {
        $rules = [
            'title'      => 'required',
            'section_id' => 'required',
            'total_mark' => 'required',
            'pass_mark'  => 'required',
            'hour'       => 'required_without:minute|min:1|max:24',
            'minute'     => 'required_without:hour|min:1|max:59',
            'drip_rule'  => 'required',
        ];
        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $hour     = $request->hour ?? 0;
        $minute   = $request->minute ?? 0;
        $duration = ['hour' => $hour, 'minute' => $minute];

        $quiz['user_id']    = auth()->user()->id;
        $quiz['title']      = $request->title;
        $quiz['section_id'] = $request->section_id;
        $quiz['total_mark'] = $request->total_mark;
        $quiz['pass_mark']  = $request->pass_mark;
        $quiz['duration']   = json_encode($duration);
        $quiz['drip_rule']  = $request->drip_rule;
        $quiz['summary']    = $request->summary;

        Quiz::insert($quiz);

        Session::flash('success', get_phrase('Quiz added successfully.'));
        return redirect()->back();
    }

    public function quiz_update(Request $request, $id)
    {
        $quiz = Quiz::where('id', $id)->where('user_id', auth()->user()->id);
        if ($quiz->doesntExist()) {
            Session::flash('error', get_phrase('Data not found.'));
            return redirect()->back();
        }

        $rules = [
            'title'      => 'required',
            'section_id' => 'required',
            'total_mark' => 'required',
            'pass_mark'  => 'required',
            'hour'       => 'required_without:minute|min:1|max:24',
            'minute'     => 'required_without:hour|min:1|max:59',
            'drip_rule'  => 'required',
        ];
        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $hour     = $request->hour ?? 0;
        $minute   = $request->minute ?? 0;
        $duration = ['hour' => $hour, 'minute' => $minute];

        $data['title']      = $request->title;
        $data['section_id'] = $request->section_id;
        $data['total_mark'] = $request->total_mark;
        $data['pass_mark']  = $request->pass_mark;
        $data['duration']   = json_encode($duration);
        $data['drip_rule']  = $request->drip_rule;
        $data['summary']    = $request->summary;

        $quiz->update($data);

        Session::flash('success', get_phrase('Quiz updated successfully.'));
        return redirect()->back();
    }

    public function quiz_delete($id)
    {
        $quiz = Quiz::where('id', $id)->where('user_id', auth()->user()->id);
        if ($quiz->doesntExist()) {
            Session::flash('error', get_phrase('Data not found.'));
            return redirect()->back();
        }
        $quiz->delete();

        Session::flash('success', get_phrase('Quiz deleted successfully.'));
        return redirect()->back();
    }
}
