// Room generator
class room{
    constructor(id)
    {
        this.id = id;
        this.name = roomName();
        this.exits = [];
    }

    nameGen(){
        return `A ${array1[Math.floor(Math.random()*array1.length)]} ${array2[Math.floor(Math.random()*array1.length)]} of ${array3[Math.floor(Math.random()*array1.length)]}`; 
    }
};

class world{
    constructor(name, amount)
    {
        this.name = name;
        this.rooms = [];
        for(let i=0; i<amount; i++)
        {
            // roomNames[i] = new room(i,1);
            // this.rooms.push(roomNames[i]);
            let r = new room(i)
            if(i==0)
            {
                r.exits.push(i+1);
            }else if(i==amount-1){
                r.exits.push(i-1);
            }else{
                r.exits.push(i-1);
                r.exits.push(i+1);
            }
            this.rooms.push(r);
        }
    }

    GenerateWorld(){
        console.log(this.rooms);
    }
}

let array1 = [
    "earie",
    "dark",
    "boring",
    "bloody",
    "huge",
    "wild",
    "moody",
    "scary",
    "rightful",
    "godly",
];
let array2 = [
    "bathroom",
    "kitchen",
    "abattoir",
    "room",
    "plaza",
    "hospital",
    "alley",
    "cave",
    "closet",
	"cavern",
    "dormitory",
];
let array3 = [
    "presidents",
    "pigs",
    "monsters",
    "people",
    "aliens",
    "animals",
    "swedes",
    "CEO:s",
    "fotballers",
    "clowns",
    "vampires"
];

let roomName = function nameGen(){
    return `A ${array1[Math.floor(Math.random()*array1.length)]} ${array2[Math.floor(Math.random()*array1.length)]} of ${array3[Math.floor(Math.random()*array1.length)]}`; 
};

let myWorld = new world('sweden', 4);
myWorld.GenerateWorld();



// Rectangular world

class squareWorld{
    constructor(name, side)
    {
        this.name = name;
        this.rooms = [];
        let amount = side*side;
        for(let i=0; i<amount; i++)
        {
            let r = new room(i);
            let x = i%side;
            let y = Math.floor(i/side);
            let temp = []; //exits 
            // North
            if(y>0)
            {
                temp.push(i-side);
            };
            // east
            if(x<side-1)
            {
                temp.push(i+1);
            }
            // West
            if(x>0)
            {
                temp.push(i-1);
            }
            // South
            if(y<side-1)
            {
                temp.push(i+side);
            }
            r.exits = temp;
            this.rooms.push(r)
        }
    }

    GenerateSquareWorld(){
        console.log(this.rooms);
    }
}
let mySquareWorld = new squareWorld('sweden',4);
// console.log(myWorld);
mySquareWorld.GenerateSquareWorld();

// Circular world

class circularWorld{
    constructor(name, amount, start, end)
    {
        this.name = name;
        this.rooms = [];
        for(let i=0; i<amount; i++)
        {
            // roomNames[i] = new room(i,1);
            // this.rooms.push(roomNames[i]);
            let r = new room(i)
            if(i==0)
            {
                r.exits.push(i+1);
            }else if(i==amount-1){
                r.exits.push(i-1);
            }else{
                r.exits.push(i-1);
                r.exits.push(i+1);
            }
            this.rooms.push(r);
        }
        this.rooms[amount-1].exits.push(0);
        this.rooms[0].exits.push(amount-1);
    }

    GenerateWorld(){
        console.log(this.rooms);
    }
}

let myWorld = new circularWorld('sweden', 10);
myWorld.GenerateWorld();


// SPF - Dans pathfinding som han lade ut

function shortestPath(world,src,dst) {
    if(world.rooms.length < 2) 
     {
         console.log("Omg, you wouldnt be able to find your own ass if the lights went out.");
         return;
     }
    let checking = [[src]];     // this array contains all the paths we are checking
    let solved = [];            // this array contains all the solved paths so far
    let iterations = 0;
    // check each path in checking as long as its not empty
    while(checking.length>0) {
        let newCheck = []; // temporary array to hold newly discovered paths
        // add exits from checking and push them into the array with new-found exits
        // go through the list of known paths to check
        for(path of checking) {
            let lastroom = path[path.length-1];
            let exits = world.rooms[lastroom].exits;
            for(let i=0; i<exits.length; i++) {
                let temp = [];
                let exit = world.rooms[lastroom].exits[i];
                // check if doesn't contain this exit or if we found dst
                if(exit == dst) {
                    temp = path.slice();
                    temp.push(exit);
                    solved.push(temp.slice());
                }
                else if(!path.includes(exit)) {
                    // if not - add it
                    temp = path.slice();
                    temp.push(exit);
                    // push this path to newly discovered paths
                    newCheck.push(temp.slice());    
                }
                else    
                    ;
            }
        }
        checking = newCheck.slice();
    }
    return solved;
}


