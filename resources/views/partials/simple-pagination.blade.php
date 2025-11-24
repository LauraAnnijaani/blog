@if ($paginator->hasPages())
    <nav>
        <ul class="join mb-3">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="join-item">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <button class="join-item btn btn-outline">Previous</button>
                    </a>
                </li>
            @else
                <li class="join-item">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <button class="join-item btn btn-outline">Previous</button>
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="join-item">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <button class="join-item btn btn-outline">Next</button>
                    </a>
                </li>
            @else
                <li class="join-item">
                    <button class="btn btn-outline" disabled>Next</button>
                </li>
            @endif
        </ul>
    </nav>
@endif
