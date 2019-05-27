@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

    @component('admin.components.breadcrumb')
      @slot('title')Создание товара@endslot
        @slot('parent')Главная@endslot
          @slot('active')Поставщики@endslot
          @endcomponent

          <form class="form-horizontal" action="{{route('admin.product.store')}}" method="post">
            @csrf
            @include('admin.products.partials.form')
          </form>

        </div>

      @endsection
