@extends('layout.default')
@section('tittle', 'dashboard')
@section('main')
  <div class="p-4 gap-4 flex flex-col">
    <div class="flex justify-between items-center">
      <h1 class="text-xl font-bold">Produts</h1>
      <button class="bg-green-500 p-2 rounded font-bold hover:bg-green-800 hover:transition-all hover:duration-150"
        @click="showFormAdd = true">+ Add</button>
    </div>
    <table class="table-auto overflow-hidden rounded-xl shadow-xl">
      <thead>
        <tr class="bg-blue-500">
          <th>No</th>
          <th>Sku</th>
          <th>Name</th>
          <th>description</th>
          <th>stock</th>
          <th>Unit</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          @include('components.product', [$product, 'index' => $loop->iteration])
        @endforeach
      </tbody>
    </table>
  </div>
@endsection

@include('components.formAdd')