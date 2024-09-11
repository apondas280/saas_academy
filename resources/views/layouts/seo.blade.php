    <!-- Required meta tags seo start -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    @php
        if (!isset($seo) || !is_object($seo)) {
            $seo = App\Services\SeoService::generateSeo();
        }
    @endphp

    <title>{{ $seo->meta_title }}</title>
    <meta name="keywords" content="{{ $seo->meta_keywords }}">
    <meta name="description" content="{{ $seo->meta_description }}">
    <meta name="robot" content="{{ $seo->meta_robot }}">
    <link rel="canonical" href="{{ $seo->canonical_url }}" />
    <link rel="custom" href="{{ $seo->custom_url }}" />
    <meta name="author" content="Creativeitem">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="Creativeitem - We provide smart solutions for your business.">

    {!! $seo->json_ld !!}

    <meta property="og:title" content="{{ $seo->og_title }}" />
    <meta property="og:description" content="{{ $seo->og_description }}" />
    <meta property="og:image" content="{{ $seo->og_image }}" />

    <!-- Required meta tags seo end -->
