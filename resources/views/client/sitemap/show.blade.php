@extends('client.layouts.default')

@section('content')
    <section class="section-article">
        <div class="container">
            <div class="row">
                <div class="col-xxl-10 offset-xxl-1">
                    @include('client.shared.breadcrumbs._breadcrumbs')

                    <article class="article" >
                        <h1>{{ $metaData['h1'] }}</h1>

                        @include('client.sitemap._lvl', ['lvl' => $mapStructure])
                    </article>
                </div>
            </div>
        </div>
    </section>
@stop
