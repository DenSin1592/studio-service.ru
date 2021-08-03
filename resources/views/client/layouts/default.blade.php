<!doctype html>
<html lang="ru">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>{{$metaData['meta_title'] ?? 'studio-service.ru'}}</title>

        @if (isset($metaData['meta_description']))
            <meta name="description" content="{{ $metaData['meta_description'] }}"/>
        @endif

        @if (isset($metaData['meta_keywords']))
            <meta name="keywords" content="{{ $metaData['meta_keywords'] }}"/>
        @endif

        @include('client.layouts._favicon')

        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        {!! Asset::includeCSS('client_general_css') !!}
    </head>

    <body @yield('body_class')>

        @include('client.layouts._auth_menu')

        @include('client.layouts._header')

        <main class="main d-flex flex-column flex-shrink-0 flex-grow-1">

            @yield('content')

        </main>

        @include('client.layouts._footer')

        @include('client.layouts._offcanvas')

        {!! Asset::includeJS('client_general_js') !!}

    </body>
</html>
