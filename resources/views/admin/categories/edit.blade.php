@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

    @component('admin.components.breadcrumb')
      @slot('title')Редактирование категориии@endslot
        @slot('parent')Главная@endslot
          @slot('active')Категории@endslot
          @endcomponent

          <form class="form-horizontal" action="{{route('admin.category.update', $category)}}" method="post">
            @method('PUT')
            @csrf
            @include('admin.categories.partials.form')
          </form>
        </div>
      @endsection
