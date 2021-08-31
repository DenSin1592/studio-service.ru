<!DOCTYPE html>
<html style="font-size: 15px; color: #40444e; background-color: white;" lang="ru">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ $subject }}</title>
</head>
<body style="margin: 0; font-family: 'Arial', sans-serif; color: #343434;">

@include('emails.layouts._header')

<div style="padding: 20px;">
    @yield('content')
</div>

{{--@section('footer')
    @include('emails.layouts._footer')
@show--}}

</body>
</html>
