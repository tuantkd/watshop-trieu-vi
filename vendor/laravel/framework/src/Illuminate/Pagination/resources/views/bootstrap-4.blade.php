@if ($paginator->hasPages())
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <nav>
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" 
                        aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true" style="color:gray;">
                                &lsaquo;
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                        </li>
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
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link"
                                        style="background-color:gray;border:1px solid gray;">
                                            {{ $page }}
                                        </span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}" style="color:gray;">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" style="color:gray;">
                                &rsaquo;
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled" 
                        aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true" style="color:gray;">
                                &rsaquo;
                            </span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
    </div> 
@endif
