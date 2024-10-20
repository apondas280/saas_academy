<?php

namespace App\Http\Controllers;

use App\Models\FileUploader;
use App\Models\SeoField;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function seo_settings($company = "", $active_tab = "")
    {
        if (! $active_tab) {
            return redirect()->route('admin.seo.settings', 'home');
        }

        $page_data['seo_fields'] = SeoField::all();
        return view("admin.setting.seo_setting", $page_data);
    }

    public function seo_settings_update(Request $request, $company = "", $route = "")
    {
        if (! empty($request->all())) {
            $updateSeo = SeoField::where('route', $route)->first();

            $updateSeo->meta_title       = $request->meta_title;
            $updateSeo->meta_keywords    = $request->meta_keywords;
            $updateSeo->meta_description = $request->meta_description;
            $updateSeo->meta_robot       = $request->meta_robot;
            $updateSeo->canonical_url    = $request->canonical_url;
            $updateSeo->custom_url       = $request->custom_url;
            $updateSeo->og_title         = $request->og_title;
            $updateSeo->og_description   = $request->og_description;
            $updateSeo->json_ld          = $request->json_ld;

            if (isset($request->og_image)) {
                $originalFileName = $updateSeo->id . '-' . $request->og_image->getClientOriginalName();
                $destinationPath  = FileUploader::upload($request->og_image, 'og-image');
                remove_file($updateSeo->og_image);
                $updateSeo->og_image = $destinationPath;
            }

            $updateSeo->save();
            $page_data                  = array();
            $page_data['seo_meta_tags'] = SeoField::all();
            $page_data['active_tab']    = $route;

            return redirect()->back()->with('success', 'Seo field has been update.');
        }

        return redirect()->back()->with('error', 'Seo update failed');
    }
}
