@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

@component('admin.components.breadcrumb')
  @slot('title')Создание пользователя@endslot
    @slot('parent')Главная@endslot
      @slot('active')Пользователи@endslot
@endcomponent

<form class="form-horizontal" action="{{route('admin.user_managment.user.store')}}" method="post">
    @csrf
  @include('admin.user_managment.users.partials.form')
  <br>
  <input type="submit" class="btn btn-primary" value="Сохранить">

</form>
</div>
  </div>

@endsection
