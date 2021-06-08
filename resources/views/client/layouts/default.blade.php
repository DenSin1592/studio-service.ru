<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title', $meta_title ?? 'studio-service.ru')</title>
    @if (isset($meta_description))
        <meta name="description" content="{{ $meta_description }}"/>
    @endif
    @if (isset($meta_keywords))
        <meta name="keywords" content="{{ $meta_keywords }}"/>
    @endif
    @if (isset($canonicalUrl))
        <link rel="canonical" href="{{ $canonicalUrl }}"/>
    @endif

    @include('client.layouts._favicon')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    {!! Asset::includeCSS('client_layout_css') !!}
</head>

<body>
    @include('client.layouts._auth_menu')

    @yield('content')

    {!! Asset::includeJS('client_layout_js') !!}
</body>
</html>
