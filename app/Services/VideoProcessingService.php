<?php
namespace App\Services;

use FFMpeg\Format\Video\X264;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use ProtoneMedia\LaravelFFMpeg\Filters\WatermarkFactory;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class VideoProcessingService
{
    public static function convertToMp4($file, $output, $file_name)
    {
        return null;
        $path    = "{$output}/{$file_name}";
        $convert = FFMpeg::fromDisk('public')
            ->open($file)
            ->export()
            ->toDisk('public')
            ->inFormat(new X264)
            ->save($path);

        return $convert ? $path : null;
    }

    public static function watermark($video, $path, $file_name)
    {
        return null;
        $output         = "{$path}/{$file_name}";
        $watermark_data = self::getWatermarkData();

        FFMpeg::fromDisk('public')
            ->open($video)
            ->addWatermark(function (WatermarkFactory $watermark) use ($watermark_data) {
                $watermark->fromDisk('public')
                    ->open($watermark_data['logo'])
                    ->top($watermark_data['top'])
                    ->left($watermark_data['left']);
            })
            ->export()
            ->inFormat(new X264())
            ->toDisk('public')
            ->save($output);

        self::deleteTempWatermark(public_path($watermark_data['logo']));
        return $output;
    }

    public static function getWatermarkData()
    {
        $watermark = [
            'top'     => get_player_settings('watermark_top') ?? 0,
            'left'    => get_player_settings('watermark_left') ?? 0,
            'opacity' => get_player_settings('watermark_opacity'),
            'logo'    => self::makeTempWatermark(get_player_settings('watermark_logo')),
        ];
        return $watermark;
    }

    public static function makeTempWatermark($logo)
    {
        return null;
        $temp_img_name = File::name($logo) . '.png';
        $path          = company_path() . 'temp';
        $temp_path     = public_path($path);
        $watermark     = "{$path}/{$temp_img_name}";

        $width   = get_player_settings('watermark_width') ?? 200;
        $height  = get_player_settings('watermark_height') ?? 120;
        $opacity = get_player_settings('watermark_opacity') ?? 10;

        if (! File::exists($temp_path)) {
            File::makeDirectory($temp_path, 0755, true);
        }

        Image::make(public_path($logo))
            ->encode('png', 90)
            ->opacity($opacity)
            ->orientate()
            ->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->save(public_path($watermark));

        return $watermark;
    }

    public static function deleteTempWatermark($path)
    {
        if (is_file($path) && file_exists($path)) {
            unlink($path);
        }
    }
}
