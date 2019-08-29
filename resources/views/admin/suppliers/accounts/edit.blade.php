@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

@component('admin.components.breadcrumb')
  @slot('title')Редактирование контракта@endslot
    @slot('parent')Главная@endslot
      @slot('active')Поставщики@endslot
@endcomponent



<form class="form-horizontal" action="{{route('admin.account.update', $account)}}" method="post">
  @method('PUT')
    @csrf
    @include('admin.suppliers.accounts.form', ['supplier' => $supplier])
</form>


  </div>
@endsection
