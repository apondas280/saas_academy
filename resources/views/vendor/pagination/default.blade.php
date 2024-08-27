@if ($paginator->hasPages())
    <div class="grid-list-pagination ms-0 d-flex justify-content-center">
        <ul class="pagination-list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li><a href="#" class="next-previous"><i class="fa-solid fa-angles-left"></i></a></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" class="next-previous"><i class="fa-solid fa-angles-left"></i></a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a href="#" class="active">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" class="next-previous"><i class="fa-solid fa-angles-right"></i></a></li>
            @else
                <li><a href="#" class="next-previous"><i class="fa-solid fa-angles-right"></i></a></li>
            @endif
        </ul>
    </div>
@endif
