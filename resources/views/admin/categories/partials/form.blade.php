

<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категориии" value="{{$category->title ?? ""}}" required>

<label for="">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$category->slug ?? ""}}" readonly="">

<label for="">Родительская категория</label>
<select type="text" class="form-control" name="parent_id">
<option value="0">-- без родительской категории --</option>
@include('admin.categories.partials.categories', ['categories' => $categories])
</select>

<br>

<input class="btn btn-primary" type="submit"  value="Сохранить">
