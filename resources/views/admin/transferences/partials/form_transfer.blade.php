<div class="row">
  <div class="col-sm-6">
    <label for="">Подразделение</label>
    @foreach ($transference->subdivisions as $subdivision)
      <input type="text" class="form-control" value="{{$subdivision->name ?? ""}}" readonly="">
    @endforeach
  </div>

  <div class="col-sm-6">
    <label for="">Подразделение</label>
    <select  class="form-control" name="subdivisions[]">
      @include('admin.transferences.partials.subdivisions', ['subdivisions' => $subdivisions])
    </select>
    <br>
  </div>
</div>

<div class="row">
  <div class="col-sm-9">
    <label for="">Товар</label>
    <input type="text" class="form-control" name="product_id" placeholder="Количество" value="{{$transference->ttnproduct->product->product_name}}, {{$transference->ttnproduct->product->manufacturer}}, {{$transference->ttnproduct->product->quantity}} {{$transference->ttnproduct->product->unit->type}} " readonly="">
  </div>

  <div class="col-sm-3">
    <h5>Категория: </h5>
     @foreach ($transference->ttnproduct->product->categories as $category)
    <p class="list-group-item-text">{{$category->title}}</p>
    @endforeach
  </div>
</div>

<br>
<div class="row">
  <div class="col-sm-3">
    <label for="">Серия и номер ТТН</label>
    <input type="text" class="form-control" name="ttn" placeholder="Серия и номер ТТН" value="{{$transference->ttnproduct->ttn->number ?? ""}}" maxlength="9" readonly="">
  </div>
  <div class="col-sm-3">
    <label for="">Дата перемещения</label>
    <input type="date" class="form-control" name="date" placeholder="Дата поступления" value="{{$transference->date ?? ""}}" required>
  </div>
</div>
<br>
<div class="row">
  <div class="col-sm-3">
    <label for="">Цена</label>
    <input type="text" class="form-control" name="accounting_price" value="{{$transference->accounting_price ?? ""}}" readonly="">
  </div>
  <div class="col-sm-3">
    <label for="">Количество</label>
    <input type="text" class="form-control" name="quantity" placeholder="Количество" value="{{$transference->quantity ?? ""}}" required>
  </div>
  <div class="col-sm-3">
    <label for="">Еденица измерения</label>
    <input type="text" class="form-control" name="unit_id" placeholder="Количество" value="{{$transference->unit->type}} " readonly="">
  </div>
  <div class="col-sm-3">
      <label for="">Сумма</label>
      <input type="text" class="form-control" name="accounting_sum" value="{{$transference->accounting_sum ?? ""}}">
    </div>
</div>
<hr>
<input class="btn btn-primary" type="submit"  value="Сохранить">
