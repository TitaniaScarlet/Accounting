<input type="hidden" name="supplier" value="{{$supplier->id}}">
<div class="row">
  <div class="col-sm-3">
    <label for="">Дата</label>
    <input type="date" class="form-control" name="date" placeholder="Дата" value="{{$contract->date ?? ""}}" required>
  </div>
  <div class="col-sm-3">
    <label for="">Номер договора</label>
    <input type="text" class="form-control" name="number" placeholder="Номер договора" value="{{$contract->number ?? ""}}" required>
  </div>
  <div class="col-sm-2">
    <br>
    <input class="btn btn-primary" type="submit"  value="Сохранить">
  </div>

    </div>
