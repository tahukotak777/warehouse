@extends('layout.default')
@section('tittle', 'User')
@section('main')
  <div class="p-4 flex flex-col gap-4">
    <h1 class="text-xl font-bold">User table</h1>
    <table class="table-auto rounded-xl overflow-hidden shadow-xl">
      <thead class="bg-blue-500">
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Division</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="text-center">
        @foreach ($users as $user)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->division}}</td>
            <td>
                <div class="flex justify-center items-center">
                    <a href="/manage_division/{{$user->id}}" class="bg-blue-500 p-2 rounded hover:bg-blue-800 hover:transition-all hover:duration-150">Manage Division</a>
                </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
