@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">
    @component('admin.components.breadcrumb')
      @slot('title') Список категорий меню@endslot
        @slot('parent') Главная @endslot
          @slot('active') Меню @endslot
          @endcomponent

          <hr>

<h1>{{$menu->title}}</h1>
<form class="form-horizontal" action="{{route('admin.ingredient.store')}}" method="post">
  <input type="hidden" name="menu_id" value="{{$menu->id ?? ""}}">
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
    <input type="text" class="form-control" name="quantity" placeholder="Количество" value="" required>
  </div>
  <div class="col-sm-2">
    <label for="">Еденица измерения</label>
      <select class="form-control" name="unit">
        @foreach ($units as $unit)
          <option value="{{$unit->id ?? ""}}">{{$unit->type ?? ""}}</option>
        @endforeach
          </select>
  </div>
  <div class="col-sm-2">
    <br>
    <input class="btn btn-primary" type="submit"  value="Добавить">
  </div>
</div>
</form>
<table class="table table-striped">
  <thead>
    <th>Категория</th>
    <th>Количество</th>
      <th class="text-right">Действие</th>
  </thead>
  <tbody>
    @forelse ($menu->ingredients as $ingredient)
        <tr>
        <td>{{$ingredient->category->title}}</td>
        <td>{{$ingredient->quantity}} {{$ingredient->unit->type}}</td>
        <td class="text-right">
          <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.ingredient.destroy', $ingredient)}}" method="post">
            <input type="hidden" name="_method" value="delete">
            @csrf
            <a href="{{route('admin.ingredient.edit', $ingredient)}}"><i class="far fa-edit"></i></a>
            <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
          </form>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="3" class="text-center"><h4>Данные отсутствуют</h4></td>
      </tr>
    @endforelse
  </tbody>
  <br>
{{-- <form-component :menu = "{{$menu->id}}"></form-component> --}}
        </div>
      @endsection
