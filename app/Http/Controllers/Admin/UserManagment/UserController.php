<?php

namespace App\Http\Controllers\Admin\UserManagment;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('admin.user_managment.users.index', [
      'users' => User::paginate(10),
    ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('admin.user_managment.users.create', [
      'user' => [],
    ]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $validator = $request->validate([
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'username' => ['required', 'string', 'max:255', 'unique:users'],
      'email' => ['nullable', 'string', 'email', 'max:255'],
      'password' => ['required', 'string', 'min:6', 'confirmed'],
    ]);
    User::create([
      'first_name' => $request['first_name'],
      'last_name' => $request['last_name'],
      'username' => $request['username'],
      'email' => $request['email'],
      'password' => bcrypt($request['password']),
      'role' => $request['role'],
    ]);


    return redirect()->route('admin.user_managment.user.index');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function show(User $user)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function edit(User $user)
  {
    return view('admin.user_managment.users.edit', [
      'user' => $user,
    ]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, User $user)
  {
    $validator = $request->validate([
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'username' => ['required', 'string', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($user->id)],
      'email' => ['nullable', 'string', 'email', 'max:255'],
      'password' => ['nullable', 'string', 'min:6', 'confirmed'],
    ]);

    $user->first_name = $request['first_name'];
    $user->last_name = $request['last_name'];
    $user->username = $request['username'];
    $user->email = $request['email'];
    $request['password'] == null ?: $user->password = bcrypt($request['password']);
    $request['role'] == null ?: $user->role = $request['role'];
    $user->save();

    return redirect()->route('admin.user_managment.user.index');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\User  $user
  * @return \Illuminate\Http\Response
  */
  public function destroy(User $user)
  {
    $user->delete();
  return redirect()->route('admin.user_managment.user.index');
  }
}
