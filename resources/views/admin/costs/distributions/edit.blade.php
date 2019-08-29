@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

@component('admin.components.breadcrumb')
  @slot('title')Редактирование распределяемых расходов@endslot
    @slot('parent')Главная@endslot
      @slot('active')Расходы@endslot
@endcomponent



<form class="form-horizontal" action="{{route('admin.distribution.update', $distribution)}}" method="post">
  @method('PUT')
    @csrf
<div class="row">
  <div class="col-sm-8">
    <label for="">Товар</label>
    <input type="text" class="form-control" name="product_id" placeholder="Количество" value="{{$distribution->ttnproduct->product->product_name}}, {{$distribution->ttnproduct->product->manufacturer}}, {{$distribution->ttnproduct->product->quantity}} {{$distribution->ttnproduct->product->unit->type}} " readonly="">
  </div>
<div class="col-sm-4">
  <label for="">Сумма</label>
  <input type="text" class="form-control" name="distribution_sum" value="{{$distribution->distribution_sum ?? ""}}">
</div>
</div>
<hr>
<input class="btn btn-primary" type="submit"  value="Сохранить">

</form>


  </div>
@endsection
