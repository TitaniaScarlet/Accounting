@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

    @component('admin.components.breadcrumb')
      @slot('title')Создание статьи расходов@endslot
        @slot('parent')Главная@endslot
          @slot('active')Статьи расходов@endslot
          @endcomponent

          <form class="form-horizontal" action="{{route('admin.item.store')}}" method="post">
            @csrf
            @include('admin.items.partials.form')
          </form>

        </div>

      @endsection
