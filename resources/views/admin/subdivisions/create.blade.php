@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

    @component('admin.components.breadcrumb')
      @slot('title')Создание подразделения@endslot
        @slot('parent')Главная@endslot
          @slot('active')Подразделения@endslot
          @endcomponent

          <form class="form-horizontal" action="{{route('admin.subdivision.store')}}" method="post">
            @csrf
            @include('admin.subdivisions.partials.form')
          </form>

        </div>

      @endsection
