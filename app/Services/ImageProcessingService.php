<?php
namespace App\Services;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageProcessingService
{
    public static function optimize($file, $output, $width = null, $height = null, $optimized_width = null, $optimized_height = null)
    {
        $file_name = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $output    = "{$output}/{$file_name}";

        //Image optimization
        Image::make($file->path())->orientate()->resize($width, $height, function ($constraint) {
            $constraint->upsize();
            $constraint->aspectRatio();
        })->save(public_path($output));

        //Ultra Image optimization
        // $optimized_path = "{$output}/optimized/{$file_name}";
        // if (is_dir($optimized_path)) {
        //     Image::make($file->path())->orientate()->resize($optimized_width, $optimized_height, function ($constraint) {
        //         $constraint->upsize();
        //         $constraint->aspectRatio();
        //     })->save($optimized_path . '/' . $file_name);
        // }
        return $output;
    }
}