@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

@component('admin.components.breadcrumb')
  @slot('title')Редактирование ингредиентоа@endslot
    @slot('parent')Главная@endslot
      @slot('active')Меню@endslot
@endcomponent



<form class="form-horizontal" action="{{route('admin.ingredient.update', $ingredient)}}" method="post">
  @method('PUT')
    @csrf
    <div class="row">
      <div class="col-sm-6">
        <label for="">Категория</label>
        <select  class="form-control" name="category">
        @include('admin.menus.partials.categories', ['categories' => $categories])
        </select>
      </div>
      <div class="col-sm-2">
        <label for="">Количество</label>
        <input type="text" class="form-control" name="quantity" placeholder="Количество" value="{{$ingredient->quantity ?? ""}}" required>
      </div>
      <div class="col-sm-2">
        <label for="">Еденица измерения</label>
          <select class="form-control" name="unit">
            @foreach ($units as $unit)
              <option value="{{$unit->id ?? ""}}"
                    @isset($ingredient->unit_id)
                      @if ($ingredient->unit_id == $unit->id)
                  selected=""
                      @endif
                @endisset
                >{{$unit->type ?? ""}}</option>
            @endforeach
              </select>
      </div>
    </div>
<hr>
<input class="btn btn-primary" type="submit"  value="Сохранить">

</form>


  </div>
@endsection
