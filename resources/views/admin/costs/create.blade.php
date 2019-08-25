@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

    @component('admin.components.breadcrumb')
      @slot('title')Создание расходов@endslot
        @slot('parent')Главная@endslot
          @slot('active')Расходы@endslot
          @endcomponent

          <form class="form-horizontal" action="{{route('admin.cost.store')}}" method="post">
            @csrf
            @include('admin.costs.partials.form')
          </form>

        </div>

      @endsection
