@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

    @component('admin.components.breadcrumb')
      @slot('title')Создание товарно-транспортной накладной@endslot
        @slot('parent')Главная@endslot
          @slot('active')Товарно-транспортные накладные@endslot
          @endcomponent

          <form class="form-horizontal" action="{{route('admin.ttn.store')}}" method="post">
            @csrf
            @include('admin.ttns.partials.form')
          </form>

        </div>

      @endsection
