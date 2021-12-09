@extends('layouts.layout')

@section('content')
    <a href="{{ url('/') }}" class="group absolute top-3 left-3 text-4xl"><i
            class="fas fa-arrow-circle-left text-green-300 group-hover:text-green-500"></i></a>
    <div class="min-h-screen flex flex-col gap-24 bg-gray-200">
        <div class="mx-auto py-14">
            <h1 class="text-4xl">Create</h1>
        </div>
        <div class="flex flex-col mx-auto gap-12">
            <div class="flex flex-col gap-4 bg-gray-100 p-12 border-2 border-gray-300 rounded">
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
            </div>
            <div class="bg-gray-100 mx-auto p-12 border-2 border-gray-300 rounded">
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <label for="worldname">World name</label>
                        <input type="text" name="worldname" class="bg-gray-100 border border-gray-300 rounded outline-none">
                    </div>
                    <div id="circular" class="flex flex-col gap-2 hidden">
                        <label for="rooms">Amount of rooms</label>
                        <input type="text" name="rooms" class="bg-gray-100 border border-gray-300 rounded outline-none">
                    </div>
                    <div id="branch" class="flex flex-col gap-2 hidden">
                        <label for="initrange">Init rage</label>
                        <input type="text" name="initrange" class="bg-gray-100 border border-gray-300 rounded outline-none">
                        
                        <label for="factor">Factor</label>
                        <input type="text" name="factor" class="bg-gray-100 border border-gray-300 rounded outline-none">                        
                    </div>
                    <div id="rectangle" class="flex flex-col gap-2 hidden">
                        <label for="xrooms">Amount of rooms on X-Angle</label>
                        <input type="text" name="xrooms" class="bg-gray-100 border border-gray-300 rounded outline-none">                        

                        <label for="yrooms">Amount of rooms on Y-Angle</label>
                        <input type="text" name="yrooms" class="bg-gray-100 border border-gray-300 rounded outline-none">                        
                    </div>
                </div>
            </div>
            <div class="flex flex-col mx-auto mt-auto p-14 gap-6">
                <button id="createButton" class="text-xl bg-green-400 rounded px-5 py-2 text-green-700 hover:bg-green-300 font-medium">Create World</button>
            </div>
            {{-- Badge --}}
            <div id="errorElement" class="hidden fixed bottom-7 left-7 z-100">
                <div class="bg-red-200 border-l-4 rounded-r-lg border-red-500 text-red-800 p-4 shadow-xl" role="alert">
                    <p class="font-bold"></p>
                    <p></p>
                  </div>
            </div>
        </div> 
    </div>
@endsection