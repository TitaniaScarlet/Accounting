@extends('admin.layouts.app_admin')

@section('content')

  <div class="container">

    @component('admin.components.breadcrumb')
      @slot('title')Список пользователей@endslot
        @slot('parent')Главная@endslot
          @slot('active')Пользователи@endslot
          @endcomponent

          <hr>

          <a href="{{route('admin.user_managment.user.create')}}" class="btn btn-primary float-right" role="button"><i class="far fa-plus-square"> Создать пользователя</i></a>
          <br><br><br>
          <table class="table table-striped">
            <thead>
              <th>Имя</th>
              <th>Фамилия</th>
              <th>Имя пользователя</th>
              <th>Email</th>
              <th>Роль</th>
              <th class="text-right">Действие</th>
            </thead>
            <tbody>
              @forelse ($users as $user)
                <tr>
                  <td>{{$user->first_name}}</td>
                  <td>{{$user->last_name}}</td>
                  <td>{{$user->username}}</td>
                  <td>{{$user->email}}</td>
                  @if ($user->role == "user")
                    <td>Пользователь</td>
                  @elseif ($user->role == "employee")
                    <td>Сотрудник</td>
                  @elseif ($user->role == "admin")
                    <td>Администратор</td>
                  @endif

                  <td class="text-right">
                    <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.user_managment.user.destroy', $user)}}" method="post">
                      <input type="hidden" name="_method" value="delete">
                      @csrf
                      <a href="{{route('admin.user_managment.user.edit', $user)}}"><i class="far fa-edit"></i></a>
                      <button type="submit" class="btn"><i class="far fa-trash-alt"></i></button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="text-center"><h4>Данные отсутствуют</h4></td>
                </tr>
              @endforelse
            </tbody>
            <tfoot>
              <tr>
                <td colspan="5">
                  <ul class="pagination float-right">
                    {{$users->links()}}
                  </ul>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>

      @endsection
