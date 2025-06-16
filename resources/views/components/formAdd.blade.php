<div class="fixed top-0 left-0 min-w-screen min-h-screen bg-black/50 flex justify-center items-center"
  x-show="showFormAdd">
  <form action="/product" method="POST" class="flex flex-col bg-white p-4 rounded gap-4 w-lg max-h-screen relative border"
    x-show="showFormAdd" x-transition>
    @csrf
    <button
      class="absolute top-0 right-0 p-3 bg-red-500 rounded-bl font-bold hover:bg-red-800 hover:transition-all hover:duration-150"
      type="button" @click="showFormAdd = false">X</button>
    <h1 class="text-xl font-bold text-center">Add Product</h1>
    <div class="flex flex-col gap-4">
      <div class="flex flex-col">
        <label for="name" class="font-semibold">Name</label>
        <input type="text" name="name" id="name" class="border-b p-1" required>
      </div>
      <div class="flex flex-col">
        <label for="sku" class="font-semibold">Sku</label>
        <input type="text" name="sku" id="sku" class="border-b p-1" required>
      </div>
      <div class="flex flex-col"class="flex flex-col">
        <label for="description" class="font-semibold">Description</label>
        <textarea rows="5" name="description" id="description" class="border-b p-1 resize-none" required></textarea>
      </div>
      <div class="flex flex-col">
        <label for="unit" class="font-semibold">Unit</label>
        <input type="text" name="unit" id="unit" class="border-b p-1" required>
      </div>
    </div>
    <button class="bg-blue-500 p-2 hover:bg-blue-800 rounded hover:transition-all hover:duration-150"
      type="submit">Submit</button>
  </form>
</div>
