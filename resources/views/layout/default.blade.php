<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/css/app.css')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
  <title>@yield('tittle', 'warehouse')</title>
</head>

<body x-data="{ showFormAdd: false }">
  <div class="grid grid-cols-[15%_1fr] grid-rows-[1fr] min-h-screen">
    @include('components.sidebar')
    @yield('main')
  </div>

  @if(session('alert'))
    @include('components.alert', [
        'type'=>session('alert')['type'],
        'message'=>session('alert')['message'],
    ])
  @endif

</body>

</html>
