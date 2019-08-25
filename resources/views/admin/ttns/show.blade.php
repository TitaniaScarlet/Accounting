@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

    @component('admin.components.breadcrumb')
      @slot('title')Страница товара@endslot
        @slot('parent')Главная@endslot
          @slot('active')Товары@endslot
          @endcomponent

<div class="row">
  <div class="col-sm-3">
    Дата: <p><b>{{$ttn->date}}</b></p>
  </div>
  <div class="col-sm-3">
    Серия и номер ТТН: <p><b>{{$ttn->number}}</b></p>
  </div>
  <div class="col-sm-6">
    Поставщик: <p><b>{{$ttn->supplier->title}}</b></p>
  </div>
</div>

<div class="row">
  <div class="col-sm-3">
    Сумма, р: <p><b>{{$ttn->accounting_sum}}</b></p>
  </div>
  <div class="col-sm-3">
    Сумма НДС, р.: <p><b>{{$ttn->vat_sum}}</b></p>
  </div>
  <div class="col-sm-3">
    Сумма c НДС, р.: <p><b>{{$ttn->sum}}</b></p>
  </div>
</div>

<ttnproduct-component :ttn={{$ttn->id}}></ttnproduct-component>
<br>
<table class="table table-striped">
  <thead>
    <th>Товар</th>
    <th>Цена</th>
    <th>Количество</th>
    <th>Сумма</th>
    <th>Ставка НДС, %</th>
    <th>Сумма НДС, р</th>
    <th>Сумма с НДС, р</th>
      <th class="text-right">Действие</th>
  </thead>
  <tbody>
    @forelse ($ttn->ttnproducts as $ttnproduct)
        <tr>
        <td>{{$ttnproduct->product->product_name}}, {{$ttnproduct->product->manufacturer}},
          {{$ttnproduct->product->quantity}} {{$ttnproduct->product->unit->type}}</td>
          <td>{{$ttnproduct->accounting_price}}</td>
        <td>{{$ttnproduct->quantity}} {{$ttnproduct->unit->type}}</td>
        <td>{{$ttnproduct->accounting_sum}}</td>
        <td>{{$ttnproduct->vat_rate}}</td>
        <td>{{$ttnproduct->vat_sum}}</td>
        <td>{{$ttnproduct->sum}}</td>
        <td class="text-right">
          <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.ttnproduct.destroy', $ttnproduct)}}" method="post">
            <input type="hidden" name="_method" value="delete">
            @csrf
            <a href="{{route('admin.ttnproduct.edit', $ttnproduct)}}"><i class="far fa-edit"></i></a>
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
    <td colspan="3">Итого</td>
    <td>{{$accounting_sum}}</td>
    <td></td>
    <td>{{$vat_sum}}</td>
    <td>{{$sum}}</td>
    <td></td>
  </tfoot>
</table>
</div>
@endsection
