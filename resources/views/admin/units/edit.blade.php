@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

@component('admin.components.breadcrumb')
  @slot('title')Редактирование единицы измерения@endslot
    @slot('parent')Главная@endslot
      @slot('active')Единицы измерения@endslot
@endcomponent
<div class="row">
  <div class="col-sm-9">

<form class="form-horizontal" action="{{route('admin.unit.update', $unit)}}" method="post">
  @method('PUT')
    @csrf
    @include('admin.units.partials.form')


</form>
</div>
  </div>
  </div>
@endsection
