@extends('layouts.layout')

@section('content')
    <a href="{{ url('/') }}" class="group absolute top-3 left-3 text-4xl"><i
            class="fas fa-arrow-circle-left text-green-300 group-hover:text-green-500"></i></a>
    <div class="min-h-screen flex flex-col gap-24 bg-gray-200">
        <div class="mx-auto py-14">
            <h1 class="text-4xl">Create</h1>
        </div>
        {{ Form::open(['url' => '/edit', 'class' => 'flex flex-col mx-auto gap-12']) }}
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
                        {{ Form::label('worldname', 'World name') }}
                        {{ Form::text('worldname', null, ['class' => 'bg-gray-100 border border-gray-300 rounded outline-none']) }}
                    </div>
                    <div id="circular" class="flex flex-col gap-2 hidden">
                        {{ Form::label('rooms', 'Amount of rooms') }}
                        {{ Form::text('rooms', null, ['class' => 'bg-gray-100 border border-gray-300 rounded outline-none']) }}
                    </div>
                    <div id="branch" class="flex flex-col gap-2 hidden">
                        {{ Form::label('initrange', 'Init range') }}
                        {{ Form::text('initrange', null, ['class' => 'bg-gray-100 border border-gray-300 rounded outline-none']) }}
                        {{ Form::label('factor', 'Factor') }}
                        {{ Form::text('factor', null, ['class' => 'bg-gray-100 border border-gray-300 rounded outline-none']) }}
                    </div>
                    <div id="rectangle" class="flex flex-col gap-2 hidden">
                        {{ Form::label('xrooms', 'Amount of rooms on X-Angle') }}
                        {{ Form::text('xrooms', null, ['class' => 'bg-gray-100 border border-gray-300 rounded outline-none']) }}
                        {{ Form::label('yrooms', 'Amount of rooms on Y-Angle') }}
                        {{ Form::text('yrooms', null, ['class' => 'bg-gray-100 border border-gray-300 rounded outline-none']) }}
                    </div>
                </div>
            </div>
            <div class="mx-auto mt-auto p-14">
                {{ Form::submit('Create World', ['class' => 'text-xl bg-green-400 rounded px-5 py-2 text-green-700 hover:bg-green-300 font-medium']) }}
            </div>
        {{ Form::close() }}
    </div>
@endsection
