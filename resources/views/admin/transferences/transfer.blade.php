@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

@component('admin.components.breadcrumb')
  @slot('title')Перемещение товара@endslot
    @slot('parent')Главная@endslot
      @slot('active')Товары@endslot
@endcomponent



<form class="form-horizontal" action="{{route('admin.transference.change', $transference)}}" method="post">
  @method('PUT')
    @csrf
    @include('admin.transferences.partials.form_transfer')
</form>


  </div>
@endsection
