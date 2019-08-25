@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

@component('admin.components.breadcrumb')
  @slot('title')Редактирование товара@endslot
    @slot('parent')Главная@endslot
      @slot('active')Товары@endslot
@endcomponent



<form class="form-horizontal" action="{{route('admin.ttnproduct.update', $ttnproduct)}}" method="post">
  @method('PUT')
    @csrf
    @include('admin.ttnproducts.partials.form')


</form>


  </div>
@endsection
