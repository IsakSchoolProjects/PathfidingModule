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

function isWithinCoordinates(mx,my,x1,y1,x2,y2)
{
    // return (mx>x1 && mx<x2 && my>y1 && my<y2);
    // return (mx>x1 && mx<x2 && my);
    return (mx>x1 && my>y1 && mx<x2 && my<y2);
}

canvas.addEventListener("click", (event) => {
    console.log(event.clientX, event.clientY);

    if(isWithinCoordinates(event.clientX, event.clientY,0,0,250,250))
    {
        console.log('debug');

    }
});

// function generateRoom()
// {
//     let x = 10;
//     let y = 10;
//     let room = {
//         content: context.fillRect(x,y,250,250),
//         coordinates: [x,y]
//     } 

//     room.content;
//     console.log(room.coordinates)
// }

// generateRoom();


