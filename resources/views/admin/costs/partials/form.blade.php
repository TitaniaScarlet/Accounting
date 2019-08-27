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
      <label for="">Серия и номер ТТН</label>
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
        </select>
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
      <label for="">Сумма, р</label>
      <input type="text" class="form-control" name="accounting_sum" placeholder="Сумма" value="{{$cost->accounting_sum ?? ""}}" required>
    </div>
    <div class="col-sm-3">
      <label for="">Ставка НДС, %</label>
      <input type="text" class="form-control" name="vat_rate" placeholder="Ставка НДС" value="{{$cost->vat_rate ?? ""}}" required>
    </div>
    <div class="col-sm-3">
      <label for="">Сумма НДС, р</label>
      <input type="text" class="form-control" name="vat_sum" placeholder="Сумма НДС" value="{{$cost->vat_sum ?? ""}}" required>
    </div>
    <div class="col-sm-3">
      <label for="">Сумма c НДС, р</label>
      <input type="text" class="form-control" name="sum" placeholder="Сумма с НДС" value="{{$cost->sum ?? ""}}" required>
    </div>
  </div>
  <br>
  <input class="btn btn-primary" type="submit"  value="Сохранить">
