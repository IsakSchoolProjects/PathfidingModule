const showShortestPath = document.querySelector("#showShortestPath");
const ShortestPath = document.querySelector("#shortestPaths");


showShortestPath.addEventListener('click', function(){
    ShortestPath.classList.toggle('hidden');
});

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;