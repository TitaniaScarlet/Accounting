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
  <div class="col-sm-8">
    <h5><b>{{$transference->product->product_name}}, {{$transference->product->manufacturer}},
      {{$transference->product->quantity}} {{$transference->product->unit->type}}</b></h5>
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
    Серия и номер ТТН: <p><b>{{$transference->ttn->number}}</b></p>
  </div>
  <div class="col-sm-3">
Дата: <p><b>{{$transference->date}}</b></p>
  </div>
  <div class="col-sm-6">
Поставщик: <p><b>{{$transference->ttn->supplier->title}}</b></p>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-sm-2">
    <p>Колчество: <b>{{$transference->quantity}} {{$transference->unit->type}}</b></p>
  </div>
  <div class="col-sm-3">
Учетная цена, р.: <p><b>{{$transference->accounting_price}}</b></p>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-sm-3">
    Цена, р.: <p><b>{{$transference->accounting_sum}}</b></p>
  </div>
  <div class="col-sm-3">
    @foreach ($transference->vats as $vat)
      Ставка НДС, %: <p><b>{{$vat->vat_rate}}</b></p>
    @endforeach
  </div>
  <div class="col-sm-3">
    @foreach ($transference->vats as $vat)
      Сумма НДС, р.: <p><b>{{$vat->vat_input}}</b></p>
    @endforeach
  </div>
  <div class="col-sm-3">
Учетная цена, р.: <p><b>{{$transference->accounting_price}}</b></p>
  </div>

</div>
</div>
      @endsection
