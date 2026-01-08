@if ($paginator->hasPages())
<nav class="admin-pagination" role="navigation" aria-label="Pagination Navigation">

    {{-- Prev --}}
    @if ($paginator->onFirstPage())
        <span class="admin-pagination__item is-disabled" aria-disabled="true">&lt;</span>
    @else
        <a class="admin-pagination__item" href="{{ $paginator->previousPageUrl() }}" rel="prev">&lt;</a>
    @endif

    {{-- Pages --}}
    @foreach ($elements as $element)
        @if (is_array($element))
        @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <span class="admin-pagination__item is-active" aria-current="page">{{ $page }}</span>
            @else
            <a class="admin-pagination__item" href="{{ $url }}">{{ $page }}</a>
            @endif
        @endforeach
        @endif
    @endforeach

    {{-- Next --}}
    @if ($paginator->hasMorePages())
        <a class="admin-pagination__item" href="{{ $paginator->nextPageUrl() }}" rel="next">&gt;</a>
    @else
        <span class="admin-pagination__item is-disabled" aria-disabled="true">&gt;</span>
    @endif

</nav>
@else
<nav class="admin-pagination" role="navigation" aria-label="Pagination Navigation">
    <span class="admin-pagination__item is-disabled" aria-disabled="true">&lt;</span>
    <span class="admin-pagination__item is-active" aria-current="page">1</span>
    <span class="admin-pagination__item is-disabled" aria-disabled="true">&gt;</span>
</nav>
@endif
