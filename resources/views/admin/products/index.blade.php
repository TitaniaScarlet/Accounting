@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">
    @component('admin.components.breadcrumb')
      @slot('title') Список товаров @endslot
        @slot('parent') Главная @endslot
          @slot('active') Товары @endslot
          @endcomponent

          <hr>

          <a href="{{route('admin.product.create')}}" class="btn btn-primary float-right" role="button"><i class="far fa-plus-square"> Добавить товар</i></a>
          <br><br><br>
          <table class="table table-striped">
            <thead>
              <th>Наименование</th>
              <th>Категория</th>
              <th>Количество</th>
              <th>Производитель</th>
              <th>Страна</th>
              <th class="text-right">Действие</th>
            </thead>
            <tbody>
              @forelse ($products as $product)
                <tr>
                  <td>{{$product->product_name}}</td>

                   <td>
                      @foreach ($product->categories as $category)
                    <p class="list-group-item-text">{{$category->title}}</p>
                  @endforeach
                </td>
                  <td>{{$product->quantity}} {{$product->unit->type}}
                {{-- @foreach ($units->product as $unit)
                  {{$unit->type ?? ""}}
                @endforeach --}}
                             </td>
                  <td>{{$product->manufacturer}}</td>
                  <td>{{$product->country}}</td>
                  <td class="text-right">
                    <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.product.destroy', $product)}}" method="post">
                      <input type="hidden" name="_method" value="delete">
                      @csrf
                      <a href="{{route('admin.product.edit', $product)}}"><i class="far fa-edit"></i></a>
                      <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="text-center"><h4>Данные отсутствуют</h4></td>
                </tr>
              @endforelse
            </tbody>
            <tfoot>
              <tr>
                <td colspan="6">
                  <ul class="pagination float-right">
                    {{$products->links()}}
                  </ul>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      @endsection
