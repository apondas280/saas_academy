<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Models\FileUploader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MyProfileController extends Controller
{
    public function manage_profile()
    {
        return view('instructor.profile.index');
    }
    public function manage_profile_update(Request $request)
    {
        if ($request->type == 'general') {
            $profile['name']      = $request->name;
            $profile['email']     = $request->email;
            $profile['facebook']  = $request->facebook;
            $profile['linkedin']  = $request->linkedin;
            $profile['about']     = $request->about;
            $profile['skills']    = $request->skills;
            $profile['biography'] = $request->biography;

            if ($request->photo) {
                if (isset($request->photo) && $request->photo != '') {
                    $profile['photo'] = FileUploader::upload($request->photo, 'users');
                }
            }
            User::where('id', auth()->user()->id)->update($profile);
        } else {
            $old_pass_check = Auth::attempt(['email' => auth()->user()->email, 'password' => $request->current_password]);

            if (! $old_pass_check) {
                Session::flash('error', get_phrase('Current password wrong.'));
                return redirect()->back();
            }

            if ($request->new_password != $request->confirm_password) {
                Session::flash('error', get_phrase('Confirm password not same'));
                return redirect()->back();
            }

            $password = Hash::make($request->new_password);
            User::where('id', auth()->user()->id)->update(['password' => $password]);
        }
        Session::flash('success', get_phrase('Your changes has been saved.'));
        return redirect()->back();
    }
}