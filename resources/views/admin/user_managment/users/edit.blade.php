@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

@component('admin.components.breadcrumb')
  @slot('title')Редактирование пользователя@endslot
    @slot('parent')Главная@endslot
      @slot('active')Пользователи@endslot
@endcomponent
<div class="row">
  <div class="col-sm-9">

<form class="form-horizontal" action="{{route('admin.user_managment.user.update', $user)}}" method="post">
  @method('PUT')
    @csrf
    @include('admin.user_managment.users.partials.form')

  <br>
  <input type="submit" class="btn btn-primary" value="Сохранить">

</form>
</div>
  </div>
  </div>
@endsection
