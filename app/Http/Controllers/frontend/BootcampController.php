<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Bootcamp;
use App\Models\BootcampModule;
use App\Services\SeoService;
use Illuminate\Support\Facades\Session;

class BootcampController extends Controller
{
    public function index($company = '', $category = '')
    {
        $query = Bootcamp::join('users', 'bootcamps.user_id', 'users.id')
            ->join('bootcamp_categories', 'bootcamps.category_id', 'bootcamp_categories.id')
            ->select('bootcamps.*', 'bootcamp_categories.slug as category_slug', 'users.name as instructor_name', 'users.email as instructor_email', 'users.photo as instructor_image')
            ->latest('id')->where('bootcamps.status', 1);

        if (request()->has('search')) {
            $query = $query->where('bootcamps.title', 'LIKE', '%' . request()->query('search') . '%');
        }

        if ($category) {
            $query->where('bootcamp_categories.slug', $category);
        }

        $page_data['bootcamps'] = $query->paginate(9)->appends(request()->query());
        return view(theme_path() . 'bootcamp.index', $page_data);
    }

    public function show($company = "", $slug)
    {
        // bootcamp details
        $bootcamp = Bootcamp::with('author')->where(['status' => 1, 'slug' => $slug]);
        if ($bootcamp->doesntExist()) {
            Session::flash('error', get_phrase('Data not found.'));
            return redirect()->back();
        }

        $bootcamp_details      = $bootcamp->first();
        $page_data['bootcamp'] = $bootcamp_details;
        $page_data['modules']  = BootcampModule::where('bootcamp_id', $bootcamp_details->id)->get();
        $page_data['seo']      = SeoService::generateSeo($bootcamp_details, 'bootcamp');

        return view(theme_path() . 'bootcamp.details', $page_data);
    }
}
