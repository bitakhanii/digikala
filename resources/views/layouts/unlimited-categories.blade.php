<ul>
    @foreach($categories as $category)
    <li>
        {{ $category->title }}
        @if($category->children)
        @include('categories' , ['categories' => $category->children])
        @endif
    </li>
    @endforeach
</ul>
