<label for="">Наименование подразделения</label>
<input type="text" class="form-control" name="name" placeholder="Наименование подразделения" value="{{$subdivision->name ?? ""}}" required>

<label for="">Тип подразделения</label>
<p><input name="type" type="radio" value="store">Магазин</p>
<p><input name="type" type="radio" value="storage">Склад</p>

<label for="">Адрес</label>
<input type="text" class="form-control" name="address" placeholder="Адрес" value="{{$subdivision->address ?? ""}}">

<label for="">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$subdivision->slug ?? ""}}" readonly="">



<br>
<input class="btn btn-primary" type="submit"  value="Сохранить">
