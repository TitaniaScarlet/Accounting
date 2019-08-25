

<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категориии" value="{{$item->title ?? ""}}" required>

<label for="">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$item->slug ?? ""}}" readonly="">

<label for="">Родительская категория</label>
<select type="text" class="form-control" name="parent_id">
<option value="0">-- без родительской статьи расходов --</option>
@include('admin.items.partials.items', ['items' => $items])
</select>

<br>

<input class="btn btn-primary" type="submit"  value="Сохранить">
