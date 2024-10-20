<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Models\FileUploader;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class LessonController extends Controller
{
    // public function store(Request $request)
    // {
    //     // duplicate check
    //     if (Lesson::where('course_id', $request->course_id)->where('title', $request->title)->exists()) {
    //         Session::flash('error', get_phrase('Lesson already exists.'));
    //         return redirect()->back();
    //     }

    //     $lesson              = new Lesson();
    //     $lesson->title       = $request->title;
    //     $lesson->user_id     = auth()->user()->id;
    //     $lesson->course_id   = $request->course_id;
    //     $lesson->section_id  = $request->section_id;
    //     $lesson->is_free     = $request->free_lesson;
    //     $lesson->lesson_type = $request->lesson_type;
    //     $lesson->summary     = $request->summary;
    //     if ($request->lesson_type == 'text') {
    //         $lesson->attachment      = $request->text_description;
    //         $lesson->attachment_type = $request->lesson_provider;
    //     } elseif ($request->lesson_type == 'video-url') {

    //         $lesson->video_type = $request->lesson_provider;
    //         $lesson->lesson_src = $request->lesson_src;
    //         $lesson->duration   = $request->duration;
    //     } elseif ($request->lesson_type == 'html5') {

    //         $lesson->video_type = $request->lesson_provider;
    //         $lesson->lesson_src = $request->lesson_src;
    //         $lesson->duration   = $request->duration;
    //     } elseif ($request->lesson_type == 'document_type') {

    //         if ($request->attachment == '') {
    //             $file = '';
    //         } else {
    //             $item      = $request->file('attachment');
    //             $file_name = strtotime('now') . random(4) . '.' . $item->getClientOriginalExtension();

    //             $path = public_path('assets/upload/lesson_file/attachment');
    //             if (!File::isDirectory($path)) {
    //                 File::makeDirectory($path, 0777, true, true);
    //             } else {
    //                 $item->move(public_path('assets/upload/lesson_file/attachment/'), $file_name);
    //             }
    //             $file = $file_name;
    //         }
    //         $lesson->attachment      = $file;
    //         $lesson->attachment_type = $request->attachment_type;
    //     } elseif ($request->lesson_type == 'image') {

    //         if ($request->attachment == '') {
    //             $file = '';
    //         } else {
    //             $item      = $request->file('attachment');
    //             $file_name = strtotime('now') . random(4) . '.' . $item->getClientOriginalExtension();

    //             $path = public_path('assets/upload/lesson_file/attachment');
    //             if (!File::isDirectory($path)) {
    //                 File::makeDirectory($path, 0777, true, true);
    //             } else {
    //                 $item->move(public_path('assets/upload/lesson_file/attachment/'), $file_name);
    //             }
    //             $file = $file_name;
    //         }
    //         $lesson->attachment      = $file;
    //         $lesson->attachment_type = $item->getClientOriginalExtension();
    //     } elseif ($request->lesson_type == 'vimeo-url') {

    //         $lesson->video_type = $request->lesson_provider;
    //         $lesson->lesson_src = $request->lesson_src;
    //         $lesson->duration   = $request->duration;
    //     } elseif ($request->lesson_type == 'iframe') {

    //         $lesson->lesson_src = $request->iframe_source;
    //     } elseif ($request->lesson_type == 'google_drive') {

    //         $lesson->video_type = $request->lesson_provider;
    //         $lesson->lesson_src = $request->lesson_src;
    //         $lesson->duration   = $request->duration;
    //     } elseif ($request->lesson_type == 'system-video') {

    //         if ($request->system_video_file == '') {
    //             $file = '';
    //         } else {
    //             $item      = $request->file('system_video_file');
    //             $file_name = strtotime('now') . random(4) . '.' . $item->getClientOriginalExtension();

    //             $path = public_path('assets/upload/lesson_file/videos');
    //             if (!File::isDirectory($path)) {
    //                 File::makeDirectory($path, 0777, true, true);
    //             } else {
    //                 $item->move(public_path('assets/upload/lesson_file/videos/'), $file_name);
    //             }
    //             $file = $file_name;
    //         }
    //         $lesson->video_type = $request->lesson_provider;
    //         $lesson->lesson_src = $file;
    //         $lesson->duration   = $request->system_video_file_duration;
    //     }

    //     $lesson->save();
    //     Session::flash('success', get_phrase('Lesson added successfully.'));
    //     return redirect()->back();
    // }

    public function store(Request $request)
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
                $item                    = $request->file('attachment');
                $data['attachment']      = FileUploader::upload($item, 'course/lesson/attachment');
                $data['attachment_type'] = $request->attachment_type;
            }

        } elseif ($request->lesson_type == 'image') {
            if ($request->attachment == '') {
                $file = '';
            } else {
                $item                    = $request->file('attachment');
                $data['attachment']      = FileUploader::upload($item, 'course/lesson/attachment');
                $data['attachment_type'] = $item->getClientOriginalExtension();
            }

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
                $item = $request->file('system_video_file');
                $path = 'course/lesson/videos';

                $type = get_player_settings('watermark_type');
                if ($type == 'ffmpeg') {
                    $watermark = get_player_settings('watermark_logo');
                    if (! $watermark) {
                        return redirect()->back()->with('error', get_phrase('Please configure watermark setting.'));
                    }

                    if (! file_exists(public_path($watermark))) {
                        return redirect()->back()->with('error', get_phrase('File doesn\'t exists.'));
                    }
                }

                $file = FileUploader::upload($item, $path);
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
        Session::flash('success', get_phrase('Lesson has been added.'));
        return redirect()->back();
    }

    public function sort(Request $request)
    {
        $lessons = json_decode($request->itemJSON);
        foreach ($lessons as $key => $value) {
            $updater = $key + 1;
            Lesson::where('id', $value)->update(['sort' => $updater]);
        }
        Session::flash('success', get_phrase('Lessons have been sorted.'));
    }

    // public function update(Request $request)
    // {
    //     // duplicate check
    //     if (Lesson::where('course_id', $request->course_id)->where('title', $request->title)->exists()) {
    //         Session::flash('error', get_phrase('Lesson already exists.'));
    //         return redirect()->back();
    //     }

    //     $lesson['title']      = $request->title;
    //     $lesson['section_id'] = $request->section_id;
    //     $lesson['summary']    = $request->summary;
    //     if ($request->lesson_type == 'text') {
    //         $lesson['description'] = $request->text_description;
    //     } elseif ($request->lesson_type == 'video-url') {
    //         $lesson['lesson_src'] = $request->lesson_src;
    //         $lesson['duration']   = $request->duration;
    //     } elseif ($request->lesson_type == 'html5') {
    //         $lesson['lesson_src'] = $request->lesson_src;
    //         $lesson['duration']   = $request->duration;
    //     } elseif ($request->lesson_type == 'document_type') {

    //         if ($request->attachment == '') {
    //             $file = '';
    //         } else {
    //             $item      = $request->file('attachment');
    //             $file_name = strtotime('now') . random(4) . '.' . $item->getClientOriginalExtension();

    //             $path = public_path('assets/upload/lesson_file/attachment');
    //             if (! File::isDirectory($path)) {
    //                 File::makeDirectory($path, 0777, true, true);
    //             } else {
    //                 $item->move(public_path('assets/upload/lesson_file/attachment/'), $file_name);
    //             }
    //             $file = $file_name;
    //         }
    //         $lesson['attachment']      = $file;
    //         $lesson['attachment_type'] = $request->attachment_type;
    //     } elseif ($request->lesson_type == 'image') {

    //         if ($request->attachment == '') {
    //             $file = '';
    //         } else {
    //             $item      = $request->file('attachment');
    //             $file_name = strtotime('now') . random(4) . '.' . $item->getClientOriginalExtension();

    //             $path = public_path('assets/upload/lesson_file/attachment');
    //             if (! File::isDirectory($path)) {
    //                 File::makeDirectory($path, 0777, true, true);
    //             } else {
    //                 $item->move(public_path('assets/upload/lesson_file/attachment/'), $file_name);
    //             }
    //             $file = $file_name;
    //         }
    //         $lesson['attachment']      = $file;
    //         $lesson['attachment_type'] = $item->getClientOriginalExtension();
    //     } elseif ($request->lesson_type == 'vimeo-url') {
    //         $lesson['lesson_src'] = $request->lesson_src;
    //         $lesson['duration']   = $request->duration;
    //     } elseif ($request->lesson_type == 'iframe') {
    //         $lesson['lesson_src'] = $request->iframe_source;
    //     } elseif ($request->lesson_type == 'google_drive') {

    //         $lesson['lesson_src'] = $request->lesson_src;
    //         $lesson['duration']   = $request->duration;
    //     } elseif ($request->lesson_type == 'system-video') {

    //         if ($request->system_video_file == '') {
    //             $file = '';
    //         } else {
    //             $item      = $request->file('system_video_file');
    //             $file_name = strtotime('now') . random(4) . '.' . $item->getClientOriginalExtension();

    //             $path = public_path('assets/upload/lesson_file/videos');
    //             if (! File::isDirectory($path)) {
    //                 File::makeDirectory($path, 0777, true, true);
    //             } else {
    //                 $item->move(public_path('assets/upload/lesson_file/videos/'), $file_name);
    //             }
    //             $file = $file_name;
    //         }

    //         $lesson['lesson_src'] = $file;
    //         $lesson['duration']   = $request->system_video_file_duration;
    //     }

    //     Lesson::where('id', $request->id)->update($lesson);
    //     Session::flash('success', get_phrase('lesson update successfully'));
    //     return redirect()->back();
    // }

    public function update(Request $request)
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
                $item                    = $request->file('attachment');
                $data['attachment']      = FileUploader::upload($item, 'course/lesson/attachment');
                $data['attachment_type'] = $request->attachment_type;
            }

        } elseif ($request->lesson_type == 'image') {
            if ($request->attachment == '') {
                $file = '';
            } else {
                $item                    = $request->file('attachment');
                $data['attachment']      = FileUploader::upload($item, 'course/lesson/attachment');
                $data['attachment_type'] = $item->getClientOriginalExtension();
            }

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
                $item = $request->file('system_video_file');
                $path = 'course/lesson/videos';

                $type = get_player_settings('watermark_type');
                if ($type == 'ffmpeg') {
                    $watermark = get_player_settings('watermark_logo');
                    if (! $watermark) {
                        return redirect()->back()->with('error', get_phrase('Please configure watermark setting.'));
                    }

                    if (! file_exists(public_path($watermark))) {
                        return redirect()->back()->with('error', get_phrase('File doesn\'t exists.'));
                    }
                }

                $file = FileUploader::upload($item, $path);
            }

            $lesson['lesson_src'] = $file;
            $duration_formatter   = explode(':', $request->duration);
            $hour                 = sprintf('%02d', $duration_formatter[0]);
            $min                  = sprintf('%02d', $duration_formatter[1]);
            $sec                  = sprintf('%02d', $duration_formatter[2]);
            $lesson['duration']   = $hour . ':' . $min . ':' . $sec;
        }

        Lesson::where('id', $request->id)->update($lesson);
        Session::flash('success', get_phrase('Lesson has been updated.'));
        return redirect()->back();
    }

    public function delete($company = "", $id)
    {
        Lesson::where('id', $id)->delete();
        Session::flash('success', get_phrase('Delete successfully'));
        return redirect()->back();
    }
}