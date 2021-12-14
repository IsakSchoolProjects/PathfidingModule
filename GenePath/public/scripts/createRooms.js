// Room generator

// We need to store the Coordinates for each rooms and the we need to paint a representation of that room,
// That's why we have seperate variables for the painting of the room on the canvas and seperate for the coordinates for the room itself

class world {
    constructor(name, amount) {
        this.name = name;
        this.rooms = [];

        // Variables for the painting the rooms on the canvas
        const w = 30; //! This is the width of the rooms. MUST be the same as h
        const h = 30; //! This is the height of the rooms. MUST be the same as w
        const spaceBetweenY = 60; //* this is the space between the rooms, MUST be twice the W or H

        let x = 30; //! Don't change! same as W
        let y = 30; //! Don't change! same as h

        let currentWidth = 15; //* Should be half as x. Counting the current width and checks if it can fit a room or need to change row

        // Variables for drawing the line between the rooms
        const startX = 30; //* MUST be the same as x. Resetting X for the canvas
        const offsetStartX = 30; //! This MUST be same as w
        const offsetEndX = 60; //! This MUST be twice as much as offsetStartX
        const offsetY = 15; //* This MUST be the half of h

        // Variables for the rooms coordinates
        let trueX = 45; // This is the x-coordinate for the each room itself. //! MUST be 1.5x X
        let trueY = 45; //This is the y-coordinate for the each room itself. //! MUST be 1.5x Y

        for (let i = 0; i < amount; i++) {
            let r = new room(i, trueX, trueY);

            // Exits
            if (i == 0) {
                r.exits.push(i + 1);

                // Draws the path between each rooms offsetting for the center coordinate
                context.beginPath();
                context.moveTo(x + offsetStartX, y + offsetY); // offset for rooms width
                context.lineTo(x + offsetEndX, y + offsetY); //
                context.stroke();
            } else if (i == amount - 1) {
                r.exits.push(i - 1);
            } else {
                r.exits.push(i - 1);
                r.exits.push(i + 1);

                // Draws the path between each rooms offsetting for the center coordinate
                context.beginPath();
                context.moveTo(x + offsetStartX, y + offsetY);
                context.lineTo(x + offsetEndX, y + offsetY);
                context.stroke();
            }
            this.rooms.push(r);

            // Painting to the canvas
            context.fillRect(x, y, w, h);
            x += w * 2; // The coordinate for the next room For the canvas
            trueX += w * 2; // The true coordinate for the room itself
            currentWidth += w * 2;

            // If the width is more than window width start painting on the next row
            if (currentWidth + w >= window.innerWidth) {
                x = startX;
                y += spaceBetweenY;
                trueY += spaceBetweenY;
                currentWidth = offsetY;
            }
        }
        console.log(this.rooms);
    }
}

class room {
    constructor(id, x, y) {
        this.id = id;
        this.name = roomName();
        this.exits = [];
        this.x = x;
        this.y = y;
    }

    nameGen() {
        return `A ${array1[Math.floor(Math.random() * array1.length)]} ${
            array2[Math.floor(Math.random() * array1.length)]
        } of ${array3[Math.floor(Math.random() * array1.length)]}`;
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
    "vampires",
];

let roomName = function nameGen() {
    return `A ${array1[Math.floor(Math.random() * array1.length)]} ${
        array2[Math.floor(Math.random() * array1.length)]
    } of ${array3[Math.floor(Math.random() * array1.length)]}`;
};

let stringWorld = new world("sewe", 200);

// Rectangular world

class squareWorld {
    constructor(name, side) {
        this.name = name;
        this.rooms = [];
        let amount = side * side;
        for (let i = 0; i < amount; i++) {
            let r = new room(i);
            let x = i % side;
            let y = Math.floor(i / side);
            let temp = []; //exits
            // North
            if (y > 0) {
                temp.push(i - side);
            }
            // east
            if (x < side - 1) {
                temp.push(i + 1);
            }
            // West
            if (x > 0) {
                temp.push(i - 1);
            }
            // South
            if (y < side - 1) {
                temp.push(i + side);
            }
            r.exits = temp;
            this.rooms.push(r);
        }

        console.log(this.rooms);
    }
}
// let mySquareWorld = new squareWorld('sweden',4);

// Circular world

class circularWorld {
    constructor(name, amount, start, end) {
        this.name = name;
        this.rooms = [];
        for (let i = 0; i < amount; i++) {
            let r = new room(i);
            if (i == 0) {
                r.exits.push(i + 1);
            } else if (i == amount - 1) {
                r.exits.push(i - 1);
            } else {
                r.exits.push(i - 1);
                r.exits.push(i + 1);
            }
            this.rooms.push(r);
        }
        this.rooms[amount - 1].exits.push(0);
        this.rooms[0].exits.push(amount - 1);
        console.log(this.rooms);
    }
}

// let myCircularWorld = new circularWorld('sweden', 10);

// SPF - Dans pathfinding som han lade ut

function shortestPath(world, src, dst) {
    if (world.rooms.length < 2) {
        console.log(
            "Omg, you wouldnt be able to find your own ass if the lights went out."
        );
        return;
    }
    let checking = [[src]]; // this array contains all the paths we are checking
    let solved = []; // this array contains all the solved paths so far
    let iterations = 0;
    // check each path in checking as long as its not empty
    while (checking.length > 0) {
        let newCheck = []; // temporary array to hold newly discovered paths
        // add exits from checking and push them into the array with new-found exits
        // go through the list of known paths to check
        for (path of checking) {
            let lastroom = path[path.length - 1];
            let exits = world.rooms[lastroom].exits;
            for (let i = 0; i < exits.length; i++) {
                let temp = [];
                let exit = world.rooms[lastroom].exits[i];
                // check if doesn't contain this exit or if we found dst
                if (exit == dst) {
                    temp = path.slice();
                    temp.push(exit);
                    solved.push(temp.slice());
                } else if (!path.includes(exit)) {
                    // if not - add it
                    temp = path.slice();
                    temp.push(exit);
                    // push this path to newly discovered paths
                    newCheck.push(temp.slice());
                } else;
            }
        }
        checking = newCheck.slice();
    }
    return solved;
}