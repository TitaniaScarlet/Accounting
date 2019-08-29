<input type="hidden" name="supplier" value="{{$supplier->id}}">
<div class="row">
<div class="col-sm-3">
  <label for="">Код</label>
  <input type="text" class="form-control" name="code" placeholder="Код" value="{{$phone->code ?? ""}}" required>
</div>
<div class="col-sm-3">
  <label for="">Номер телефона</label>
  <input type="text" class="form-control" name="number" placeholder="Номер телефона" value="{{$phone->number ?? ""}}" required>
</div>
<div class="col-sm-3">
  <label for="">Оператор</label>
  <input type="text" class="form-control" name="operator" placeholder="Оператор" value="{{$phone->operator ?? ""}}" required>
</div>

<div class="col-sm-2">
  <br>
  <input class="btn btn-primary" type="submit"  value="Сохранить">
</div>
</div>
