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

    <script>
        const createButton = document.getElementById("createButton");

        createButton.addEventListener("click", function (event) {
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

            // World name input
            let worldNameInput = document.querySelector('input[name="worldname"]');

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

            console.log(data);
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
    </script>
@endsection