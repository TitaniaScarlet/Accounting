@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif

<label for="">Роль пользователя</label>
<p><input name="role" type="radio" value="user">Пользователь</p>
<p><input name="role" type="radio" value="employee">Сотрудник</p>
<p><input name="role" type="radio" value="admin">Администор</p>

<label for="title">Имя</label>
<input type="text" class="form-control" name="first_name" placeholder="Имя" value="@if (old('first_name')){{old('first_name')}} @else{{$user->first_name ?? ""}}
@endif" required>

<label for="title">Фамилия</label>
<input type="text" class="form-control" name="last_name" placeholder="Фамилия" value="@if (old('last_name')){{old('last_name')}} @else{{$user->last_name ?? ""}}
@endif" required>

<label for="title">Имя пользователя</label>
<input type="text" class="form-control" name="username" placeholder="Имя пользователя" value="@if (old('username')){{old('username')}} @else{{$user->username ?? ""}}
@endif" required>

<label for="title">Email</label>
<input type="email" class="form-control" name="email" placeholder="Email" value="@if (old('email')){{old('email')}}
 @else{{$user->email ?? ""}}@endif">

<label for="title">Пароль</label>
<input type="password" class="form-control" name="password">

<label for="title">Подтверждение пароля</label>
<input type="password" class="form-control" name="password_confirmation">
