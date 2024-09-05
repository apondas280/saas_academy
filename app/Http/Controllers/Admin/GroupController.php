<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $page_data['groups'] = Group::paginate(10);
        return view('admin.private_group.index', $page_data);
    }

    public function create()
    {
        $page_data['course'] = Course::where('status', 'active')->orWhere('status', 'private')->orderBy('title', 'asc')->get();
        $page_data['users']  = User::orderBy('name', 'asc')->get();
        return view('admin.private_group.create', $page_data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|unique:groups,title',
            'members' => 'required|array',
        ]);

        $data['title']  = $request->title;
        $data['status'] = 1;
        $insert_id      = Group::insertGetId($data);

        foreach ($request->members as $member) {
            if (! GroupMember::where('group_id', $insert_id)->where('member_id', $member)->exists()) {
                GroupMember::insert([
                    'group_id'  => $insert_id,
                    'member_id' => $member,
                ]);
            }
        }

        return redirect()->route('admin.groups')->with('success', get_phrase('Group has been created.'));
    }

    public function edit($company = "", $id)
    {
        $page_data['group'] = Group::find($id);
        $page_data['users'] = User::orderBy('name', 'asc')->get();

        return view('admin.private_group.edit', $page_data);
    }

    public function update(Request $request, $company = "", $id)
    {
        $request->validate([
            'title'   => 'required|unique:groups,title,' . $id,
            'members' => 'required|array',
        ]);

        $data['title'] = $request->title;

        Group::find($id)->update($data);

        foreach ($request->members as $member) {
            if (! GroupMember::where('group_id', $id)->where('member_id', $member)->exists()) {
                GroupMember::insert([
                    'group_id'  => $id,
                    'member_id' => $member,
                ]);
            }
        }

        return redirect()->route('admin.groups')->with('success', get_phrase('Group has been updated.'));
    }
    public function delete($company = "", $id)
    {
        Group::where('id', $id)->delete();
        GroupMember::where('group_id', $id)->delete();

        return redirect()->back()->with('success', get_phrase('Group has been deleted.'));
    }
}
