@foreach ($categories as $category)
  <option value="{{$category->id ?? ""}}"
    @isset($ingredient->category_id)
      @if ($ingredient->category_id == $category->id)
  selected=""
      @endif
  @endisset  >
  {!! $delimiter ?? "" !!}{{$category->title ?? ""}}
</option>

@if (count($category->children) > 0)
@include('admin.menus.partials.categories', [
'categories' => $category->children,
'delimiter' => '-' . $delimiter
 ])
@endif
@endforeach
