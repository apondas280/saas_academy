<?php

namespace App\Models;

use App\Services\AWSService;
use App\Services\ImageProcessingService;
use App\Services\VideoProcessingService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploader extends Model
{
    use HasFactory;

    // Explanation: $upload_file = this is the uploaded temp file => $request->video_feild_name
    // Explanation: $upload_path = "public/storage/video" OR "public/storage/video/Sj8Ro5Gksde3T.mp4" OR "sdsdncts7sn.png" OR empty if amazon s3 is active
    // Explanation: $width and $height => Image width and height
    // Explanation: $optimized_width and $optimized_height ultra optimization, That is stored in optimized folder

    public static function upload($file, $upload_path, $width = 300, $height = 300, $optimized_width = 250, $optimized_height = null)
    {
        if (! $file) {
            return;
        }

        // get company name
        $company = request()->route()->parameter('company');

        // set upload paths
        $company_upload_path = "upload/{$company}/{$upload_path}";

        // check if Amazon S3 is active
        $s3_keys = get_settings('amazon_s3', 'object');
        if (empty($s3_keys) || $s3_keys->active != 1) {
            return self::handleLocalUpload($file, $company_upload_path, $width, $height, $optimized_width, $optimized_height);
        } else {
            return AWSService::upload($file, $s3_keys);
        }
    }

    private static function handleLocalUpload($file, $company_upload_path, $width, $height, $optimized_width, $optimized_height)
    {
        // ensure directory exists for upload path
        if (! is_dir(public_path($company_upload_path))) {
            Storage::makeDirectory(public_path($company_upload_path));
        }

        // generate unique file name
        $file_name = Str::random(20);
        $extension = $file->extension();

        // supported file extensions
        $video_extensions = ['mp4', 'mov', 'avi', 'wmv', 'flv', 'mkv', 'webm', '3gp', 'mpeg'];
        $image_extensions = ['jpeg', 'jpg', 'png', 'gif', 'bmp', 'svg', 'webp'];

        // handle image uploads
        if (in_array($extension, $image_extensions)) {
            $file_name = $file_name . '.' . $extension;
            return self::handleImageUpload($file, $company_upload_path, $file_name, $width, $height, $optimized_width, $optimized_height);
        }

        // handle video uploads
        if (in_array($extension, $video_extensions)) {
            return self::handleVideoUpload($file, $company_upload_path, $file_name);
        }

        // handle other file types
        $file_name = $file_name . '.' . $extension;
        $file->move(public_path($company_upload_path), $file_name);
        return "{$company_upload_path}/{$file_name}";
    }

    // upload image file
    private static function handleImageUpload($file, $company_upload_path, $file_name, $width, $height, $optimized_width, $optimized_height)
    {
        if ($width) {
            return ImageProcessingService::optimize($file, $company_upload_path, $width, $height, $optimized_width, $optimized_height);
        } else {
            $file->move(public_path($company_upload_path), $file_name);
            return "{$company_upload_path}/{$file_name}";
        }
    }

    // upload video file
    private static function handleVideoUpload($file, $company_upload_path, $file_name)
    {
        $type = get_player_settings('watermark_type');
        if ($type === 'ffmpeg') {
            return VideoProcessingService::watermark($file, $company_upload_path, "{$file_name}.mp4");
        } else {
            return VideoProcessingService::convertToMp4($file, $company_upload_path, "{$file_name}.mp4");
        }
    }
}