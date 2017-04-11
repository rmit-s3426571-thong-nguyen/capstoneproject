<ul>
    @foreach ($children as $sub)
        <li>
            <a href="{{ route('categories.edit', $sub->id ) }}">{{ $sub->name }}</a>
                @if(count($sub->children))
                        @include('categories.subcategories',['children' => $sub->children])
                @endif
        </li>
    @endforeach
</ul>