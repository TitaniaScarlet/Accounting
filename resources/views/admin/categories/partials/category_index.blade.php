
@forelse ($categories as $category_list)
  <tr>
  <td>{!! $delimiter ?? "" !!}{{$category_list->title ?? ""}}</td>
  <td class="text-right">
    <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.category.destroy', $category_list)}}" method="post">
       <input type="hidden" name="_method" value="delete">
       @csrf

       <a href="{{route('admin.category.edit', $category_list)}}"><i class="far fa-edit"></i></a>

       <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
    </form>

  </td>

  </tr>
@if (count($category_list->children) > 0)
@include('admin.categories.partials.category_index', [
'categories' => $category_list->children,
'delimiter' => '-' . $delimiter
 ])
@endif
@empty
  <tr>
    <td colspan="2" class="text-center"><h4>Данные отсутствуют</h4></td>
  </tr>
@endforelse
