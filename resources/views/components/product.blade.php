<tr>
  <td class="text-center">{{ $index }}</td>
  <td class="text-center">{{ $product->sku }}</td>
  <td class="text-center">{{ $product->name }}</td>
  <td>{{ $product->description }}</td>
  <td class="text-center">{{ $product->stock }}</td>
  <td class="text-center">{{ $product->unit }}</td>
  <td>
    <div class="flex justify-center gap-4">
      <a href="/product/{{$product->id}}/edit" class="bg-blue-500 p-2 rounded hover:bg-blue-800 hover:transition-all hover:duration-150">Edit</a>
      <form action="/product/{{ $product->id }}" method="POST">
        @csrf
        @method("DELETE")
        <button class="bg-red-500 p-2 rounded hover:bg-red-800 hover:transition-all hover:duration-150"
          type="submit">Delete</button>
      </form>
    </div>
  </td>
</tr>
