
<div class="navigator short">
    <div class="head">

        @if ($paginator->hasPages())

            @if ($paginator->onFirstPage())
                <a aria-label="arrow previous" class="arrow previous disable-link"></a>
            @else
                <a aria-label="arrow previous" class="arrow previous" href="{{  $paginator->previousPageUrl() }}"></a>
            @endif
        <ul class="pager">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                                <li class='current'>
                                    <span>{{ $page }}</span>
                                </li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
            @if ($paginator->hasMorePages())
                <a aria-label="arrow next" class="arrow next" href="{{ $paginator->nextPageUrl() }}" rel="next"></a>
            @endif
        @endif
    </div>
</div>

