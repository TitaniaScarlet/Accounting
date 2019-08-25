<div class="row">
  <div class="col-sm-3">
    <label for="">Дата</label>
    <input type="date" class="form-control" name="date" placeholder="Дата" value="{{$ttn->date ?? ""}}" required>
  </div>
  <div class="col-sm-3">
    <label for="">Серия и номер</label>
    <input type="text" class="form-control" name="number" placeholder="Номер" value="{{$ttn->number ?? ""}}" maxlength="9" required>
  </div>
  <div class="col-sm-6">
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
  <div class="col-sm-3">
    <label for="">Сумма, р.</label>
    <input type="text" class="form-control" name="accounting_sum" placeholder="Сумма" value="{{$ttn->accounting_sum ?? ""}}" required>
  </div>
  <div class="col-sm-3">
    <label for="">Сумма НДС, р.</label>
    <input type="text" class="form-control" name="vat_sum" placeholder="Сумма НДС" value="{{$ttn->vat_sum ?? ""}}" required>
  </div>
  <div class="col-sm-3">
    <label for="">Сумма c НДС, р.</label>
    <input type="text" class="form-control" name="sum" placeholder="Сумма c НДС" value="{{$ttn->sum ?? ""}}" required>
  </div>
</div>
<br>
<input class="btn btn-primary" type="submit"  value="Сохранить">
