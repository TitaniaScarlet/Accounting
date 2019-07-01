
@forelse ($menus as $menu_list)
  <tr>
  <td><a href="{{route('admin.menu.show', $menu_list)}}">{!! $delimiter ?? "" !!}{{$menu_list->title ?? ""}}</a></td>
  <td>{{$menu_list->price ?? ""}}</td>
  <td class="text-right">
    <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.menu.destroy', $menu_list)}}" method="post">
       <input type="hidden" name="_method" value="delete">
       @csrf

       <a href="{{route('admin.menu.edit', $menu_list)}}"><i class="far fa-edit"></i></a>

       <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
    </form>

  </td>

  </tr>
@if (count($menu_list->children) > 0)
@include('admin.menus.partials.menu_index', [
'menus' => $menu_list->children,
'delimiter' => '-' . $delimiter
 ])
@endif
@empty
  <tr>
    <td colspan="3" class="text-center"><h4>Данные отсутствуют</h4></td>
  </tr>
@endforelse
