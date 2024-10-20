<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Builder_page;
use App\Models\FileUploader;
use App\Models\FrontendSetting;
use Illuminate\Http\Request;

class PageBuilderController extends Controller
{
    public function page_list()
    {
        return redirect()->back();
        return view('admin.page_builder.page_list');
    }

    public function page_store(Request $request)
    {
        return redirect()->back();
        $validated = $request->validate([
            'name' => 'required',
        ]);

        Builder_page::insert(['name' => $request->name, 'created_at' => date('Y-m-d H:i:s')]);
        return redirect(route('admin.pages'))->with('success', get_phrase('New home page layout has been added'));
    }

    public function page_update(Request $request, $id)
    {
        return redirect()->back();
        $validated = $request->validate([
            'name' => 'required',
        ]);

        Builder_page::where('id', $id)->update(['name' => $request->name, 'updated_at' => date('Y-m-d H:i:s')]);
        return redirect(route('admin.pages'))->with('success', get_phrase('Home page name has been updated'));
    }

    public function page_delete($id)
    {
        return redirect()->back();
        Builder_page::where('id', $id)->delete();
        return redirect(route('admin.pages'))->with('success', get_phrase('The page name has been updated'));
    }

    public function page_status($id)
    {
        return redirect()->back();
        $query = Builder_page::where('id', $id);
        if ($query->first()->status == 1) {
            $query->update(['status' => 0]);
            $response = [
                'success' => get_phrase('Home page deactivated'),
            ];
        } else {
            FrontendSetting::where('key', 'home_page')->update(['value' => $query->first()->identifier]);
            $query->update(['status' => 1]);
            $response = [
                'success' => get_phrase('Home page activated'),
            ];
        }
        Builder_page::where('id', '!=', $id)->update(['status' => 0]);

        return json_encode($response);
    }

    public function page_layout_edit($id)
    {
        return redirect()->back();
        return view('admin.page_builder.page_layout_edit', ['id' => $id]);
    }

    public function page_layout_update(Request $request, $id)
    {
        return redirect()->back();
        $validated = $request->validate([
            'html' => 'required',
        ]);

        Builder_page::where('id', $id)->update(['html' => $request->html]);
        return redirect(route('admin.pages'))->with('success', get_phrase('Page layout has been updated'));
    }

    public function page_layout_image_update(Request $request)
    {
        return redirect()->back();
        $remove_file_arr     = explode('/', $request->remove_file);
        $image_path          = FileUploader::upload($request->file, 'homepage-builder');
        $previous_image_path = 'homepage-builder/' . end($remove_file_arr);
        remove_file($previous_image_path);
        return get_image($image_path);
    }

    public function preview($page_id)
    {
        return redirect()->back();
        $page_data['page_id'] = $page_id;
        return view('frontend.builder-home.index', $page_data);
    }
}
