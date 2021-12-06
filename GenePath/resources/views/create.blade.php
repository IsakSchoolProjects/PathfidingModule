@extends('layouts.layout')

@section('content')
<a href="{{url('/')}}" class="group absolute top-3 left-3 text-4xl"><i class="fas fa-arrow-circle-left text-green-300 group-hover:text-green-500"></i></a>
<div class="min-h-screen flex flex-col gap-24 bg-gray-200">
    <div class="mx-auto py-14">
        <h1 class="text-4xl">Create</h1>
    </div>
    <div class="flex flex-col mx-auto gap-12">
        <div class="bg-gray-100 p-12 border-2 border-gray-300 rounded">
            <form action="" class="flex flex-col gap-4">
                <div>
                    <input type="radio" name="type" value="circular">
                    <label for="circular" class="ml-2">A Circular World</label>
                </div>
                <div>
                    <input type="radio" name="type" value="branch">
                    <label for="branch" class="ml-2">A Branch World</label>
                </div>
                <div>
                    <input type="radio" name="type" value="rectangle">
                    <label for="rectangle" class="ml-2">A Rectangle World</label>
                </div>
            </form>
        </div>
        <div class="bg-gray-100 p-12 border-2 border-gray-300 rounded">
            <form action="" class="flex flex-col gap-4">
                <div class="flex flex-col gap-2">
                    <label for="fname">World name</label>
                    <input class="bg-gray-100 border border-gray-300 rounded outline-none" type="text" id="fname" name="room" value="">
                </div>
                <div id="circular" class="flex flex-col gap-2 hidden">
                    <label for="fname">Amount of rooms</label>
                    <input class="bg-gray-100 border border-gray-300 rounded outline-none" type="text" id="fname" name="room" value="">
                </div>
                <div id="branch" class="flex flex-col gap-2 hidden">
                    <label for="fname">Init range</label>
                    <input class="bg-gray-100 border border-gray-300 rounded outline-none" type="text" id="fname" name="room" value="">
                    <label for="fname">Factor</label>
                    <input class="bg-gray-100 border border-gray-300 rounded outline-none" type="text" id="fname" name="room" value="">
                </div>
                <div id="rectangle" class="flex flex-col gap-2 hidden">
                    <label for="fname">Amout of rooms on X-angle</label>
                    <input class="bg-gray-100 border border-gray-300 rounded outline-none" type="text" id="fname" name="room" value="">
                    <label for="fname">Amout of rooms on Y-angle</label>
                    <input class="bg-gray-100 border border-gray-300 rounded outline-none" type="text" id="fname" name="room" value="">
                </div>
            </form>
        </div>
    </div>
    <div class="mx-auto mt-auto p-14">
        <a href="{{url('/edit')}}" class="text-xl bg-green-400 rounded px-5 py-2 text-green-700 hover:bg-green-300">
            Create <span class="font-medium">World</span>
        </a>
    </div>
</div>
@endsection