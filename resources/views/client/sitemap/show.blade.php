@extends('client.layouts.default')

@section('content')
    <div class="container">
        @include('client.shared.breadcrumbs._breadcrumbs')

        <h1>{{ $metaData['h1'] }}</h1>

        <div class="map-tree">
            @include('client.sitemap._lvl', ['lvl' => $mapStructure])
        </div>
    </div>
@stop
