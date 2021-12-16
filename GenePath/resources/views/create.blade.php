@extends('layouts.layout')

@section('content')
    <a href="{{ url('/') }}" class="group absolute top-3 left-3 text-4xl"><i
            class="fas fa-arrow-circle-left text-green-300 group-hover:text-green-500"></i></a>
    <div class="min-h-screen flex flex-col gap-24 bg-gray-200">
        <div class="mx-auto py-14">
            <h1 class="text-4xl">Create</h1>
        </div>
        <div class="flex flex-col mx-auto gap-12">
            <form class="flex flex-col mx-auto gap-12" method="post" action="{{ route('create-new-world') }}">
            {{-- <form class="flex flex-col mx-auto gap-12"> --}}
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <input type="hidden" name="_rooms" id="_rooms" value="" />
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
                            <input type="text" name="worldname"
                                class="bg-gray-100 border border-gray-300 rounded outline-none">
                        </div>
                        <div id="circular" class="flex flex-col gap-2 hidden">
                            <label for="rooms">Amount of rooms</label>
                            <input type="text" name="rooms" class="bg-gray-100 border border-gray-300 rounded outline-none">
                        </div>
                        <div id="branch" class="flex flex-col gap-2 hidden">
                            <label for="initrange">Init rage</label>
                            <input type="text" name="initrange"
                                class="bg-gray-100 border border-gray-300 rounded outline-none">

                            <label for="factor">Factor</label>
                            <input type="text" name="factor"
                                class="bg-gray-100 border border-gray-300 rounded outline-none">
                        </div>
                        <div id="rectangle" class="flex flex-col gap-2 hidden">
                            <label for="xrooms">Amount of rooms on X-Angle</label>
                            <input type="text" name="xrooms"
                                class="bg-gray-100 border border-gray-300 rounded outline-none">

                            <label for="yrooms">Amount of rooms on Y-Angle</label>
                            <input type="text" name="yrooms"
                                class="bg-gray-100 border border-gray-300 rounded outline-none">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mx-auto mt-auto p-14 gap-6">
                    <input type="submit" id="createButton"
                        class="text-xl bg-green-400 rounded px-5 py-2 text-green-700 hover:bg-green-300 font-medium"
                        value="Create World"></input>
                </div>
            </form>

            {{-- Badge --}}
            <div id="errorElement" class="hidden fixed bottom-7 left-7 z-100">
                <div class="bg-red-200 border-l-4 rounded-r-lg border-red-500 text-red-800 p-4 shadow-xl" role="alert">
                    <p class="font-bold"></p>
                    <p></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const createButton = document.getElementById("createButton");

        // World name input
        let worldNameInput = document.querySelector('input[name="worldname"]');

        worldNameInput.value = GenerateWorldName();

        createButton.addEventListener("click", function(event) {
            // Hide the error badge
            ErrorElement(false);

            // Object to store data and then send
            let data = {
                "worldName": null,
                "rooms": null,
                "initRange": null,
                "factor": null,
                "xrooms": null,
                "yrooms": null,
            };

            // Check if name is short
            if (worldNameInput.value.length < 1)
                ErrorElement(true, "Error!", "Please enter a world name.");
            else
                data.worldName = worldNameInput.value;

            if (WorldType === "circular") {
                let roomInput = document.querySelector('input[name="rooms"]');

                // Check if rooms are empty
                if (roomInput.value.length < 1)
                    ErrorElement(true, "Error!", "Please enter an amount of rooms.");
                else
                    data.rooms = roomInput.value;

            } else if (WorldType === "branch") {
                let initRangeInput = document.querySelector('input[name="initrange"]');

                // Check if init range are empty
                if (initRangeInput.value.length < 1)
                    ErrorElement(true, "Error!", "Please enter an init range.");
                else
                    data.initRange = initRangeInput.value;

                let factorInput = document.querySelector('input[name="factor"]');

                // Check if factor are empty
                if (factorInput.value.length < 1)
                    ErrorElement(true, "Error!", "Please enter an factor.");
                else
                    data.factor = factorInput.value;

            } else if (WorldType === "rectangle") {
                let xroomsInput = document.querySelector('input[name="xrooms"]');

                // Check if x rooms are empty
                if (xroomsInput.value.length < 1)
                    ErrorElement(true, "Error!", "Please enter an amount of X rooms.");
                else
                    data.xrooms = xroomsInput.value;

                let yroomsInput = document.querySelector('input[name="yrooms"]');

                // Check if y rooms are empty
                if (yroomsInput.value.length < 1)
                    ErrorElement(true, "Error!", "Please enter an amount of Y rooms.");
                else
                    data.yrooms = yroomsInput.value;
            }
            // Show the error badge
            else ErrorElement(true, "Error!", "Please select a world-type.");

            let MyCircularWorld = new CircularWorld(data.rooms);

            document.getElementById('_rooms').value = JSON.stringify(MyCircularWorld.rooms);
        });

        function ErrorElement(view, title, content) {
            let errorElement = document.getElementById("errorElement");

            let errorElementContent = document.querySelectorAll("#errorElement div p");

            if (view) {
                errorElement.classList.remove("hidden");

                errorElementContent[0].textContent = title;
                errorElementContent[1].textContent = content;
            } else {
                errorElement.classList.add("hidden");
            }
        }

        let entries = [
            ['Great', 'Cool', 'Scary', 'Big', 'Boring', 'Stunning', 'Dark', 'Slippery', 'Empty', 'Full'],
            ['Cave', 'Hall', 'Room', 'Hallway', 'Hospital', 'Alley', 'Closet', 'Classroom', 'Kitchen', 'Bedroom'],
            ['Monsters', 'Arrows', 'Love', 'Darkness', 'Death', 'Rights', 'People', 'Dead', 'Spiders', 'Kids']
        ];

        function GenerateRoomName()
        {
            return "A " +
                entries[0][Random(0, entries[0].length - 1)] +
                " " +
                entries[1][Random(0, entries[1].length - 1)] +
                " of " +
                entries[2][Random(0, entries[2].length - 1)];
        }

        function GenerateWorldName()
        {
            const _chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

            let name = "";

            for (let i = 0; i < 5; i++) {
                name += _chars[Random(1, _chars.length - 1)];
            }

            return name;
        }

        function Random(min, max)
        {
            return Math.floor(Math.random() * (max - min + 1) + min)
        }

        class CircularWorld
        {
            constructor(amount)
            {
                this.rooms = [];

                for (let i = 0; i < amount; i++)
                {
                    let room = new Room(GenerateRoomName(), i);

                    // Push correct exits
                    // for (let j = 0; j < data[i].exits.split(',').length; j++)
                    // {
                    //     room.exits.push(parseInt(data[i].exits.split(',')[j]));
                    // }

                    if (i == 0)
                    {
                        room.exits.push(i + 1);
                    } 
                    else if (i == amount - 1)
                    {
                        room.exits.push(i - 1);
                    }
                    else
                    {
                        room.exits.push(i - 1);
                        room.exits.push(i + 1);
                    }

                    this.rooms.push(room);
                }

                this.rooms[amount - 1].exits.push(0);
                this.rooms[0].exits.push(amount - 1);
            }
        }

        class Room
        {
            constructor(name, id)
            {
                this.name = name;
                this.id = id;
                this.exits = [];
            }
        }
    </script>
@endsection
