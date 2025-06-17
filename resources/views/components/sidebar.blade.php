<aside class=" bg-[#272727] text-white">
  <h1 class="font-bold text-center p-4 text-2xl">Warehouse</h1>
  <div class="">
    @if (auth()->user()->division == 'manager')
      <a href="/user"
        class="flex items-center gap-2 hover:bg-gray-500 hover:transition-all hover:duration-150 p-2">@include('icons.user')
        User</a>
    @elseif (auth()->user()->division == 'production')
      <a href="/"
        class="flex items-center gap-2 hover:bg-gray-500 hover:transition-all hover:duration-150 p-2">@include('icons.stock')
        Products</a>
      <a href="/logs"
        class="flex items-center gap-2 hover:bg-gray-500 hover:transition-all hover:duration-150 p-2">@include('icons.history')
        Logs</a>
    @elseif (auth()->user()->division == 'stock')
      <a href="/stock"
        class="flex items-center gap-2 hover:bg-gray-500 hover:transition-all hover:duration-150 p-2">@include('icons.stock')
        Stock</a>
    @endif
  </div>
  <form action="/logout" method="POST">
    @csrf
    <button type="submit"
      class="flex items-center gap-2 mt-10 hover:bg-gray-500 hover:transition-all hover:duration-150 w-full py-2 cursor-pointer">@include('icons.logout')
      Logout</button>
  </form>
</aside>
