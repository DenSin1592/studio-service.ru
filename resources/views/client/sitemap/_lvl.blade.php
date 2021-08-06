@if (count($lvl) > 0)
    <ul>
        @foreach ($lvl as $element)
            <li>
                @if (isset($element['url']))
                    <a href="{{ $element['url'] }}">{{ $element['name'] }}</a>
                @else
                    <span>{{ $element['name'] }}</span>
                @endif
                @include('client.sitemap._lvl', ['lvl' => $element['children']])
            </li>
        @endforeach
    </ul>
@endif
