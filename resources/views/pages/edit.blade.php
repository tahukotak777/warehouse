@extends('layout.default')
@section('tittle', 'Edit product')
@section('main')
    <div class="flex flex-col p-4">
        <form action="/product/{{$product->id}}/edit" method="POST" class="border shadow-xl rounded p-4 flex flex-col gap-4">
            @method('PUT')
            @csrf
            <h1 class="text-xl font-bold">Edit product</h1>
            <div class="flex flex-col gap-4">
                <div class="flex flex-col">
                    <label for="name" class="font-semibold">Name</label>
                    <input type="text" name="name" id="name" value="{{$product->name}}" class="border-b">
                </div>
                <div class="flex flex-col">
                    <label for="sku" class="font-semibold">Sku</label>
                    <input type="text" name="sku" id="sku" value="{{$product->sku}}" class="border-b">
                </div>
                <div class="flex flex-col">
                    <label for="description" class="font-semibold">Description</label>
                    <textarea name="description" id="description" cols="1" rows="5" class="border-b resize-none">{{$product->description}}</textarea>
                </div>
                <div class="flex flex-col">
                    <label for="unit" class="font-semibold">Unit</label>
                    <input type="text" name="unit" id="unit" value="{{$product->unit}}" class="border-b">
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 p-2 rounded w-fit hover:bg-blue-800 hover:transition-all hover:duration-150">Update</button>
            </div>
        </form>
    </div>
@endsection