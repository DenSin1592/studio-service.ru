<li class="breadcrumb-item @if ($loop->last) active @endif"  @if ($loop->last) aria-current="page" @endif>
    @if ($loop->last)
        {{ $breadcrumb['name'] }}
    @elseif (is_null($breadcrumb['url']))
        {{ $breadcrumb['name'] }}
    @else
        <a class="breadcrumb-link" href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
    @endif
</li>



