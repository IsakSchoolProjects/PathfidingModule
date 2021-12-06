@extends('layouts.layout')

@section('head')
<style>
    .tab {
    overflow: hidden;
    }
    .tab-content {
    max-height: 100vh;
    transition: all 0.25s;
    }
    input:checked + .tab-label .test {
        background-color: #000;
    }
    input:checked + .tab-label .test svg {
        transform: rotate(180deg);
        stroke: #fff;
    }
    input:checked + .tab-label::after {
    transform: rotate(90deg);
    }
    input:checked ~ .tab-content {
    max-height: 100vh;
    }
</style>
@endsection
@section('content')
<div class="min-h-screen bg-gray-200 flex flex-col">
    <a href="{{url('/')}}" class="group absolute top-3 left-3 text-4xl"><i class="fas fa-arrow-circle-left text-green-300 group-hover:text-green-500"></i></a>
    <div class="flex flex-col min-h-screen">
        <div class="mx-auto py-14">
            <h1 class="text-4xl">Edit</h1>
        </div>

        <!-- Dropdown Items Start -->

        <div class="flex flex-col gap-20">
            <div class="flex flex-col gap-4">
                <!-- World Summary Dropdown -->
                <div class="border-b tab mx-20 bg-gray-300 rounded-lg">
                    <div class="border-l-2 border-transparent relative">
                        <input class="w-full absolute z-10 cursor-pointer opacity-0 h-5 top-6" type="checkbox" id="chck1">
                        <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none tab-label " for="chck1">
                            <span class="text-grey-darkest text-xl">
                                World Summary
                            </span>
                            <div class="rounded-full border border-grey w-7 h-7 flex items-center justify-center test">
                                <!-- icon by feathericons.com -->
                                <svg aria-hidden="true" class="" data-reactid="266" fill="none" height="24" stroke="#606F7B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <polyline points="6 9 12 15 18 9">
                                    </polyline>
                                </svg>
                            </div>
                        </header>
                        <div class="flex tab-content">
                            <div class="flex flex-row mx-auto gap-32 pb-14">
                                <div class="flex flex-col gap-4">
                                    <p class="mx-auto">Your WORLD</p>
                                    <p class="text-sm mx-auto">WORLD_NAME</p>
                                </div>
                                <div class="flex flex-col gap-4">
                                    <p class="mx-auto">amount of rooms</p>
                                    <p class="mx-auto">14</p>
                                </div>
                                <div class="flex flex-col gap-4">
                                    <p class="mx-auto">Amount of exits</p>
                                    <p class="mx-auto">54</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Room Summary Dropdown -->
                <div class="border-b tab mx-20 bg-gray-300 rounded-lg">
                    <div class="border-l-2 border-transparent relative">
                        <input class="w-full absolute z-10 cursor-pointer opacity-0 h-5 top-6" type="checkbox" id="chck1">
                        <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none tab-label" for="chck1">
                            <span class="text-grey-darkest text-xl">
                                Room summary
                            </span>
                            <div class="rounded-full border border-grey w-7 h-7 flex items-center justify-center test">
                                <!-- icon by feathericons.com -->
                                <svg aria-hidden="true" class="" data-reactid="266" fill="none" height="24" stroke="#606F7B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <polyline points="6 9 12 15 18 9">
                                    </polyline>
                                </svg>
                            </div>
                        </header>
                        <div class="tab-content">
                            <!-- <div class="pl-8 pr-8 pb-5 text-grey-darkest">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta neque corporis quae molestiae odit ea enim distinctio commodi omnis dolor!                       
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
                                    </tr>
                                  </thead>
                                  <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                          <div class="">
                                            <div class="text-sm font-medium text-gray-900">
                                              WORLD_NAME
                                            </div>
                                          </div>
                                        </div>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">This world has 6 rooms</div>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-lg bg-green-100 text-green-800">
                                          Circle
                                        </span>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        2021-12-01 15:32
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shortest Paths -->
            <div id="shortestPaths"class="border-b tab mx-20 bg-gray-300 rounded-lg hidden">
                <div class="border-l-2 border-transparent relative">
                <input class="w-full absolute z-10 cursor-pointer opacity-0 h-5 top-6" type="checkbox" id="chck1">
                <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none tab-label" for="chck1">
                    <span class="text-grey-darkest text-xl">
                        Shortest Paths
                    </span>
                    <div class="rounded-full border border-grey w-7 h-7 flex items-center justify-center test">
                        <!-- icon by feathericons.com -->
                        <svg aria-hidden="true" class="" data-reactid="266" fill="none" height="24" stroke="#606F7B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <polyline points="6 9 12 15 18 9">
                            </polyline>
                        </svg>
                    </div>
                </header>
                <div class="flex flex-col tab-content">
                    <div class="pl-8 pr-8 pb-5 text-grey-darkest mx-auto">
                        These are the Path our pathfinding algorithm found.
                    </div>

                    <!-- THIS? -->
                    <div class="flex mx-auto gap-10">
                        <span>Shortest path:</span>
                        <span>0,1,5</span>
                        <span>cheapest path:</span>
                        <span>0,2,3,5</span>
                        <span>longest path:</span>
                        <span>0,1,4,7,6,5</span>
                    </div>
                    
                    <!-- OR -->

                    <!-- THIS? -->
                    <!-- Nr 1 -->
                    <div class="flex mx-auto gap-10 ">
                        <span>0,3,4,3,1,5</span>
                        <span>0,3,6,5</span>
                        <span>0,3,7,1,5</span>
                        <span>0,1,5</span>
                        <span>0,1,6,5</span>
                    </div>
                    
                </div>
            </div>
        </div>
        
        </div>
        <!-- Dropdown Items End -->
        <div class="flex mt-auto ml-auto gap-4 py-14 px-14">
            <button id="showShortestPath" class="text-xl bg-green-400 rounded px-5 py-2 text-green-700 hover:bg-green-300">Show Path</button>
            <button id="" class="text-xl bg-green-400 rounded px-5 py-2 text-green-700 hover:bg-green-300">Pathfind</button>
            <a href="#edit" class="text-xl bg-green-400 rounded px-5 py-2 text-green-700 hover:bg-green-300">Edit</a>
            <a href="{{url('/view')}}" class="text-xl bg-green-400 rounded px-5 py-2 text-green-700 hover:bg-green-300">Save</a> <!-- Should Save redirect to view screen?-->        
        </div>
        <div class="fixed bottom-11 left-7 z-100">
            <div class="bg-green-200 border-l-4 rounded-r-lg border-green-500 text-green-800 p-4 shadow-xl" role="alert">
                <p class="font-bold">Success!</p>
                <p>Saved Successfully</p>
              </div>
        </div>
    </div>
    <canvas id="edit" class="bg-green-600 min-h-screen w-full"></canvas> <!-- Canvas have a h of screen. width of full makes it so its not creating a scrollbar.-->
</div>

@endsection