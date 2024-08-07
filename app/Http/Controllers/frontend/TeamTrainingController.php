<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeamTrainingController extends Controller
{
    public function index(Request $request, $company = ''){
        // $category_row = BlogCategory::where('slug', $category)->first();
        $query = Blog::query();

        // // search result
        // if (request()->has('search')) {
        //     $search = request()->input('search');
        //     $query->where(function ($query) use ($search) {
        //         $query->where('title', 'LIKE', '%' . $search . '%');
        //         $query->orWhere('description', 'LIKE', '%' . $search . '%');
        //     });
        // }

        // // if blog has category
        // if ($category != '') {
        //     $query->where('category_id', $category_row->id);
        // }

        $page_data['blogs'] = $query->latest('id')->paginate(6)->appends($request->query());
        $view_path          = 'frontend' . '.' . get_frontend_settings('theme') . '.team_training.index';
        return view($view_path, $page_data);
    }
}