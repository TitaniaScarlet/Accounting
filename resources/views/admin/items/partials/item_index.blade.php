
@forelse ($items as $item_list)
  <tr>
  <td>{!! $delimiter ?? "" !!}{{$item_list->title ?? ""}}</td>
  <td class="text-right">
    <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.item.destroy', $item_list)}}" method="post">
       <input type="hidden" name="_method" value="delete">
       @csrf

       <a href="{{route('admin.item.edit', $item_list)}}"><i class="far fa-edit"></i></a>

       <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
    </form>

  </td>

  </tr>
@if (count($item_list->children) > 0)
@include('admin.items.partials.item_index', [
'items' => $item_list->children,
'delimiter' => '-' . $delimiter
 ])
@endif
@empty
  <tr>
    <td colspan="2" class="text-center"><h4>Данные отсутствуют</h4></td>
  </tr>
@endforelse
