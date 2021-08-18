<!doctype html>
<html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta name="theme-color" content="#634ead">
        <link rel="icon" href="{{asset('/favicon.svg')}}">
        <link rel="mask-icon" href="{{asset('/mask-icon.svg')}}" color="#ffffff">
        <link rel="apple-touch-icon" href="{{asset('/apple-touch-icon.png')}}">
        <link rel="manifest" href="{{asset('/manifest.json')}}">

        <title>{{$metaData['meta_title'] ?? 'studio-service.ru'}}</title>

        @if (isset($metaData['meta_description']))
            <meta name="description" content="{{ $metaData['meta_description'] }}"/>
        @endif

        @if (isset($metaData['meta_keywords']))
            <meta name="keywords" content="{{ $metaData['meta_keywords'] }}"/>
        @endif

        @include('client.layouts._favicon')

        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        {!! Asset::includeCSS('client_css') !!}
    </head>

    <body @yield('body_class')>

        @include('client.layouts._auth_menu')

        @include('client.layouts._header')

        <main class="main flex-shrink-0 flex-grow-1">

            @yield('content')

        </main>

        @include('client.layouts._footer')

        @include('client.layouts._offcanvas')

        @yield('modal')

        {!! Asset::includeJS('client_js') !!}

    </body>
</html>
