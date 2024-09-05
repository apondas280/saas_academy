<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\GroupTraining;
use App\Models\User;
use Illuminate\Http\Request;

class GroupTrainingController extends Controller
{
    public function index()
    {
        $page_data['users']             = User::count();
        $page_data['groups']            = Group::where('status', 1)->get();
        $page_data['courses']           = Course::where('status', 'active')->orWhere('status', 'private')->orderBy('title', 'asc')->get();
        $page_data['training_sessions'] = GroupTraining::paginate(20);

        return view('admin.private_group.training', $page_data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'group_id' => 'required',
            'courses'  => 'required|array',
        ]);

        $members = GroupMember::where('group_id', $request->group_id)->pluck('member_id')->toArray();

        foreach ($request->courses as $course) {
            if (! GroupTraining::where('group_id', $request->group_id)->where('course_id', $course)->exists()) {
                $training['group_id']  = $request->group_id;
                $training['course_id'] = $course;
                GroupTraining::insert($training);

                foreach ($members as $member) {
                    if (! Enrollment::where('course_id', $course)->where('user_id', $member)->exists()) {
                        $enroll['user_id']         = $member;
                        $enroll['course_id']       = $course;
                        $enroll['enrollment_type'] = 'private_training';
                        $enroll['entry_date']      = time();
                        Enrollment::insert($enroll);
                    }
                }
            }
        }
        return redirect()->route('admin.groups.training')->with('success', get_phrase('Training has been set.'));
    }

    public function delete($company = "", $id)
    {
        $training = GroupTraining::find($id)->first();
        $training->delete();

        $members = GroupMember::where('group_id', $training->group_id)->pluck('member_id')->toArray();
        foreach ($members as $member) {
            $enroll = Enrollment::where('user_id', $member)->where('course_id', $training->course_id)->exists();
            if ($enroll) {
                Enrollment::where('user_id', $member)->where('course_id', $training->course_id)->where('enrollment_type', 'private_training')->delete();
            }
        }
        return redirect()->back()->with('success', get_phrase('Training session has been deleted.'));
    }
}
