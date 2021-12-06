const showShortestPath = document.querySelector("#showShortestPath");
const ShortestPath = document.querySelector("#shortestPaths");

if(showShortestPath && ShortestPath)
{
    showShortestPath.addEventListener('click', function(){
        ShortestPath.classList.toggle('hidden');
    });
}

let WorldTypes = ['circular', 'branch', 'rectangle'];

document.querySelectorAll('input[name="type"]').forEach((element) => {
    element.addEventListener('change', function(event){
        let displayElement = document.getElementById(event.target.value);

        for (let i = 0; i < WorldTypes.length; i++)
        {
            document.getElementById(WorldTypes[i]).classList.add('hidden');
        }

        displayElement.classList.remove('hidden');
    });
});