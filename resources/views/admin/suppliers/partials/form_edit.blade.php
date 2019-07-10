<div class="row">
  <div class="col-sm-6">
    <label for="">Наименование</label>
    <input type="text" class="form-control" name="title" placeholder="Наименование организации" value="{{$supplier->title ?? ""}}" required>
  </div>
  <div class="col-sm-2">
    <label for="">УНП</label>
    <input type="text" class="form-control" name="unp" placeholder="УНП" value="{{$supplier->unp ?? ""}}" maxlength="9" required>
  </div>
  <div class="col-sm-4">
    <label for="">Email</label>
    <input type="email" class="form-control" name="Email" placeholder="Email" value="{{$supplier->Email ?? ""}}">
  </div>
  </div>
  <br>
  <div class="row">
<div class="col-sm-12"><h4>Фактический адрес</h4></div>
  <div class="col-sm-10">
    <label for="">Адрес</label>
    <input type="text" class="form-control" name="address" placeholder="Адрес" value="{{$supplier->address ?? ""}}">
  </div>
  <div class="col-sm-2">
    <label for="">Индекс</label>
    <input type="text" class="form-control" name="index" placeholder="Индекс" value="{{$supplier->index ?? ""}}" maxlength="6">
  </div>
  </div>
  <br>
  <div class="row">
  <div class="col-sm-12"><h4>Юридический адрес</h4></div>
      <div class="col-sm-10">
      <label for="">Адрес</label>
      <input type="text" class="form-control" name="address_legal" placeholder="Адрес" value="{{$supplier->address_legal ?? ""}}">
    </div>
    <div class="col-sm-2">
      <label for="">Индекс</label>
      <input type="text" class="form-control" name="index_legal" placeholder="Индекс" value="{{$supplier->index_legal ?? ""}}" maxlength="6">
    </div>
      </div>
    <br>
<input class="btn btn-primary" type="submit"  value="Сохранить">
