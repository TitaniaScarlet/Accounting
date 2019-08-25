<div class="row">
  <div class="col-sm-6">
    <label for="">Товар</label>
    <select class="form-control" name="product_id">
      @foreach ($products as $product)
        <option value="{{$product->id ?? ""}}"
          @isset($ttnproduct->product_id)
            @if ($ttnproduct->product_id == $product->id)
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
        <div class="col-sm-3">
          <label for="">Подразделение</label>
          <select  class="form-control" name="subdivisions">
            @foreach ($subdivisions as $subdivision)
              <option value="{{$subdivision->id ?? ""}}"
                @isset($ttnproduct->subdivisions)
            @foreach ($ttnproduct->subdivisions as $subdivision_ttnproduct)
            @if ($subdivision->id == $subdivision_ttnproduct->id)
            selected = ""
            @endif
            @endforeach
                @endisset
            >
            {{$subdivision->name ?? ""}}
            </option>
            @endforeach
          </select>
      </div>
      <div class="col-sm-3">
        <label for="">Номер ТТН</label>
        <select  class="custom-select" name="ttn">
          @foreach ($ttns as $ttn)
            <option value="{{$ttn->id ?? ""}}"
              @isset($ttnproduct->ttn_id)
          @if ($ttn->id == $ttnproduct->ttn_id)
          selected = ""
          @endif
              @endisset
          >
          {{$ttn->number ?? ""}}
          </option>
          @endforeach
        </select>
      </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3">
      <label for="">Цена, р</label>
      <input type="text" class="form-control" name="accounting_price" placeholder="Учетная цена" value="{{$ttnproduct->accounting_price ?? ""}}" required>
    </div>
    <div class="col-sm-3">
      <label for="">Количество</label>
      <input type="text" class="form-control" name="quantity" placeholder="Количество" value="{{$ttnproduct->quantity ?? ""}}" required>
    </div>
    <div class="col-sm-3">
      <label for="">Еденица измерения</label>
      <select class="form-control" name="unit_id">
        @foreach ($units as $unit)
          <option value="{{$unit->id ?? ""}}"
            @isset($ttnproduct->unit_id)

            @if ($ttnproduct->unit_id == $unit->id)
        selected=""
            @endif
      @endisset
            >{{$unit->type ?? ""}}</option>
        @endforeach
      </select>
    </div>
</div>
<br>
<div class="row">
  <div class="col-sm-3">
    <label for="">Сумма, р</label>
    <input type="text" class="form-control" name="accounting_sum" placeholder="Сумма" value="{{$ttnproduct->accounting_sum ?? ""}}" required>
  </div>
  <div class="col-sm-3">
    <label for="">Ставка НДС, %</label>
    <input type="text" class="form-control" name="vat_rate" placeholder="Ставка НДС" value="{{$ttnproduct->vat_rate ?? ""}}" required>
  </div>
  <div class="col-sm-3">
    <label for="">Сумма НДС, р</label>
    <input type="text" class="form-control" name="vat_input" placeholder="Сумма НДС" value="{{$ttnproduct->vat_sum ?? ""}}" required>
  </div>
  <div class="col-sm-3">
    <label for="">Сумма с НДС, р</label>
    <input type="text" class="form-control" name="sum" placeholder="Сумма с НДС" value="{{$ttnproduct->sum ?? ""}}" required>
  </div>
</div>
<hr>
<input class="btn btn-primary" type="submit"  value="Сохранить">
