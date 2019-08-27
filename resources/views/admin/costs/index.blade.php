@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">


    @component('admin.components.breadcrumb')
      @slot('title') Список расходов @endslot
        @slot('parent') Главная @endslot
          @slot('active') Расходы @endslot
          @endcomponent
          <hr>

          <a href="{{route('admin.cost.create')}}" class="btn btn-primary float-right" role="button"><i class="far fa-plus-square"> Добавить расходы</i></a>
          <br><br><br>
          <table class="table table-striped">
            <thead>
              <th>Статья расходов</th>
              <th>Дата</th>
              <th>Номер</th>
              <th>Поставщик</th>
              <th>Описание</th>
              <th>Сумма, р.</th>
              <th>НДС, р.</th>
              <th>Сумма c НДС, р.</th>
              <th class="text-right">Действие</th>
            </thead>
            <tbody>
              @forelse ($costs as $cost)
                <tr>
                  <td>
@foreach ($cost->items as $item)
    {{$item->title}}<br>
@endforeach
                  </td>
                  <td>{{$cost->date}}</td>
                  <td>{{$cost->number}}</td>
                  <td>{{$cost->supplier->title}}</td>
                  <td><a href="{{route('admin.cost.show', $cost)}}">{{$cost->description}}</a></td>
                  <td>{{$cost->accounting_sum}}</td>
                   <td>{{$cost->vat_sum}}</td>
                  <td>{{$cost->sum}}</td>
                  <td class="text-right">
                    <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.cost.destroy', $cost)}}" method="post">
                      <input type="hidden" name="_method" value="delete">
                      @csrf
                      <a href="{{route('admin.cost.edit', $cost)}}"><i class="far fa-edit"></i></a>
                      <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="8" class="text-center"><h4>Данные отсутствуют</h4></td>
                </tr>
              @endforelse
            </tbody>
            <tfoot>
              <tr>
                <td colspan="8">
                  <ul class="pagination float-right">
                    {{$costs->links()}}
                  </ul>
                </td>
              </tr>
            </tfoot>
          </table>

        </div>
      @endsection
