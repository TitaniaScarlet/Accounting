
    <label for="">Товар</label>
    <select class="form-control" name="product_id">
      @foreach ($products as $product)
        <option value="{{$product->id ?? ""}}">{{$product->product_name ?? ""}}, {{$product->manufacturer}}, {{$product->quantity}} {{$product->unit->type}},
          <h4>Категория: </h4>
          @foreach ($product->categories as $category)
         <h5 class="list-group-item-text text-center">{{$category->title}}</h5>,
         @endforeach
        </option>
            @endforeach
    </select>

<div class="row">
  <div class="col-sm-3">
    <label for="">Подразделение</label>
    <select  class="form-control" name="subdivisions[]">
      @include('admin.transferences.partials.subdivisions', ['subdivisions' => $subdivisions])
    </select>
    <br>
    <label for="">Количество</label>
    <input type="text" class="form-control" name="quantity" placeholder="Количество" value="{{$transference->quantity ?? ""}}" required>
  </div>

  <div class="col-sm-3">
    <label for="">Серия и номер ТТН</label>
    <input type="text" class="form-control" name="ttn" placeholder="Серия и номер ТТН" value="{{$transference->ttn ?? ""}}" maxlength="9" required>
    <br>
    <label for="">Еденица измерения</label>
    <select class="form-control" name="unit_id">
      @foreach ($units as $unit)
        <option value="{{$unit->id ?? ""}}">{{$unit->type ?? ""}}</option>
      @endforeach
    </select>
  </div>

  <div class="col-sm-3">
    <label for="">Дата поступления</label>
    <input type="date" class="form-control" name="date" placeholder="Дата поступления" value="{{$transference->date ?? ""}}" required>
    <br>
    <label for="">Цена</label>
    <input type="text" class="form-control" name="price" placeholder="Цена" value="{{$transference->price ?? ""}}" required>
  </div>

  <div class="col-sm-3">
    <label for="">Поставщик</label>
    <select  class="form-control" name="suppliers[]">
      @include('admin.transferences.partials.suppliers', ['suppliers' => $suppliers])
    </select>
    <br>
    <label for="">Slug</label>
    <input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$transference->slug ?? ""}}" readonly="">
  </div>
</div>

<hr>
<input class="btn btn-primary" type="submit"  value="Сохранить">
