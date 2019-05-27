<label for="">Наименование товара</label>
<input type="text" class="form-control" name="product_name" placeholder="Наименование товара" value="{{$product->product_name ?? ""}}" required>

<label for="">Категория</label>
<select  class="form-control" name="categories[]" multiple="multiple">
@include('admin.products.partials.categories', ['categories' => $categories])
</select>

<label for="">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$product->slug ?? ""}}" readonly="">

<label for="">Количество</label>
<input type="text" class="form-control" name="quantity" placeholder="Количество" value="{{$product->quantity ?? ""}}" required>

<label for="">Еденица измерения</label>
  <select class="form-control" name="units">
    @foreach ($units as $unit)
      <option value="{{$unit->id ?? ""}}">{{$unit->type ?? ""}}</option>
    @endforeach
  </select>

  <label for="">Производитель</label>
  <input type="text" class="form-control" name="manufacturer" placeholder="Производитель" value="{{$product->manufacturer ?? ""}}" required>

  <label for="">Страна производства</label>
  <input type="text" class="form-control" name="country" placeholder="Страна производства" value="{{$product->country ?? ""}}" required>


<br>
<input class="btn btn-primary" type="submit"  value="Сохранить">
