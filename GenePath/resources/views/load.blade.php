@extends('layouts.layout')

@section('content')
<a href="{{url('/')}}" class="group absolute top-3 left-3 text-4xl"><i class="fas fa-arrow-circle-left text-green-300 group-hover:text-green-500"></i></a>
<div class="min-h-screen bg-gray-200 flex flex-col ">
    <div class="mx-auto py-14">
        <h1 class="text-4xl">GenePath</h1>
    </div>
    <!-- <div class="flex flex-row mx-auto gap-52">
       
    </div> -->
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mx-32">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Rooms
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Type
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Date
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($worlds as $world)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="">
                      <div class="text-sm font-medium text-gray-900">
                        {{ $world->name }}
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">This world has <span class="font-medium">{{ $world->rooms }}</span> rooms</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-lg bg-green-100 text-green-800">
                    {{ ucfirst($world->type) }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ $world->date }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a href="{{url('/view')}}" class="text-indigo-600 hover:text-indigo-900 mr-2">View</a>
                  <a href="{{url('/edit', [$world->id])}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
</div>

@endsection