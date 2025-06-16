@extends('layout.auth')
@section('tittle', 'Register')
@section('main')
  <form action="/register" method="POST" class="border rounded flex flex-col shadow-xl p-4 gap-4 w-sm relative" x-data="{ showPassword: false }">
    @csrf
    <h1 class="text-center font-bold text-xl">Register</h1>
    <div class="flex flex-col gap-4">
      <div class="flex flex-col">
        <label for="name" class="font-semibold">Name</label>
        <input type="name" name="name" id="name" class="border-b p-1" required placeholder="Jhon Edward">
      </div>
      <div class="flex flex-col">
        <label for="email" class="font-semibold">Email</label>
        <input type="email" name="email" id="email" class="border-b p-1" required
          placeholder="JhonEd123@gmail.com">
      </div>
      <div class="flex flex-col relative">
        <label for="password" class="font-semibold">Password</label>
        <input type="text" name="password" id="password" class="border-b p-1" required placeholder="JhonEd#123">
      </div>
      <a href="/" class="absolute top-0 left-0 p-2">@include('icons.back', ['size'=>6])</a>
      <button
        class="bg-blue-500 p-2 rounded border hover:bg-blue-800 hover:transition-all hover:duration-150">Submit</button>
  </form>
@endsection
