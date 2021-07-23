
<div style="border: 1px solid black">

    футер

&copy; {{ date('Y') }}






@if(count($bottomMenu) > 0)
    <ul>
        @foreach($bottomMenu as $menuElement)
            <li class=" {{ $menuElement['active']  ? 'active' : '' }}">
                <a href="{{ $menuElement['url'] }}" class="nav-link">{!! $menuElement['name'] !!}</a>
            </li>
        @endforeach
    </ul>
@endif


@if(trim(Setting::get("site_content.phone")) !== '')
    <a href="tel:{{ Setting::get("site_content.phone") }}" class="">
        <img class="d-none d-xl-inline-block" src="{{Asset::timed('images/client/icons/png/icon-phone-white.svg')}}" alt="" width="23" height="23">
        {!! Setting::get("site_content.phone") !!}
    </a>
@endif


</div>
