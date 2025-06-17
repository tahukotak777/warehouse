@extends('layout.default')
@section('tittle', 'Manage Division')
@section('main')
    <div class="flex flex-col p-4">
        <form action="/manage_division/{{$user->id}}" method="POST" class="border rounded shadow-xl p-4 flex flex-col gap-4">
            @csrf
            <h1 class="text-xl font-bold">Manage Division</h1>
            <div class="flex flex-col">
                <label for="name" class="font-semibold">Name</label>
                <input type="text" name="name" id="name" value="{{$user->name}}" disabled class="border-b p-1">
            </div>
            <div class="flex flex-col">
                <label for="email" class="font-semibold">Email</label>
                <input type="text" name="email" id="email" value="{{$user->email}}" disabled class="border-b p-1">
            </div>
            <div class="flex flex-col">
                <label for="division" class="font-semibold">Division</label>
                <select name="division" id="division" class="border-b p-1">
                    <option value="manager">Manager</option>
                    <option value="production">Production</option>
                    <option value="stock">Stock</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 p-2 rounded hover:bg-blue-800 hover:transition-all hover:duration-150">Submit</button>
            </div>
        </form>
    </div>
@endsection