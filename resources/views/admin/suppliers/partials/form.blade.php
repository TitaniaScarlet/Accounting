<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Наименование организации" value="{{$supplier->title ?? ""}}" required>

<label for="">УНП</label>
<input type="text" class="form-control" name="unp" placeholder="УНП" value="{{$supplier->unp ?? ""}}" maxlength="9" required>

<label for="">Страна</label>
<input type="text" class="form-control" name="country" placeholder="Страна" value="{{$supplier->country ?? ""}}" required>

<label for="">Город</label>
<input type="text" class="form-control" name="city" placeholder="Город" value="{{$supplier->city ?? ""}}" required>

<label for="">Адрес</label>
<input type="text" class="form-control" name="address" placeholder="Адрес" value="{{$supplier->address ?? ""}}" required>

<label for="">Индекс</label>
<input type="text" class="form-control" name="index" placeholder="Индекс" value="{{$supplier->index ?? ""}}" maxlength="6" required>

<label for="">Номер телефона</label>
<input type="text" class="form-control" name="phone_number" placeholder="Номер телефона" value="{{$supplier->phone_number ?? ""}}" required>


<br>
<input class="btn btn-primary" type="submit"  value="Сохранить">
