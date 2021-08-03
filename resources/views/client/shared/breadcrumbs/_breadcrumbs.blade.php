@if (isset($breadcrumbs) && $breadcrumbs->length() > 0)
    <nav class="breadcrumb-block" aria-label="breadcrumb">
        <ol class="breadcrumb list-unstyled">
            <li class="breadcrumb-item">
                <a href="{{{ route('home') }}}" class="breadcrumb-link">Главная</a>
            </li>
            @foreach ($breadcrumbs->getBreadcrumbs() as $key => $breadcrumb)
                @include('client.shared.breadcrumbs._item')
            @endforeach
        </ol>
    </nav>
@endif
