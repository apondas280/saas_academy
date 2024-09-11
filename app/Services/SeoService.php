<?php
namespace App\Services;

use App\Models\SeoField;
use Illuminate\Support\Facades\Route;

class SeoService
{
    public static function generateSeo($elem = null, $feature = null)
    {
        return (object) ($elem && $feature
            ? self::getDynamicPageSeo($elem, $feature)
            : self::getStaticPageSeo()
        );
    }

    protected static function getDynamicPageSeo($elem, $feature)
    {
        $seo_methods = [
            'course'       => 'getDynamicCourseSeo',
            'bootcamp'     => 'getDynamicBootcampSeo',
            'team-package' => 'getDynamicTeamPackageSeo',
        ];

        $method = $seo_methods[$feature] ?? null;

        return $method ? array_merge(self::loadDefaultSeo(), self::$method($elem)) : self::loadDefaultSeo();
    }

    protected static function loadDefaultSeo()
    {
        $current_url = self::getCurrentUrl();
        return [
            'meta_title'       => '',
            'meta_description' => '',
            'meta_keywords'    => '',
            'meta_robot'       => '',
            'canonical_url'    => $current_url,
            'custom_url'       => $current_url,
            'og_title'         => '',
            'og_description'   => '',
            'og_image'         => '',
            'json_ld'          => '',
        ];
    }

    protected static function getCurrentUrl()
    {
        $protocol = request()->secure() ? "https" : "http";
        return $protocol . "://" . request()->getHttpHost() . request()->getRequestUri();
    }

    protected static function getStaticPageSeo()
    {
        $route     = Route::currentRouteName();
        $seo_field = SeoField::firstWhere('route', $route);

        return $seo_field ? self::mapSeoFields($seo_field) : self::loadDefaultSeo();
    }

    protected static function staticRoutes()
    {
        return [
            'home', 'blogs', 'courses', 'bootcamps', 'team-packages', 'login', 'register',
        ];
    }

    protected static function mapSeoFields($seo_field)
    {
        $current_url = self::getCurrentUrl();
        return [
            'meta_title'       => $seo_field->meta_title,
            'meta_description' => $seo_field->meta_description,
            'meta_keywords'    => $seo_field->meta_keywords,
            'meta_robot'       => $seo_field->meta_robot,
            'canonical_url'    => $seo_field->canonical_url ?? $current_url,
            'custom_url'       => $seo_field->custom_url ?? $current_url,
            'og_title'         => $seo_field->og_title,
            'og_description'   => $seo_field->og_description,
            'og_image'         => url("public/uploads/og-image/{$seo_field->og_image}"),
            'json_ld'          => $seo_field->json_ld,
        ];
    }

    protected static function getDynamicCourseSeo($course)
    {
        return [
            'meta_title'       => $course->title,
            'meta_description' => $course->meta_description,
            'meta_keywords'    => $course->meta_keywords,
            'og_title'         => $course->title,
            'og_description'   => $course->meta_description ?? strip_tags($course->description),
            'og_image'         => url("public/{$course->thumbnail}"),
        ];
    }

    protected static function getDynamicBootcampSeo($bootcamp)
    {
        return [
            'meta_title'       => $bootcamp->title,
            'meta_description' => $bootcamp->short_description,
            'meta_keywords'    => $bootcamp->meta_keywords,
            'og_title'         => $bootcamp->title,
            'og_description'   => $bootcamp->meta_description ?? strip_tags($bootcamp->description),
            'og_image'         => url("public/{$bootcamp->thumbnail}"),
        ];
    }

    protected static function getDynamicTeamPackageSeo($team_package)
    {
        return [
            'meta_title' => $team_package->title,
            'og_title'   => $team_package->title,
            'og_image'   => url("public/{$team_package->thumbnail}"),
        ];
    }
}
