@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

@component('admin.components.breadcrumb')
  @slot('title')Редактирование товара@endslot
    @slot('parent')Главная@endslot
      @slot('active')Товары@endslot
@endcomponent
<div class="row">
  <div class="col-sm-9">

<form class="form-horizontal" action="{{route('admin.product.update', $product)}}" method="post">
  @method('PUT')
    @csrf
    @include('admin.products.partials.form')


</form>
</div>
  </div>
  </div>
@endsection
