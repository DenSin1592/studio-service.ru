@extends('client.layouts.default')

@section('content')
    <div class="breadcrumb-box">
        <div class="container">
            <div class="row">
                <div class="col">
                        @include('client.shared.breadcrumbs._breadcrumbs')
                </div>
            </div>
        </div>
    </div>

    <div class="content-inner">
        <section class="section-article">
            <div class="container">
                <article class="article-box">
                    <h1>{{ $h1 }}</h1>

                    @include('client.privacy._content')
                </article>
            </div>
        </section>
    </div>
@stop
