@foreach ($categories as $category_list)
    <option value="{{$category_list->id}}"

            @isset($categoryEN->id)

            @if ($categoryEN->parent_id == $category_list->id)
            selected
            @endif

            @endisset

    >
        {!! $delimiter !!}{{ $category_list->name }}
    </option>

    @if (count($category_list->children) > 0)

        @include('admin.partials.listing', [
          'categories' => $category_list->children,
          'delimiter'  => ' - ' . $delimiter
        ])

    @endif
@endforeach