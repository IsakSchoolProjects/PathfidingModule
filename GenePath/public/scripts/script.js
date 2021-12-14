const showShortestPath = document.querySelector("#showShortestPath");
const ShortestPath = document.querySelector("#shortestPaths");

if (showShortestPath && ShortestPath) {
    showShortestPath.addEventListener("click", function () {
        ShortestPath.classList.toggle("hidden");
    });
}

let WorldTypes = ["circular", "branch", "rectangle"];

let WorldType = "";

document.querySelectorAll('input[name="type"]').forEach((element) => {
    element.addEventListener("change", function (event) {
        let displayElement = document.getElementById(event.target.value);

        WorldType = event.target.value;

        for (let i = 0; i < WorldTypes.length; i++) {
            document.getElementById(WorldTypes[i]).classList.add("hidden");
        }

        displayElement.classList.remove("hidden");
    });
});

// const createButton = document.getElementById("createButton");

// createButton.addEventListener("click", function (event) {
//     // Hide the error badge
//     ErrorElement(false);

//     // Object to store data and then send
//     let data = {
//         "worldName": null,
//         "rooms": null,
//         "initRange": null,
//         "factor": null,
//         "xrooms": null,
//         "yrooms": null,
//     };

//     // World name input
//     let worldNameInput = document.querySelector('input[name="worldname"]');

//     // Check if name is short
//     if (worldNameInput.value.length < 1)
//         ErrorElement(true, "Error!", "Please enter a world name.");
//     else
//         data.worldName = worldNameInput.value;

//     if (WorldType === "circular") {
//         let roomInput = document.querySelector('input[name="rooms"]');

//         // Check if rooms are empty
//         if (roomInput.value.length < 1)
//             ErrorElement(true, "Error!", "Please enter an amount of rooms.");
//         else
//             data.rooms = roomInput.value;

//     } else if (WorldType === "branch") {
//         let initRangeInput = document.querySelector('input[name="initrange"]');

//         // Check if init range are empty
//         if (initRangeInput.value.length < 1)
//             ErrorElement(true, "Error!", "Please enter an init range.");
//         else
//             data.initRange = initRangeInput.value;

//         let factorInput = document.querySelector('input[name="factor"]');

//         // Check if factor are empty
//         if (factorInput.value.length < 1)
//             ErrorElement(true, "Error!", "Please enter an factor.");
//         else
//             data.factor = factorInput.value;

//     } else if (WorldType === "rectangle") {
//         let xroomsInput = document.querySelector('input[name="xrooms"]');

//         // Check if x rooms are empty
//         if (xroomsInput.value.length < 1)
//             ErrorElement(true, "Error!", "Please enter an amount of X rooms.");
//         else
//             data.xrooms = xroomsInput.value;

//         let yroomsInput = document.querySelector('input[name="yrooms"]');

//         // Check if y rooms are empty
//         if (yroomsInput.value.length < 1)
//             ErrorElement(true, "Error!", "Please enter an amount of Y rooms.");
//         else
//             data.yrooms = yroomsInput.value;
//     }
//     // Show the error badge
//     else ErrorElement(true, "Error!", "Please select a world-type.");

//     console.log(data);

//     {{ CreateController:create(data) }}
// });

// function ErrorElement(view, title, content) {
//     let errorElement = document.getElementById("errorElement");

//     let errorElementContent = document.querySelectorAll("#errorElement div p");

//     if (view) {
//         errorElement.classList.remove("hidden");

//         errorElementContent[0].textContent = title;
//         errorElementContent[1].textContent = content;
//     } else {
//         errorElement.classList.add("hidden");
//     }
// }