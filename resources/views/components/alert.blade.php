<div x-data="{ showAlert: false }" 
  x-init="
    @if($message)
      setTimeout(() => showAlert = true, 50);
      setTimeout(() => showAlert = false, 1500);
    @endif
  "
  x-show="showAlert" 
  x-transition:enter="transition ease-out duration-150"
  x-transition:enter-start="opacity-0 -translate-y-4"
  x-transition:enter-end="opacity-100 translate-y-0"
  x-transition:leave="transition ease-in duration-150"
  x-transition:leave-start="opacity-100 translate-y-0"
  x-transition:leave-end="opacity-0 -translate-y-4"
  class="fixed top-2 left-1/2 -translate-x-1/2 text-center">
  <h1
    class="
    {{ $type == 'success'
        ? 'bg-green-500'
        : ($type == 'warning'
            ? 'bg-yellow-500'
            : ($type == 'error'
                ? 'bg-red-500'
                : '')) }}
                 p-2 rounded border font-semibold">
    {{ $message }}
  </h1>
</div>
