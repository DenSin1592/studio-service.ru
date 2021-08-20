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
    <section class="section-article">
        <div class="container">
            <div class="row">
                <div class="col-xxl-10 offset-xxl-1">
                    {{--  @include('client.layouts._breadcrumbs')--}}

                    <article class="article">
                        <h1 class="display-title">Страница не найдена</h1>
                        <div>
                            Запрашиваемая вами страница не существует или была удалена.<br/>
                            Вы можете вернуться на {{ link_to_route('home', 'главную страницу') }}.
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
@stop
