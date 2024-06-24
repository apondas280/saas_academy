<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BecomeInstructorController extends Controller
{
    public function index()
    {
        $view_path = 'frontend.' . get_frontend_settings('theme') . '.student.become_instructor.index';
        return view($view_path);
    }

    public function store(Request $request)
    {
        // check application exists or not
        if (Application::where('user_id', auth()->user()->id)->exists()) {
            Session::flash('error', get_phrase('Your request is in process. Please wait for admin to response.'));
            return redirect()->route('become.instructor');
        }

        $rules = [
            'phone' => 'required',
            'document' => 'required|file|mimes:doc,docx,pdf,txt,png,jpg,jpeg|max:3072',
            'description' => 'required',
        ];

        // validate data
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        // process data
        $application['user_id'] = auth()->user()->id;
        $application['phone'] = $request->phone;
        $application['description'] = $request->description;

        $doc = $request->document;
        $application['document'] = $doc_name = Str::random(20) . '.' . $doc->extension();
        $path = 'storage/application/user_' . auth()->user()->id . '/' . $doc_name;

        // upload document
        FileUploader::upload($doc, $path, null, null, 300);

        // store application
        Application::insert($application);

        Session::flash('success', get_phrase('Your application has been submitted.'));
        return redirect()->back();
    }
}
