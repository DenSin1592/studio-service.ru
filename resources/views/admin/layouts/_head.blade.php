{{-- Common include in head --}}

<meta charset="utf-8" />
<title>@yield('title')</title>
<meta name="csrf-token" content="{{ csrf_token() }}"/>

<meta name="theme-color" content="#634ead">
<link rel="icon" href="{{asset('/favicon.svg')}}">
<link rel="mask-icon" href="{{asset('/mask-icon.svg')}}" color="#ffffff">
<link rel="apple-touch-icon" href="{{asset('/apple-touch-icon.png')}}">
<link rel="manifest" href="{{asset('/manifest.json')}}">

{!! Asset::includeCSS('admin_css') !!}

@yield('custom_css')
