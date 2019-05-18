@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

    @component('admin.components.breadcrumb')
      @slot('title')Добавление поставщика@endslot
        @slot('parent')Главная@endslot
          @slot('active')Поставщики@endslot
          @endcomponent

          <form class="form-horizontal" action="{{route('admin.supplier.store')}}" method="post">
            @csrf
            @include('admin.suppliers.partials.form')
          </form>

        </div>

      @endsection
