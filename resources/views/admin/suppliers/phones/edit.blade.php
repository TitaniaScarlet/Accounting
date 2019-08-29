@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

@component('admin.components.breadcrumb')
  @slot('title')Редактирование телефонов поставщика@endslot
    @slot('parent')Главная@endslot
      @slot('active')Поставщики@endslot
@endcomponent



<form class="form-horizontal" action="{{route('admin.phone.update', $phone)}}" method="post">
  @method('PUT')
    @csrf
    @include('admin.suppliers.phones.form', ['supplier' => $supplier])


</form>


  </div>
@endsection
