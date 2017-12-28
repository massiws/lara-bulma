@if ($paginator->hasPages())

    <nav class="pagination is-right is-small" role="navigation" aria-label="pagination">
        <ul class="pagination-list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <a class="pagination-previous" disabled>
                        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                    </a>
                </li>
            @else
                <li>
                    <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}">
                        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator
                Uncomment to show more page links
                @if (is_string($element))
                    <li><span class="pagination-ellipsis">{{ $element }}</span></li>
                @endif
                --}}

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <a class="pagination-link is-current" aria-label="Page {{ $page }}" aria-current="page">
                                    <span>{{ $page }}</span>
                                </a>
                            </li>
                        {{-- Uncomment to show more page links
                        @else
                            <li><a class="pagination-link" href="{{ $url }}">{{ $page }}</a></li>
                        --}}
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}">
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </a>
                </li>
            @else
                <li>
                    <a class="pagination-next" disabled>
                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    </a>
                </li>
            @endif
        </ul>
    </nav>

@endif
