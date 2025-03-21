@if ($paginator->hasPages())

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                
            @else
            	<li><a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-double-left"></i></a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><span class="current-page">{{ $page }}</span></li>
                        @else
                            <li><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-double-right"></i></a></li>
            @else
               
            @endif

@endif
									
