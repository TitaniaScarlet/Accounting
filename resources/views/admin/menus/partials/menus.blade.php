@foreach ($menus as $menu_list)
  <option value="{{$menu_list->id ?? ""}}"

  @isset($menu->id)

    @if ($menu->parent_id == $menu_list->id)
selected=""
    @endif

    @if ($menu->id == $menu_list->id)
      hidden=""
    @endif

  @endisset
  >
  {!! $delimiter ?? "" !!}{{$menu_list->title ?? ""}}
</option>

@if (count($menu_list->children) > 0)
@include('admin.menus.partials.menus', [
'menus' => $menu_list->children,
'delimiter' => '-' . $delimiter
 ])
@endif
@endforeach
