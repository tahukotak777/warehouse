@extends('layout.default')
@section('tittle', 'Logs')
@section('main')
    <div class="flex flex-col p-4 gap-4">
        <h1 class="text-xl font-bold">Logs</h1>
        <table class="border shadow-xl rounded-xl overflow-hidden p-4">
            <thead>
                <tr class="bg-blue-500">
                    <th>No</th>
                    <th>User Name</th>
                    <th>Product Name</th>
                    <th>Mutation Type</th>
                    <th>Quantity</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($logs as $log)
                    @include('components.log', [
                        'log'=>$log,
                        'index'=>$loop->iteration,
                    ])
                @endforeach
            </tbody>
        </table>
    </div>
@endsection