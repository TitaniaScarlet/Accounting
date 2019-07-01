<div class="row">
  <div class="col-sm-5">
    <label for="">Наименование</label>
    <input type="text" class="form-control" name="title" placeholder="Заголовок категориии" value="{{$menu->title ?? ""}}" required>

  </div>
  <div class="col-sm-4">
    <label for="">Родительская категория</label>
    <select type="text" class="form-control" name="parent_id">
    <option value="0">-- без родительской категории --</option>
    @include('admin.menus.partials.menus', ['menus' => $menus])
    </select>

  </div>
  <div class="col-sm-3">
    <label for="">Цена</label>
    <input type="text" class="form-control" name="price" placeholder="Цена" value="{{$menu->price ?? ""}}"> 
  </div>


</div>
<br>
<label for="">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$menu->slug ?? ""}}" readonly="">
{{-- <form-component
  {{-- :categories = "{{json_encode($categories)}}"
    :units = "{{json_encode($units)}}" --}}
    {{-- > --}}

  {{-- </form-component> --}}
