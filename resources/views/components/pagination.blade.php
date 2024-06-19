@if ($paginator->hasPages())
    <nav class="flex justify-between items-center mt-4">
        <!-- Previous Page Link -->
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="inline-flex items-center justify-center w-8 h-8 text-gray-500 bg-black border border-[#92d051] rounded-full cursor-not-allowed font-bold">
                        <svg class="w-4 h-4 transform rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 18l-6-6 6-6"/></svg>
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->appends(request()->except($param))->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" 
                       class="inline-flex items-center justify-center w-8 h-8 text-[#92d051] bg-black border border-[#92d051] rounded-full hover:bg-gray-800 hover:text-white font-bold">
                        <svg class="w-4 h-4 transform rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 18l-6-6 6-6"/></svg>
                    </a>
                </li>
            @endif
        </ul>

        

        <!-- Next Page Link -->
        <ul class="pagination">
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->appends(request()->except($param))->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" 
                       class="inline-flex items-center justify-center w-8 h-8 text-[#92d051] bg-black border border-[#92d051] rounded-full hover:bg-gray-800 hover:text-white font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </li>
            @else
                <li aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="inline-flex items-center justify-center w-8 h-8 text-gray-500 bg-black border border-[#92d051] rounded-full cursor-not-allowed font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
