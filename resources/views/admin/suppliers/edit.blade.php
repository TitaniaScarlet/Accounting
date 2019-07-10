@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

@component('admin.components.breadcrumb')
  @slot('title')Редактирование поставщика@endslot
    @slot('parent')Главная@endslot
      @slot('active')Поставщики@endslot
@endcomponent


<form class="form-horizontal" action="{{route('admin.supplier.update', $supplier)}}" method="post">
  @method('PUT')
    @csrf
    @include('admin.suppliers.partials.form_edit')
</form>
  </div>
@endsection
