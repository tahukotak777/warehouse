@extends('layout.default')
@section('tittle', 'Stock')
@section('main')
  <div class="p-4 flex flex-col gap-4">
    <form action="/stock" method="POST" class="border rounded shadow-xl p-4 flex flex-col gap-4">
      @csrf
      <h1 class="text-xl font-bold">Manage Stock</h1>
      <div class="flex flex-col gap-4">
        <div class="flex flex-col">
          <label for="product" class="font-semibold">Product</label>
          <select name="product_id" id="product" class="border-b">
            @foreach ($products as $product)
              <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="flex flex-col">
          <label for="type" class="font-semibold">Mutation Type</label>
          <select name="mutation_type" id="type" class="border-b">
            <option value="IN">IN</option>
            <option value="OUT">OUT</option>
          </select>
        </div>
        <div class="flex flex-col">
          <label for="quantity" class="font-semibold">Quantity</label>
          <input type="number" name="quantity" id="quantity" class="border-b" required>
        </div>
      </div>
      <div class="flex justify-end">
        <button class="w-fit p-2 bg-blue-500 rounded hover:bg-blue-800 hover:transition-all hover:duration-150">Submit</button>
      </div>
    </form>
  </div>
@endsection
