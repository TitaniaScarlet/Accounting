@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">
    @component('admin.components.breadcrumb')
      @slot('title') Список поставщиков @endslot
        @slot('parent') Главная @endslot
          @slot('active') Поставщики @endslot
          @endcomponent

          <hr>

          <a href="{{route('admin.supplier.create')}}" class="btn btn-primary float-right" role="button"><i class="far fa-plus-square"> Добавить поставщика</i></a>
          <br><br><br>
          <table class="table table-striped">
            <thead>
              <th>Наименование</th>
              <th>УНП</th>
              <th>Страна</th>
              <th>Город</th>
              <th>Адрес</th>
              <th>Индекс</th>
              <th>Телефон</th>
              <th class="text-right">Действие</th>
            </thead>
            <tbody>
              @forelse ($suppliers as $supplier)
                <tr>
                  <td>{{$supplier->title}}</td>
                  <td>{{$supplier->unp}}</td>
                  <td>{{$supplier->country}}</td>
                  <td>{{$supplier->city}}</td>
                  <td>{{$supplier->address}}</td>
                  <td>{{$supplier->index}}</td>
                  <td>{{$supplier->phone_number}}</td>
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
                    {{$suppliers->links()}}
                  </ul>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      @endsection
