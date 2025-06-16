@extends('layout.auth')
@section('tittle', 'Login')
@section('main')
  <form action="/login" method="POST" class="border rounded flex flex-col shadow-xl p-4 gap-4 w-sm" x-data="{ showPassword: false }">
    @csrf
    <h1 class="text-center font-bold text-xl">Login</h1>
    <div class="flex flex-col gap-4">
      <div class="flex flex-col">
        <label for="email" class="font-semibold">Email</label>
        <input type="email" name="email" id="email" class="border-b p-1" required placeholder="JhonEd123@gmail.com">
      </div>
      <div class="flex flex-col relative">
        <label for="password" class="font-semibold">Password</label>
        <input :type="showPassword ? 'text' : 'password'" name="password" id="password" class="border-b p-1" required
          placeholder="JhonEd#123">
        <button type="button" class="absolute bottom-1 right-0 " @click="showPassword = !showPassword">
          <span x-show="showPassword">
            @include('icons.eye', ['size' => 6])
          </span>
          <span x-show="!showPassword">
            @include('icons.eye_slash', ['size' => 6])
          </span>
        </button>
      </div>
      @if (session('message'))
        <p class="text-red-500">{{session('message')}}</p>
      @endif
      <div class="flex items-center gap-1">
        <input type="checkbox" name="remember_me" id="remember_me">
        <label for="remember_me" >Remember Me</label>
      </div>
      <p>don't have an account yet? <a href="/register" class="text-blue-500 underline">Register</a></p>
    </div>
    <button
      class="bg-blue-500 p-2 rounded border hover:bg-blue-800 hover:transition-all hover:duration-150">Submit</button>
  </form>
@endsection
