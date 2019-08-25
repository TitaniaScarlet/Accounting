<div class="row">
  <div class="col-sm-3">
    <label>Дата</label>
    <input type="date" class="form-control" name="date" placeholder="Дата" value="{{$cost->date ?? ""}}" required>
  </div>
  <div class="col-sm-4">
    <label>Номер документа</label>
    <input type="text" class="form-control" name="number" placeholder="Номер документа" value="{{$cost->number ?? ""}}" required>

  </div>
  <div class="col-sm-5">
    <label for="">Поставщик</label>
    <select  class="form-control" name="suppliers">
      @foreach ($suppliers as $supplier)
        <option value="{{$supplier->id ?? ""}}"
          @isset($ttn->supplier_id)
            @if ($ttn->supplier_id == $supplier->id)
              selected=""
            @endif
          @endisset
          >{{$supplier->title ?? ""}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-2">
      {{-- <label for="">Серия и номер ТТН</label>
      <select  class="custom-select" name="ttn">
        @foreach ($ttns as $ttn)
          <option value="{{$ttn->id ?? ""}}"
            @isset($ttn->ttn_id)
              @if ($ttn->ttn_id == $ttn->id)
                selected=""
              @endif
            @endisset
            >{{$ttn->number ?? ""}}</option>
          @endforeach
        </select> --}}
    </div>
    <div class="col-sm-4">
      <label>Статья расходов</label>
      <select  class="form-control" name="items[]" multiple="multiple">
        @include('admin.costs.partials.items', ['items' => $items])
      </select>
    </div>
    <div class="col-sm-6">
      <label for="">Описание</label>
      <textarea class="form-control"  name="description" rows="4" cols="40">{{$cost->description ?? ""}}</textarea>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-3">
      <label for="">Цена, р</label>
      <input type="text" class="form-control" name="price" placeholder="Цена" value="{{$cost->price ?? ""}}" required>
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
      <label for="">Учетная цена, р</label>
      <input type="text" class="form-control" name="accounting_price" placeholder="Учетная цена" value="{{$cost->accounting_price ?? ""}}" required>
    </div>
  </div>
  <br>
  <input class="btn btn-primary" type="submit"  value="Сохранить">
