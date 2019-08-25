@foreach ($items as $item_list)
  <option value="{{$item_list->id ?? ""}}"

  @isset($item->id)

    @if ($item->parent_id == $item_list->id)
selected=""
    @endif

    @if ($item->id == $item_list->id)
      hidden=""
    @endif

  @endisset
  >
  {!! $delimiter ?? "" !!}{{$item_list->title ?? ""}}
</option>

@if (count($item_list->children) > 0)
@include('admin.items.partials.items', [
'items' => $item_list->children,
'delimiter' => '-' . $delimiter
 ])
@endif
@endforeach
