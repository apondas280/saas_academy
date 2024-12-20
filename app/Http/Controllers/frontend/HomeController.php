<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\AddonHook;
use App\Models\Blog;
use App\Models\Builder_page;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HomeController extends Controller
{
    public function index()
    {
        $page_data['blogs']   = Blog::where('is_popular', 1)->where('status', 1)->latest('id')->take(3)->get();
        $page_data['reviews'] = Review::all();

        $view_path = 'frontend' . '.' . get_frontend_settings('theme') . '.home.index';

        return view($view_path, $page_data);

        $page_builder = Builder_page::where('status', 1)->first();
        if ($page_builder && $page_builder->is_permanent == 1) {
            $page_data['blogs']   = Blog::where('is_popular', 1)->where('status', 1)->latest('id')->take(3)->get();
            $page_data['reviews'] = Review::all();
            return view('frontend.default.home.' . $page_builder->identifier, $page_data);
        } elseif ($page_builder) {
            return view('frontend.builder-home.index');
        } else {
            $page_data['instructor'] = User::join('courses', 'users.id', 'courses.user_id', )
                ->select('users.*', 'courses.title as course_title')
                ->get()->unique()->take(4);

            $page_data['blogs']    = Blog::where('is_popular', 1)->where('status', 1)->latest('id')->take(3)->get();
            $page_data['category'] = Category::take(8)->get();

            $view_path = 'frontend' . '.' . get_frontend_settings('theme') . '.home.index';
            return view($view_path, $page_data);
        }
    }

    public function download_certificate($identifier)
    {
        $certificate = Certificate::where('identifier', $identifier);
        if ($certificate->count() > 0) {
            $qr_code_content_value = route('certificate', ['identifier' => $identifier]);
            $qrcode                = QrCode::size(300)->generate($qr_code_content_value);

            $page_data['certificate'] = $certificate->first();
            $page_data['qrcode']      = $qrcode;
            return view('curriculum.certificate.download', $page_data);
        } else {
            return redirect(route('home'))->with('error', get_phrase('Certificate not found at this url'));
        }
    }
}
