<div class="row">
  <div class="col-sm-8">
    <label for="">Товар</label>
    <select class="form-control" name="product_id">
      @foreach ($products as $product)
        <option value="{{$product->id ?? ""}}"
          @isset($transference->product_id)
            @if ($transference->product_id == $product->id)
        selected=""
            @endif
      @endisset
          >{{$product->product_name ?? ""}}, {{$product->manufacturer}}, {{$product->quantity}} {{$product->unit->type}},
          <h4>Категория: </h4>
          @foreach ($product->categories as $category)
         <h5 class="list-group-item-text text-center">{{$category->title}}</h5>,
         @endforeach
        </option>
            @endforeach
    </select>
  </div>
  <div class="col-sm-4">
    <label for="">Подразделение</label>
    <select  class="form-control" name="subdivisions[]">
      @include('admin.transferences.partials.subdivisions', ['subdivisions' => $subdivisions])
    </select>
  </div>
</div>

<br>
<ttn-component></ttn-component>
<br>
<div class="row">
  <div class="col-sm-3">
    <label for="">Учетная цена, р</label>
    <input type="text" class="form-control" name="accounting_price" placeholder="Учетная цена" value="{{$transference->accounting_price ?? ""}}" required>
  </div>
  <div class="col-sm-3">
    <label for="">Количество</label>
    <input type="text" class="form-control" name="quantity" placeholder="Количество" value="{{$transference->quantity ?? ""}}" required>
  </div>
  <div class="col-sm-3">
    <label for="">Еденица измерения</label>
    <select class="form-control" name="unit_id">
      @foreach ($units as $unit)
        <option value="{{$unit->id ?? ""}}"
          @isset($transference->unit_id)

          @if ($transference->unit_id == $unit->id)
      selected=""
          @endif
    @endisset
          >{{$unit->type ?? ""}}</option>
      @endforeach
    </select>
  </div>

</div>

<div class="row">
  <div class="col-sm-3">
    <label for="">Сумма, р</label>
    <input type="text" class="form-control" name="accounting_sum" placeholder="Сумма" value="{{$transference->accounting_sum ?? ""}}" required>
  </div>
  <div class="col-sm-3">
    <label for="">Ставка НДС, %</label>
    <input type="text" class="form-control" name="vat_rate" placeholder="Ставка НДС" value="{{$vat->vat_rate ?? ""}}" required>
  </div>
  <div class="col-sm-3">
    <label for="">Сумма НДС, р</label>
    <input type="text" class="form-control" name="vat_input" placeholder="Сумма НДС" value="{{$vat->vat_input ?? ""}}" required>
  </div>
  <div class="col-sm-3">
    <label for="">Сумма с НДС, р</label>
    <input type="text" class="form-control" name="sum" placeholder="Сумма с НДС" value="{{$transference->sum ?? ""}}" required>
  </div>
</div>
<hr>
<input class="btn btn-primary" type="submit"  value="Сохранить">
