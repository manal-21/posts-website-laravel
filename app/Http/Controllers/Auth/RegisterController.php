<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends Controller
{

    public function __construct () {
        $this->middleware('guest');
    }

    public function index () {
        return view('Auth/register');
    }

    public function store (Request $request) {
        //validation
        $this->validate($request, [
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'confirmed']
        ]);

        //create new user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //sign the user
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('dashboard');
    }
}
