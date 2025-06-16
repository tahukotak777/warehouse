<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->intended('/');
    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }

        $credential = $request->only(['email', 'password']);
        $remember_me = $request->has('remember_me');

        if (Auth::attempt($credential, $remember_me)) {
            $user = User::where('email', $request->email)->first();

            Auth::login($user, $request->filled('remember_me'));

            return redirect()->intended('/')->with('alert', [
                'type' => 'success',
                'message' => 'you have successfully logged in'
            ]);
        } else {
            return redirect()->back()->with('message', 'Incorrect email or password');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/')->with('alert', [
            'type'=>'success',
            'message'=>'you have successfully logged out'
        ]);
    }
}
