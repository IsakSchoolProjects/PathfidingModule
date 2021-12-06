@extends('layouts.layout')

@section('content')
<div class="min-h-screen bg-gray-200">
    <a href="{{url('/load')}}" class="group absolute top-3 left-3 text-4xl"><i class="fas fa-arrow-circle-left text-green-300 group-hover:text-green-500"></i></a>
    <canvas id="edit" class="bg-gray-100 min-h-screen w-full"></canvas>
</div>
@endsection

