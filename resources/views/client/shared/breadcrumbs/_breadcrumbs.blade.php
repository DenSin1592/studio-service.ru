@if (isset($breadcrumbs) && $breadcrumbs->length() > 0)
    <ul class="breadcrumb d-flex flex-wrap reset-list" id="breadcrumbs">
        <li class="breadcrumb-item">
            <a class="breadcrumb-link" href="{{{ route('home') }}}">
                Главная
            </a>
        </li>
        @foreach ($breadcrumbs->getBreadcrumbs() as $key => $breadcrumb)
            @include('client.shared.breadcrumbs._item')
        @endforeach
    </ul>
@endif
