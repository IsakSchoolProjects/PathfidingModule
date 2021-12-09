const showShortestPath = document.querySelector("#showShortestPath");
const ShortestPath = document.querySelector("#shortestPaths");

if(showShortestPath && ShortestPath)
{
    showShortestPath.addEventListener('click', function(){
        ShortestPath.classList.toggle('hidden');
    });
}

let WorldTypes = ['circular', 'branch', 'rectangle'];

let WorldType = "";

document.querySelectorAll('input[name="type"]').forEach((element) => {
    element.addEventListener('change', function(event){
        let displayElement = document.getElementById(event.target.value);

        WorldType = event.target.value;

        for (let i = 0; i < WorldTypes.length; i++)
        {
            document.getElementById(WorldTypes[i]).classList.add('hidden');
        }

        displayElement.classList.remove('hidden');
    });
});

const createButton = document.getElementById('createButton');

createButton.addEventListener('click', function(event) {

    // Hide the error badge
    ErrorElement(false);

    // World name input
    let worldNameInput = document.querySelector('input[name="worldname"]');

    // Check if name is short
    if(worldNameInput.value.length < 1)
            ErrorElement(true, "Error!", "Please enter a world name.");

    if(WorldType === "circular") {
        let roomInput = document.querySelector('input[name="rooms"]');

        // Check if rooms are empty
        if(roomInput.value.length < 1)
            ErrorElement(true, "Error!", "Please enter an amount of rooms.");
    } else if (WorldType === "branch") {
        let initRangeInput = document.querySelector('input[name="initrange"]');

        // Check if init range are empty
        if(initRangeInput.value.length < 1)
            ErrorElement(true, "Error!", "Please enter an init range.");

        let factorInput = document.querySelector('input[name="factor"]');

        // Check if factor are empty
        if(factorInput.value.length < 1)
            ErrorElement(true, "Error!", "Please enter an factor.");
    } else if (WorldType === "rectangle") {
        let xroomsInput = document.querySelector('input[name="xrooms"]');

        // Check if x rooms are empty
        if(xroomsInput.value.length < 1)
            ErrorElement(true, "Error!", "Please enter an amount of X rooms.");

        let yroomsInput = document.querySelector('input[name="yrooms"]');

        // Check if y rooms are empty
        if(yroomsInput.value.length < 1)
            ErrorElement(true, "Error!", "Please enter an amount of Y rooms."); 
    } else
        // Show the error badge
        ErrorElement(true, "Error!", "Please select a world-type.")
});

function ErrorElement(view, title, content)
{
    let errorElement = document.getElementById('errorElement');

    let errorElementContent = document.querySelectorAll('#errorElement div p');

    if(view) {
        errorElement.classList.remove('hidden');

        errorElementContent[0].textContent = title;
        errorElementContent[1].textContent = content;
    } else {
        errorElement.classList.add('hidden');
    }
}