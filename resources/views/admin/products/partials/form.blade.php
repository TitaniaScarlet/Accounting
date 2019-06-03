<div class="row">
  <div class="col-sm-4">
    <label for="">Наименование товара</label>
    <input type="text" class="form-control" name="product_name" placeholder="Наименование товара" value="{{$product->product_name ?? ""}}" required>
    <br>
    <label for="">Производитель</label>
    <input type="text" class="form-control" name="manufacturer" placeholder="Производитель" value="{{$product->manufacturer ?? ""}}" required>
    <br>

  </div>

  <div class="col-sm-4">
    <label for="">Slug</label>
    <input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$product->slug ?? ""}}" readonly="">
      <br>
    <label for="">Страна производства</label>
    <input type="text" class="form-control" name="country" placeholder="Страна производства" value="{{$product->country ?? ""}}" required>
    <br>

  </div>

  <div class="col-sm-4">
    <label for="">Категория</label>
    <select  class="form-control" name="categories[]" multiple="multiple">
    @include('admin.products.partials.categories', ['categories' => $categories])
    </select>
  </div>

<div class="col-sm-4">
  <label for="">Количество</label>
  <input type="text" class="form-control" name="quantity" placeholder="Количество" value="{{$product->quantity ?? ""}}" required>
</div>

<div class="col-sm-4">
  <label for="">Еденица измерения</label>
    <select class="form-control" name="units">
      @foreach ($units as $unit)
        <option value="{{$unit->id ?? ""}}">{{$unit->type ?? ""}}</option>
      @endforeach
</div>
</div>






  </select>






<br>
<input class="btn btn-primary" type="submit"  value="Сохранить">
