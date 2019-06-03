<div class="row">
  <div class="col-sm-6">
    <label for="">Наименование</label>
    <input type="text" class="form-control" name="title" placeholder="Наименование организации" value="{{$supplier->title ?? ""}}" required>
  </div>
  <div class="col-sm-3">
    <label for="">УНП</label>
    <input type="text" class="form-control" name="unp" placeholder="УНП" value="{{$supplier->unp ?? ""}}" maxlength="9" required>
  </div>
  <div class="col-sm-3">
    <label for="">Номер телефона</label>
    <input type="text" class="form-control" name="phone_number" placeholder="Номер телефона" value="{{$supplier->phone_number ?? ""}}" required>
  </div>

  <div class="col-sm-3">
    <label for="">Страна</label>
    <input type="text" class="form-control" name="country" placeholder="Страна" value="{{$supplier->country ?? ""}}" required>
  </div>
  <div class="col-sm-3">
    <label for="">Город</label>
    <input type="text" class="form-control" name="city" placeholder="Город" value="{{$supplier->city ?? ""}}" required>
  </div>
  <div class="col-sm-4">
    <label for="">Адрес</label>
    <input type="text" class="form-control" name="address" placeholder="Адрес" value="{{$supplier->address ?? ""}}" required>
  </div>
  <div class="col-sm-2">
    <label for="">Индекс</label>
    <input type="text" class="form-control" name="index" placeholder="Индекс" value="{{$supplier->index ?? ""}}" maxlength="6" required>
  </div>
</div>
<br>
<input class="btn btn-primary" type="submit"  value="Сохранить">
