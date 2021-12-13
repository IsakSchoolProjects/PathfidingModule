let canvas = document.getElementById("edit");
let context = canvas.getContext('2d')
// min-h-screen w-full
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// context.fillRect(20, 20, 75, 50);
// context.moveTo(200,20);
// context.lineTo(200,1000);
// context.stroke();

let rooms = [
    {
        "name": "room1",
        "exits": [2]
    },
    {
        "name": "room2",
        "exits": [1,2]
    },
    {
        "name": "room3",
        "exits": [2]
    }
];

class World {
    constructor(x,y,w,h, rooms)
    {
        this.x = x;
        this.y = y;
        this.w = w;
        this.h = h;
        this.rooms = rooms;
    }
    
    generateRooms()
    {
        rooms.forEach(room => {
            console.log(room);
        });
    }
}

let myWorld = new World(100,100,200,200, rooms);

myWorld.generateRooms();

canvas.addEventListener("click", () => {
    console.log("DET FUNKAR YANIIIIIIIIIIIIIIIIIIIII MIN FKAN BRYYYYYYDEEEEEER!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!")
});


