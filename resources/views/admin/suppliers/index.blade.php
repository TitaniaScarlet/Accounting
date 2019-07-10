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
              <th>Телефон</th>
              <th>Email</th>
              <th class="text-right">Действие</th>
            </thead>
            <tbody>
              @forelse ($suppliers as $supplier)
                <tr>
                  <td><a href="{{route('admin.supplier.show', $supplier)}}">{{$supplier->title}}</td>
                  <td>{{$supplier->unp}}</td>
                    <td>
                        @foreach ($supplier->phones as $phone)
                      ({{$phone->code}}) {{$phone->number}}
                      <br>
                      @endforeach
                    </td>
                    <td>{{$supplier->email}}</td>
                  <td class="text-right">
                    <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.supplier.destroy', $supplier)}}" method="post">
                      <input type="hidden" name="_method" value="delete">
                      @csrf
                      <a href="{{route('admin.supplier.edit', $supplier)}}"><i class="far fa-edit"></i></a>
                      <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="text-center"><h4>Данные отсутствуют</h4></td>
                </tr>
              @endforelse
            </tbody>
            <tfoot>
              <tr>
                <td colspan="5">
                  <ul class="pagination float-right">
                    {{$suppliers->links()}}
                  </ul>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      @endsection
