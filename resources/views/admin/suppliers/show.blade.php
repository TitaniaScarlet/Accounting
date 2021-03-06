@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

    @component('admin.components.breadcrumb')
      @slot('title')Страница поставщика@endslot
        @slot('parent')Главная@endslot
          @slot('active')Поставщики@endslot
          @endcomponent

<br>
<div class="row">
  <div class="col-sm-6">
    <h5><b>{{$supplier->title}}</b></h5>
  </div>
  <div class="col-sm-2">
    <p>УНП: <b>{{$supplier->unp}}</b></p>
  </div>
  <div class="col-sm-4">
    <p>Email: <b>{{$supplier->email}}</b></p>
  </div>
</div>
<hr>
<h5>Фактический адрес</h6>
<div class="row">
    <div class="col-sm-10">
  <p><b>{{$supplier->address}}</b></p>
  </div>
  <div class="col-sm-2">
  <p>Индекс: <b>{{$supplier->index}}</b></p>
  </div>
</div>
<hr>
<h5>Юридический адрес</h5>
<div class="row">
  <div class="col-sm-10">
  <p><b>{{$supplier->address_legal}}</b></p>
  </div>
  <div class="col-sm-2">
  <p>Индекс: <b>{{$supplier->index_legal}}</b></p>
  </div>
</div>
<hr>
<form class="form-horizontal" action="{{route('admin.contract.store')}}" method="post">
  @csrf
  @include('admin.suppliers.contracts.form')
</form>
<br>
<table class="table table-striped">
  <thead>
    <th>Дата</th>
    <th>Номер договора</th>
      <th class="text-right">Действие</th>
  </thead>
  <tbody>
    @forelse ($supplier->contracts as $contract)
        <tr>
        <td>{{$contract->date}}</td>
        <td>{{$contract->number}}</td>
        <td class="text-right">
          <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.contract.destroy', $contract)}}" method="post">
            <input type="hidden" name="_method" value="delete">
            @csrf
            <a href="{{route('admin.contract.edit', $contract)}}"><i class="far fa-edit"></i></a>
            <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
          </form>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="3" class="text-center"><h4>Данные отсутствуют</h4></td>
      </tr>
    @endforelse
  </tbody>
</table>

  <br>
  <form class="form-horizontal" action="{{route('admin.phone.store')}}" method="post">
    @csrf
  @include('admin.suppliers.phones.form')
</form>
<br>
  <table class="table table-striped">
    <thead>
      <th>Код</th>
      <th>Номер</th>
        <th>Оператор</th>
        <th class="text-right">Действие</th>
    </thead>
    <tbody>
      @forelse ($supplier->phones as $phone)
          <tr>
          <td>{{$phone->code}}</td>
          <td>{{$phone->number}}</td>
          <td>{{$phone->operator}}</td>
          <td class="text-right">
            <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.phone.destroy', $phone)}}" method="post">
              <input type="hidden" name="_method" value="delete">
              @csrf
              <a href="{{route('admin.phone.edit', $phone)}}"><i class="far fa-edit"></i></a>

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
  </table>
  <br>
  <form class="form-horizontal" action="{{route('admin.account.store')}}" method="post">
    @csrf
    @include('admin.suppliers.accounts.form')
  </form>
<br>
<table class="table table-striped">
  <thead>
    <th>р/с IBAN</th>
    <th>Реквизиты банка</th>
      <th class="text-right">Действие</th>
  </thead>
  <tbody>
    @forelse ($supplier->accounts as $account)
        <tr>
        <td>{{$account->bank_account}}</td>
        <td>{{$account->bank}}</td>
        <td class="text-right">
          <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.account.destroy', $account)}}" method="post">
            <input type="hidden" name="_method" value="delete">
            @csrf
            <a href="{{route('admin.account.edit', $account)}}"><i class="far fa-edit"></i></a>

            <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
          </form>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="3" class="text-center"><h4>Данные отсутствуют</h4></td>
      </tr>
    @endforelse
  </tbody>
</table>
  <br>
        </div>

      @endsection
