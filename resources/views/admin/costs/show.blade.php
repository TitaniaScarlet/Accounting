@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

    @component('admin.components.breadcrumb')
      @slot('title')Страница расходов@endslot
        @slot('parent')Главная@endslot
          @slot('active')Расходы@endslot
          @endcomponent

<br>
<div class="row">
  <div class="col-sm-3">
    Дата: <p><b>{{$cost->date}}</b></p>
  </div>
  <div class="col-sm-3">
    Номер: <p><b>{{$cost->number}}</b></p>
  </div>
  <div class="col-sm-6">
    Поставщик: <p><b>{{$cost->supplier->title}}</b></p>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-sm-3">
    {{-- Серия и номер ТТН: <p><b>{{$cost->ttn->number}}</b></p> --}}
  </div>
  <div class="col-sm-3">
    Статья расходов:<br>
    @foreach ($cost->items as $item)
       <b>{{$item->title}}</b><br>
    @endforeach
  </div>
  <div class="col-sm-6">
    Описание: <p><b>{{$cost->description}}</b></p>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-sm-3">
    Цена, р.: <p><b>{{$cost->price}}</b></p>
  </div>
  <div class="col-sm-3">
    @foreach ($cost->vats as $vat)
      Ставка НДС, %: <p><b>{{$vat->vat_rate}}</b></p>
    @endforeach
  </div>
  <div class="col-sm-3">
    @foreach ($cost->vats as $vat)
      Сумма НДС, р.: <p><b>{{$vat->vat_input}}</b></p>
    @endforeach
  </div>
  <div class="col-sm-3">
Учетная цена, р.: <p><b>{{$cost->accounting_price}}</b></p>
  </div>
</div>

{{-- <distribution-component :cost = "{{json_encode($cost)}}"></distribution-component> --}}
<form class="form-horizontal" action="{{route('admin.distribution.store')}}" method="post">
  <input type="hidden" name="cost_id" value="{{$cost->id ?? ""}}">
  @csrf
<div class="row">
  <div class="col-sm-4">
    <label for="">Серия и номер ТТН</label>
    <select  class="custom-select" name="ttn">
      @foreach ($ttns as $ttn)
        <option value="{{$ttn->id ?? ""}}"
          @isset($ttn->ttn_id)
            @if ($ttn->ttn_id == $ttn->id)
              selected=""
            @endif
          @endisset
          >{{$ttn->number ?? ""}}</option>
        @endforeach
      </select>
  </div>
  <div class="col-sm-2">
    <br>
    <input class="btn btn-primary" type="submit"  value="Распределить">
  </div>
</div>
</form>
<br>
<table class="table table-striped">
  <thead>
    <th>Товар</th>
    <th>Сумма, р.</th>
    <th class="text-right">Действие</th>
    </thead>
    <tbody>
    @forelse ($distributions as $distribution)
      <tr>
                <td>{{$distribution->transference->product->product_name}}, {{$distribution->transference->product->manufacturer}},
                  {{$distribution->transference->product->quantity}} {{$distribution->transference->product->unit->type}}</td>
        <td>{{$distribution->distribution_sum}}</td>
        <td class="text-right">
          <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.distribution.destroy', $distribution)}}" method="post">
            <input type="hidden" name="_method" value="delete">
            @csrf
            <a href="{{route('admin.distribution.edit', $distribution)}}"><i class="far fa-edit"></i></a>
            <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
          </form>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="4" class="text-center"><h4>Данные отсутствуют</h4></td>
      </tr>
    @endforelse
  </tbody>
  <tfoot>
    <tr>
      <td colspan="4">
      </td>
    </tr>
  </tfoot>
</table>
</div>
      @endsection
