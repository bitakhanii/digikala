<style>
    .page-item.active .page-link {
        background-color: #258eff;
        color: #fff;
    }
</style>

<ul class="pagination pagination-md m-0 float-right">
    @php
        $currentPage = request()->input('page');
        $currentPage = $currentPage ? $currentPage : 1;
    @endphp
    <li class="page-item">
        <a class="page-link" href="{{ $paginated->previousPageUrl() }}">«</a>
    </li>
    @foreach ($paginated->links()->elements[0] as $page => $url)
        <li class="page-item @if($currentPage == $page) active @endif">
            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
        </li>
    @endforeach
    <li class="page-item">
        <a class="page-link" href="{{ $paginated->nextPageUrl() }}">»</a>
    </li>
</ul>
