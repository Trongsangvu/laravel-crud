<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
  public function index()
  {
    $users = User::latest()->paginate(10);

    return view('users.index', compact('users'));
  }

  public function create()
  {
    return view('users.create');
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'email', 'unique:users,email'],
      'password' => ['required', 'string', 'min:6'],
    ]);

    $data['password'] = Hash::make($data['password']);

    User::create($data);

    return redirect()
      ->route('users.index')
      ->with('success', 'User created successfully');
  }

  public function show(User $user)
  {
    return view('users.show', compact('user'));
  }

  public function edit(User $user)
  {
    return view('users.edit', compact('user'));
  }

  public function update(Request $request, User $user)
  {
    $data = $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => [
        'required',
        'email',
        Rule::unique('users', 'email')->ignore($user->id),
      ],
      'password' => ['nullable', 'string', 'min:6'],
    ]);

    if (!empty($data['password'])) {
      $data['password'] = Hash::make($data['password']);
    } else {
      unset($data['password']);
    }

    $user->update($data);

    return redirect()
      ->route('users.index')
      ->with('success', 'User updated successfully');
  }

  public function destroy(User $user)
  {
    $user->delete();

    return redirect()
      ->route('users.index')
      ->with('success', 'User deleted successfully');
  }
}