@extends('layouts.layout')

@section('content')
<div class="min-h-screen bg-gray-200 flex flex-col">
    <div class="mx-auto py-14">
        <h1 class="text-4xl">GenePath</h1>
    </div>
    <div class="mt-auto mx-auto flex flex-row gap-24 py-14">
        <a href="{{url('/create')}}" class="text-xl bg-green-400 rounded px-5 py-2 text-green-700 hover:bg-green-300">Create</a>
        <a href="{{url('load')}}" class="text-xl bg-green-400 rounded px-5 py-2 text-green-700 hover:bg-green-300">Load</a>
    </div>
</div>
@endsection
