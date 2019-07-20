@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

    @component('admin.components.breadcrumb')
      @slot('title')Страница товара@endslot
        @slot('parent')Главная@endslot
          @slot('active')Товары@endslot
          @endcomponent


      @endsection
