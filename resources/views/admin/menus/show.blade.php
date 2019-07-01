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
            {{-- <a href="{{route('admin.ingredient.edit', $ingredient)}}"><i class="far fa-edit"></i></a> --}}
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
<form-component :menu = "{{$menu->id}}"></form-component>
        </div>
      @endsection
