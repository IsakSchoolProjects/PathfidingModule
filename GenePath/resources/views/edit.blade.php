@extends('layouts.layout')

@section('head')
<style>
    .tab {
    overflow: hidden;
    }
    .tab-content {
    max-height: 0vh;
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
            <h1 class="text-4xl">{{ $world[0]->name }}</h1>
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
                        <div class="flex flex-col gap-4 tab-content">
                            <div class=" overflow-hidden sm:rounded-lg mx-32 pb-8">
                                <table class="min-w-full divide-y divide-gray-400">
                                  <thead class="bg-gray-300">
                                    <tr>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                          world Name
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Type
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        amount of rooms
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Amount of exits
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody class="bg-gray-300">
                                      <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="flex">
                                            <div class="">
                                              <div class="text-sm font-medium text-gray-900">
                                                {{ $world[0]->name }}
                                              </div>
                                            </div>
                                          </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex">
                                              <div class="">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-lg bg-green-100 text-green-800">
                                                  {{ ucfirst($world[0]->type) }}
                                                </span>
                                              </div>
                                            </div>
                                          </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 inline-flex text-xs font-semibold rounded-full bg-gray-700 text-white">
                                                {{ sizeof($rooms) }}
                                            </span>                            
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 inline-flex text-xs font-semibold rounded-full bg-gray-700 text-white">
                                                @php
                                                  $total_exits = 0;  
                                                @endphp
                                                @foreach ($rooms as $room)
                                                    @foreach (explode(",", $room->exits) as $exit)
                                                    @php
                                                        $total_exits++
                                                    @endphp
                                                    @endforeach
                                                @endforeach

                                                {{$total_exits}}
                                            </span>
                                        </td>
                                      </tr>
                                  </tbody>
                                </table>
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

                        <div class="flex flex-col gap-4 tab-content">
                            <div class=" overflow-hidden sm:rounded-lg mx-32 pb-8">
                                <table class="min-w-full divide-y divide-gray-400">
                                  <thead class="bg-gray-300">
                                    <tr>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Exits
                                      </th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Cost
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody class="bg-gray-300">
                                      @foreach ($rooms as $room)
                                      <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="flex">
                                            <div class="">
                                              <div class="text-sm font-medium text-gray-900">
                                                {{ $room->name }}
                                              </div>
                                            </div>
                                          </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                        @foreach (explode(",", $room->exits) as $exit)
                                            <span class="px-2 py-1 inline-flex text-xs font-semibold rounded-full bg-gray-700 text-white">
                                                {{ $exit }}
                                            </span>
                                        @endforeach
                            

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 inline-flex text-xs font-semibold rounded-full bg-gray-700 text-white">
                                                {{ $room->cost }}
                                            </span>
                                        </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                                </table>
                            </div>
                            
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
        <div class="fixed bottom-11 left-7 z-100 select-none">
            <div class="bg-green-200 border-l-4 rounded-r-lg border-green-500 text-green-800 p-4 shadow-xl" role="alert">
                <p class="font-bold">Success!</p>
                <p>Saved Successfully</p>
              </div>
        </div>
    </div>
    <canvas class="bg-gray-400 min-h-screen w-full"></canvas> <!-- Canvas have a h of screen. width of full makes it so its not creating a scrollbar.-->
</div>

<script>
  let canvas = document.querySelector('canvas');

  let context = canvas.getContext('2d');

  let data = {!! json_encode($rooms) !!};

  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;

  /*
   *  Classes
  */

  class CircularWorld {
    constructor(amount)
    {
        // this.name = ;
        this.rooms = [];

        // Variables for the painting the rooms on the canvas
        this.w = 30; //! This is the width of the rooms. MUST be the same as h
        this.h = 30; //! This is the height of the rooms. MUST be the same as w
        this.spaceBetweenY = 60; //* this is the space between the rooms, MUST be twice the W or H

        this.x = 30; //! Don't change! same as W
        this.y = 30; //! Don't change! same as h

        this.currentWidth = 15; //* Should be half as x. Counting the current width and checks if it can fit a room or need to change row

        // Variables for drawing the line between the rooms
        this.startX = 30; //* MUST be the same as x. Resetting X for the canvas
        this.offsetStartX = 30; //! This MUST be same as w
        this.offsetEndX = 60; //! This MUST be twice as much as offsetStartX
        this.offsetY = 15; //* This MUST be the half of h

        // Variables for the rooms coordinates
        this.trueX = 45; // This is the x-coordinate for the each room itself. //! MUST be 1.5x X
        this.trueY = 45; //This is the y-coordinate for the each room itself. //! MUST be 1.5x Y
        

        for (let i = 0; i < amount; i++)
        {
            let room = new Room(data[i].name, data[i].id, data[i].cost, this.trueX, this.trueY);

            room.exits.push(data[i].exits);

            if (i == 0)
            {
                // room.exits.push(i + 1);

                // Draws the path between each rooms offsetting for the center coordinate
                context.beginPath();
                context.moveTo(this.x + this.offsetStartX, this.y + this.offsetY); // offset for rooms width
                context.lineTo(this.x + this.offsetEndX, this.y + this.offsetY); //
                context.stroke();
            }
            else if (i == amount - 1)
            {
                // room.exits.push(i - 1);
                context.beginPath();
                context.moveTo(this.x + (this.offsetStartX / 2), this.y + this.offsetY);
                context.lineTo(this.x + (this.offsetStartX / 2), this.y + this.offsetY + (this.spaceBetweenY / 2));
                context.lineTo(this.x - this.currentWidth + this.w, this.y + this.offsetY + (this.spaceBetweenY / 2));
                context.lineTo(this.x - this.currentWidth + this.w, this.y + this.offsetY);
                context.stroke();
            }
            else
            {
                // room.exits.push(i - 1);
                // room.exits.push(i + 1);
                context.beginPath();
                context.moveTo(this.x + this.offsetStartX, this.y + this.offsetY);
                context.lineTo(this.x + this.offsetEndX, this.y + this.offsetY);
                context.stroke();
            }

            this.rooms.push(room);
            
            // Painting to the canvas
            context.fillRect(this.x, this.y, this.w, this.h);

            this.x += this.w * 2; // The coordinate for the next room For the canvas
            this.trueX += this.w * 2; // The true X1-coordinate for the room itself
            
            this.currentWidth += this.w * 2;

            // If the width is more than window width start painting on the next row
            if (this.currentWidth + this.w >= window.innerWidth)
            {
                this.x = this.startX;
                this.y += this.spaceBetweenY;
                this.trueY += this.spaceBetweenY;
                this.currentWidth = this.offsetY;
            }
        }

        // this.rooms[amount - 1].exits.push(0);
        // this.rooms[0].exits.push(amount - 1);
    }
  }

  class Room {
    constructor(name, id, cost, x, y)
    {
        this.name = name;
        this.id = id;
        this.cost = cost;
        this.x = x;
        this.y = y;
        this.exits = [];
    }
  }

  let array1 = ["earie", "dark", "boring", "bloody", "huge", "wild", "moody", "scary", "rightful","godly"];
  let array2 = ["bathroom","kitchen","abattoir","room","plaza","hospital","alley","cave","closet","cavern","dormitory"];
  let array3 = ["presidents","pigs","monsters","people","aliens","animals","swedes","CEO:s","fotballers","clowns","vampires"];

  let MyCircularWorld = new CircularWorld(data.length);

  let RoomConfig = {
    start: null,
    end: null
  }

  // Remove default right-click Chrome menu
  canvas.addEventListener("contextmenu", e => e.preventDefault());

  // Detect on mouse-click when selecting a room
  canvas.addEventListener("mousedown", (e) =>{
    // Check if the button was the LButton
    if(e.buttons == 1)
    {
      for(let i = 0; i < MyCircularWorld.rooms.length; i++)
      {
        if(IsWithinCoordinates(
            // Mouse X when clicked
            e.clientX,
            // Mouse Y when clicked
            e.clientY,
            // Get top left corner
            MyCircularWorld.rooms[i].x - (MyCircularWorld.w / 2),
            MyCircularWorld.rooms[i].y - (MyCircularWorld.h / 2),
            // Get bottom right corner
            MyCircularWorld.rooms[i].x + (MyCircularWorld.w / 2),
            MyCircularWorld.rooms[i].y + (MyCircularWorld.h / 2)
        ))
        {
            // console.log('Start connection from', MyCircularWorld.rooms[i].id);

            // Check if no selection has been done before
            if(!RoomConfig.start && !RoomConfig.end)
            {
              RoomConfig.start = MyCircularWorld.rooms[i].id;

              console.log('Choose room as start', RoomConfig.start);
            }
        }
      }
    }

    // Check if the button was the RButton
    else if(e.buttons == 2)
    {
      for(let i = 0; i < MyCircularWorld.rooms.length; i++)
      {
        if(IsWithinCoordinates(
            // Mouse X when clicked
            e.clientX,
            // Mouse Y when clicked
            e.clientY,
            // Get top left corner
            MyCircularWorld.rooms[i].x - (MyCircularWorld.w / 2),
            MyCircularWorld.rooms[i].y - (MyCircularWorld.h / 2),
            // Get bottom right corner
            MyCircularWorld.rooms[i].x + (MyCircularWorld.w / 2),
            MyCircularWorld.rooms[i].y + (MyCircularWorld.h / 2)
        ))
        {
          // console.log('End connection on', MyCircularWorld.rooms[i].id);

          // Check if a start selection has been done before
          if(RoomConfig.start && !RoomConfig.end)
          {
            // Check if choosing end the same as start
            if(RoomConfig.start !== MyCircularWorld.rooms[i].id)
            {
              // Check if exit already exists
              MyCircularWorld.rooms[i].exits.forEach(exit => {
                
              });

              if()
              {
                RoomConfig.end = MyCircularWorld.rooms[i].id;

                console.log('Choose room as end', RoomConfig.end);
              }
            }
          }
        }
      }
    }
  });

  /*
   *  Functions
  */

  function IsWithinCoordinates(mx, my, x1, y1, x2, y2)
  { 
    return mx > x1 && my > y1 && mx < x2 && my < y2;
  }

  function GenerateRoomName()
  {
      return (`
        A 
        ${array1[Math.floor(Math.random() * array1.length)]} 
        ${array2[Math.floor(Math.random() * array1.length)]}
         of
        ${array3[Math.floor(Math.random() * array1.length)]}
      `);
  }
  
</script>

{{-- <script src="{{ asset('scripts/createRooms.js')}}"></script> --}}

@endsection