@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

@component('admin.components.breadcrumb')
  @slot('title')Редактирование поставщика@endslot
    @slot('parent')Главная@endslot
      @slot('active')Поставщики@endslot
@endcomponent
<div class="row">
  <div class="col-sm-9">

<form class="form-horizontal" action="{{route('admin.supplier.update', $supplier)}}" method="post">
  @method('PUT')
    @csrf
    @include('admin.suppliers.partials.form')


</form>
</div>
  </div>
  </div>
@endsection
