@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

    @component('admin.components.breadcrumb')
      @slot('title')Поступление товара@endslot
        @slot('parent')Главная@endslot
          @slot('active')Движение товаров@endslot
          @endcomponent

          <form class="form-horizontal" action="{{route('admin.transference.store')}}" method="post">
            @csrf
            @include('admin.transferences.partials.form')
          </form>

        </div>

      @endsection
