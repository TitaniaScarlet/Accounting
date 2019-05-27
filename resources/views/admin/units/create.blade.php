@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

    @component('admin.components.breadcrumb')
      @slot('title')Создание единицы измерения@endslot
        @slot('parent')Главная@endslot
          @slot('active')Единицы измерения@endslot
          @endcomponent

          <form class="form-horizontal" action="{{route('admin.unit.store')}}" method="post">
            @csrf
            @include('admin.units.partials.form')
          </form>

        </div>

      @endsection
