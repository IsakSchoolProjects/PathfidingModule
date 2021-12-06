const showShortestPath = document.querySelector("#showShortestPath");
const ShortestPath = document.querySelector("#shortestPaths");


if(showShortestPath && ShortestPath)
{
    showShortestPath.addEventListener('click', function(){
        ShortestPath.classList.toggle('hidden');
    });
}

document.querySelectorAll('input[name="type"]').forEach((element) => {
    element.addEventListener('change', function(event){
        console.log(event.target.value);
    });
});



