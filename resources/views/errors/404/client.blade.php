@extends('client.layouts.default')

<?php
/*use App\Services\Breadcrumbs\Factory;

$breadcrumbs = resolve(Factory::class)->init();
$breadcrumbs->add('Страница не найдена');*/
?>

@section('title', 'Страница не найдена')

@section('body_class')
    class="d-flex flex-column"
@stop

@section('content')
    <div class="page-content page-article">
      {{--  @include('client.layouts._breadcrumbs')--}}

        <div class="container">
            <article class="article">
                <h1 class="display-title">Страница не найдена</h1>
                <div>
                    Запрашиваемая вами страница не существует или была удалена.<br/>
                    Вы можете вернуться на {{ link_to_route('home', 'главную страницу') }}.
                </div>
            </article>
        </div>
    </div>
@stop
