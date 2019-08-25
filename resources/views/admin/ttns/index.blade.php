@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">


    @component('admin.components.breadcrumb')
      @slot('title') Список товарно-транспортных накладных @endslot
        @slot('parent') Главная @endslot
          @slot('active') Товарно-транспортные накладные @endslot
          @endcomponent
          <hr>

          <a href="{{route('admin.ttn.create')}}" class="btn btn-primary float-right" role="button"><i class="far fa-plus-square"> Создать ттн</i></a>
          <br><br><br>
          <table class="table table-striped">
            <thead>
              <th>Дата</th>
              <th>Номер</th>
              <th>Поставщик</th>
              <th>Сумма, р.</th>
              <th>НДС, р.</th>
              <th>Сумма c НДС, р.</th>
              <th class="text-right">Действие</th>
            </thead>
            <tbody>
              @forelse ($ttns as $ttn)
                <tr>
                  <td>{{$ttn->date}}</td>
                  <td><a href="{{route('admin.ttn.show', $ttn)}}">{{$ttn->number}}</a></td>
                  <td>{{$ttn->supplier->title}}</td>
                  <td>{{$ttn->accounting_sum}}</td>
                  <td>{{$ttn->vat_sum}}</td>
                  <td>{{$ttn->sum}}</td>
                  <td class="text-right">
                    <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.ttn.destroy', $ttn)}}" method="post">
                      <input type="hidden" name="_method" value="delete">
                      @csrf
                      <a href="{{route('admin.ttn.edit', $ttn)}}"><i class="far fa-edit"></i></a>
                      <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center"><h4>Данные отсутствуют</h4></td>
                </tr>
              @endforelse
            </tbody>
            <tfoot>
              <tr>
                <td colspan="7">
                  <ul class="pagination float-right">
                    {{$ttns->links()}}
                  </ul>
                </td>
              </tr>
            </tfoot>
          </table>

        </div>
      @endsection
