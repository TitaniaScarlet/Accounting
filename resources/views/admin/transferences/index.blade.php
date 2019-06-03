@extends('admin.layouts.app_admin')

@section('content')
      @component('admin.components.breadcrumb')
      @slot('title') Список движения товаров @endslot
        @slot('parent') Главная @endslot
          @slot('active') Движение товаров @endslot
          @endcomponent

          <hr>

          <a href="{{route('admin.transference.create')}}" class="btn btn-primary float-right" role="button"><i class="far fa-plus-square"> Поступление товара</i></a>
          <br><br><br>
          <table class="table table-striped">
            <thead>
              <th>Подразделение</th>
              <th>ТТН</th>
              <th>Дата</th>
              <th>Категория</th>
              <th>Наименование</th>
              <th>Поставщик</th>
              <th>Количество</th>
              <th>Цена</th>
              <th class="text-right">Действие</th>
            </thead>
            <tbody>
              @forelse ($transferences as $transference)
                <tr>
                  <td>
                    @foreach ($transference->subdivisions as $subdivision)
                      <p class="list-group-item-text">{{$subdivision->name}}</p>
                    @endforeach
                  </td>
                  <td>{{$transference->ttn}}</td>
                  <td>{{$transference->date}}</td>
                  <td>
                    @foreach ($transference->product->categories as $category)
                <p class="list-group-item-text">{{$category->title}}</p>
              @endforeach
            </td>
                  <td>{{$transference->product->product_name}}, {{$transference->product->manufacturer}},
                    {{$transference->product->quantity}} {{$transference->product->unit->type}}</td>
                    <td>
                      @foreach ($transference->suppliers as $supplier)
                        <p class="list-group-item-text">{{$supplier->title}}</p>
                      @endforeach
                    </td>
                  <td>{{$transference->quantity}} {{$transference->unit->type}}</td>
                  <td>{{$transference->price}} р.</td>
                  <td class="text-right">
                    <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.transference.destroy', $transference)}}" method="post">
                      <input type="hidden" name="_method" value="delete">
                      @csrf
                      <a href="{{route('admin.transference.edit', $transference)}}"><i class="fas fa-exchange-alt"></i></a>
                      <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="9" class="text-center"><h4>Данные отсутствуют</h4></td>
                </tr>
              @endforelse
            </tbody>
            <tfoot>
              <tr>
                <td colspan="9">
                  <ul class="pagination float-right">
                    {{$transferences->links()}}
                  </ul>
                </td>
              </tr>
            </tfoot>
          </table>

      @endsection
