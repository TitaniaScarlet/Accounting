@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

    @component('admin.components.breadcrumb')
      @slot('title')Создание категориии@endslot
        @slot('parent')Главная@endslot
          @slot('active')Категории@endslot
          @endcomponent

          <form class="form-horizontal" action="{{route('admin.category.store')}}" method="post">
            @csrf
            @include('admin.categories.partials.form')
          </form>

        </div>

      @endsection
