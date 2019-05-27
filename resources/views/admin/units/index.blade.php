@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">
    @component('admin.components.breadcrumb')
      @slot('title') Список единиц измерения @endslot
        @slot('parent') Главная @endslot
          @slot('active') Единицы измерения @endslot
          @endcomponent

          <hr>

          <a href="{{route('admin.unit.create')}}" class="btn btn-primary float-right" role="button"><i class="far fa-plus-square"> Добавить единицу измерения</i></a>
          <br><br><br>
          <table class="table table-striped">
            <thead>
              <th>Тип</th>
              <th class="text-right">Действие</th>
            </thead>
            <tbody>
              @forelse ($units as $unit)
                <tr>
                  <td>{{$unit->type}}</td>
                                    <td class="text-right">
                    <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.unit.destroy', $unit)}}" method="post">
                      <input type="hidden" name="_method" value="delete">
                      @csrf
                      <a href="{{route('admin.unit.edit', $unit)}}"><i class="far fa-edit"></i></a>
                      <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="2" class="text-center"><h4>Данные отсутствуют</h4></td>
                </tr>
              @endforelse
            </tbody>
            <tfoot>
              <tr>
                <td colspan="2">
                  <ul class="pagination float-right">
                    {{$units->links()}}
                  </ul>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      @endsection
