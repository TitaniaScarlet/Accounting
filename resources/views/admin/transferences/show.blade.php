@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

    @component('admin.components.breadcrumb')
      @slot('title')Страница товара@endslot
        @slot('parent')Главная@endslot
          @slot('active')Товары@endslot
          @endcomponent

<br>
<div class="row">
  <div class="col-sm-6">
    <h5><b>{{$transference->product->product_name}}, {{$transference->product->manufacturer}},
      {{$transference->product->quantity}} {{$transference->product->unit->type}}</b></h5>
  </div>
  <div class="col-sm-2">
    <p>Колчество: <b>{{$transference->quantity}} {{$transference->unit->type}}</b></p>
  </div>
<div class="col-sm-4">
@foreach ($transference->subdivisions as $subdivision)
  <p>Подразделение: <b>{{$subdivision->name}}</b></p>
@endforeach
</div>

</div>
<hr>
<div class="row">
  <div class="col-sm-3">
    <p>Серия и номер ТТН: <b>{{$transference->ttn->number}}</b></p>
  </div>
  <div class="col-sm-3">
<p>Дата: <b>{{$transference->date}}</b></p>
  </div>
  <div class="col-sm-6">
<p>Поставщик: <b>{{$transference->ttn->supplier->title}}</b></p>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-sm-3">
    <p>Цена, р: <b>{{$transference->price}}</b></p>
  </div>
  <div class="col-sm-3">
    @foreach ($transference->vats as $vat)
      <p>Ставка НДС, р: <b>{{$vat->vat_rate}}</b></p>
    @endforeach
  </div>
  <div class="col-sm-3">
    @foreach ($transference->vats as $vat)
      <p>Сумма НДС, р: <b>{{$vat->vat_input}}</b></p>
    @endforeach
  </div>
  <div class="col-sm-3">
<p>Учетная цена, р: <b>{{$transference->accounting_price}}</b></p>
  </div>

</div>
</div>
      @endsection
