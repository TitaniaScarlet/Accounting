@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">
    @component('admin.components.breadcrumb')
      @slot('title') Список подразделений @endslot
        @slot('parent') Главная @endslot
          @slot('active') Подразделения @endslot
          @endcomponent

          <hr>

          <a href="{{route('admin.subdivision.create')}}" class="btn btn-primary float-right" role="button"><i class="far fa-plus-square"> Добавить подразделение</i></a>
          <br><br><br>
          <table class="table table-striped">
            <thead>
              <th>Наименование</th>
              <th>Тип</th>
              <th>Адрес</th>
              <th class="text-right">Действие</th>
            </thead>
            <tbody>
              @forelse ($subdivisions as $subdivision)
                <tr>
                  <td>{{$subdivision->name}}</td>                
                    @if ($subdivision->type == "store")
                      <td>Магазин</td>
                    @elseif ($subdivision->type == "storage")
                      <td>Склад</td>
                    @endif
                  <td>{{$subdivision->address}}</td>
                  <td class="text-right">
                    <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.subdivision.destroy', $subdivision)}}" method="post">
                      <input type="hidden" name="_method" value="delete">
                      @csrf
                      <a href="{{route('admin.subdivision.edit', $subdivision)}}"><i class="far fa-edit"></i></a>
                      <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="4" class="text-center"><h4>Данные отсутствуют</h4></td>
                </tr>
              @endforelse
            </tbody>
            <tfoot>
              <tr>
                <td colspan="4">
                  <ul class="pagination float-right">
                    {{$subdivisions->links()}}
                  </ul>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      @endsection
