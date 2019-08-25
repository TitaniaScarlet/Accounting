@foreach ($items as $item)
  <option value="{{$item->id ?? ""}}"
@isset($cost->item)
@foreach ($cost->items as $item_cost)
@if ($item->id == $item_cost->id)
  selected ="selected "
@endif
@endforeach
@endisset
  >
  {!! $delimiter ?? "" !!}{{$item->title ?? ""}}
</option>

@if (count($item->children) > 0)
@include('admin.items.partials.items', [
'items' => $item->children,
'delimiter' => '-' . $delimiter
 ])
@endif
@endforeach
