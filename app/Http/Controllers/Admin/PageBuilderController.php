<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Builder_page;
use App\Models\FileUploader;
use App\Models\FrontendSetting;
use Illuminate\Http\Request;

class PageBuilderController extends Controller
{
    function page_list()
    {
        return view('admin.page_builder.page_list');
    }

    function page_store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        Builder_page::insert(['name' => $request->name, 'created_at' => date('Y-m-d H:i:s')]);
        return redirect(route('admin.pages'))->with('success', get_phrase('New home page layout has been added'));
    }

    function page_update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        Builder_page::where('id', $id)->update(['name' => $request->name, 'updated_at' => date('Y-m-d H:i:s')]);
        return redirect(route('admin.pages'))->with('success', get_phrase('Home page name has been updated'));
    }

    function page_delete($id)
    {
        Builder_page::where('id', $id)->delete();
        return redirect(route('admin.pages'))->with('success', get_phrase('The page name has been updated'));
    }

    function page_status($id)
    {
        $query = Builder_page::where('id', $id);
        if ($query->first()->status == 1) {
            $query->update(['status' => 0]);
            $response = [
                'success' => get_phrase('Home page deactivated')
            ];
        } else {
            FrontendSetting::where('key', 'home_page')->update(['value' => $query->first()->identifier]);
            $query->update(['status' => 1]);
            $response = [
                'success' => get_phrase('Home page activated')
            ];
        }
        Builder_page::where('id', '!=', $id)->update(['status' => 0]);


        return json_encode($response);
    }

    function page_layout_edit($id)
    {
        return view('admin.page_builder.page_layout_edit', ['id' => $id]);
    }

    function page_layout_update(Request $request, $id)
    {
        $validated = $request->validate([
            'html' => 'required'
        ]);

        Builder_page::where('id', $id)->update(['html' => $request->html]);
        return redirect(route('admin.pages'))->with('success', get_phrase('Page layout has been updated'));
    }

    function page_layout_image_update(Request $request)
    {
        $remove_file_arr = explode('/', $request->remove_file);
        $previous_image_path = 'uploads/home-page-builder/' . end($remove_file_arr);
        remove_file($previous_image_path);

        $image_path = FileUploader::upload($request->file, 'uploads/home-page-builder');
        return get_image($image_path);
    }

    function preview($page_id)
    {
        $page_data['page_id'] = $page_id;
        return view('frontend.builder-home.index', $page_data);
    }
}
