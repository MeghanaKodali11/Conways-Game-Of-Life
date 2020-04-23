var e = document.getElementById("dropdownSel");
var gridWidth = e.options[e.selectedIndex].value;
var gridHeight = e.options[e.selectedIndex].value;


var select = document.querySelector('#dropdownSel');
select.addEventListener('change',function(){
	
	var e = document.getElementById("dropdownSel");
 gridWidth = e.options[e.selectedIndex].value;
 gridHeight = e.options[e.selectedIndex].value;

document.getElementById("board").innerHTML="";


 directions = [{x:0,y:-1}, {x:1,y:-1}, {x:1,y:0}, {x: 1,y:1}, {x:0,y:1}, {x:-1,y:1}, {x:-1,y:0}, {x:-1,y:-1}];
 size = gridWidth * gridHeight;


 checkboxes = makeBoard(gridWidth, gridHeight);
 grid = makeGrid();
updateBoard();
loop();

});

//var gridWidth = 50;
//var gridHeight=25;

function makeBoard(width, height) {
  var nodes = [];
  var size = width * height;

  var fragment = document.createDocumentFragment();
  for (var i = 0; i < size; i += 1) {
    if (i % width === 0) {
      var br = document.createElement("br");
      fragment.appendChild(br);
    }

    var id = "box" + i;
    var label = document.createElement("label");
    label.setAttribute("for", id);

    var checkbox = document.createElement("input");
    checkbox.setAttribute("type", "checkbox");
    checkbox.id = id;
    nodes.push(checkbox);

    fragment.appendChild(checkbox);
    fragment.appendChild(label);
  }
  board.appendChild(fragment);
  return nodes;
}

/* Make array of booleans. */
function makeGrid() {
  return checkboxes.map(function(checkbox) {
    return Math.random() < 0.25;
  });
}

/* Calculate next generation */
var directions = [{x:0,y:-1}, {x:1,y:-1}, {x:1,y:0}, {x: 1,y:1}, {x:0,y:1}, {x:-1,y:1}, {x:-1,y:0}, {x:-1,y:-1}];

function countNeighbours(x, y) {
  var neighbours = 0;
  for (var i = 0; i < 8; i++) {
    var dir = directions[i];
    var dirX = x + dir.x;
    var dirY = y + dir.y;
    if (dirX >= 0 && dirX < gridWidth && dirY >= 0 && dirY < gridHeight) {
      var index = dirX + (dirY * gridWidth);
      neighbours += grid[index] ? 1 : 0;
    }
  }
  return neighbours;
}

var size = gridWidth * gridHeight;
function nextGeneration() {
  var newGrid = new Array(size);
  for (var i = 0; i < size; i++) {
    var x = i % gridWidth;
    var y = (i - x) / gridWidth;
    var neighbours = countNeighbours(x, y);
    if (neighbours < 2 || neighbours > 3) {
      newGrid[i] = false;
    } else if (neighbours === 2) {
      newGrid[i] = grid[i];
    } else {
      newGrid[i] = true;
    }
  }
  return newGrid;
}

/* Update board */
function updateBoard() {
  checkboxes.forEach(function(checkbox, index) {
    checkbox.checked = grid[index];
  });
}

/* Gosper Glider Gun */
function gosperGliderGun() {


  grid = grid.map(function() {
    return false;
  });
  updateBoard();
  stop = true;
  playBtn.textContent = "Play";
  newBtn.focus();
  
  //var ranNum = randomNumber(1,gridWidth-1);
    
    if(gridWidth == 50){
		// square
    grid[452] = true;
    grid[453] = true;
    grid[502] = true;
    grid[503] = true;
	
	//Pattern 2
	grid[364] = true;
    grid[365] = true;
    grid[413] = true;
    grid[462] = true;
	grid[512] = true;
    grid[562] = true;
    grid[613] = true;
    grid[664] = true;
	
	//Pattern 3
	grid[665] = true;
    grid[516] = true;
    grid[417] = true;
    grid[617] = true;
	
	//Pattern 4
	grid[468] = true;
    grid[518] = true;
    grid[568] = true;
    grid[519] = true;
	grid[372] = true;
    grid[373] = true;
	
	//Pattern 5
	grid[422] = true;
    grid[423] = true;
    grid[472] = true;
    grid[473] = true;
	grid[324] = true;
	
	//Pattern 6
	grid[524] = true;
    grid[276] = true;
    grid[326] = true;
    grid[526] = true;
	grid[576] = true;
    grid[386] = true;
    grid[387] = true;
	
	//Pattern 7
	grid[436] = true;
    grid[437] = true;
   
	}
	updateBoard();
	
	
}

/* Oscillators */
function oscillators() {


  grid = grid.map(function() {
    return false;
  });
  updateBoard();
  stop = true;
  playBtn.textContent = "Play";
  newBtn.focus();
    
    if(gridWidth == 35){
	
    grid[216] = true;
    grid[217] = true;
	grid[218] = true;
    grid[189] = true;
    grid[190] = true;
	
	grid[224] = true;
    grid[262] = true;
    grid[296] = true;
    grid[297] = true;
	grid[271] = true;
    grid[272] = true;
    grid[273] = true;
    grid[305] = true;
	
	grid[306] = true;
    grid[307] = true;
    grid[537] = true;
    grid[543] = true;
	
	grid[572] = true;
    grid[578] = true;
    grid[607] = true;
	
	grid[608] = true;
    grid[612] = true;
    grid[613] = true;
    grid[673] = true;
	
	//Pattern 2
	grid[674] = true;
    grid[675] = true;
    grid[678] = true;
    grid[679] = true;
	grid[681] = true;
    grid[682] = true;
    grid[685] = true;
    grid[686] = true;
	
	//Pattern 3
	grid[687] = true;
    grid[710] = true;
    grid[712] = true;
    grid[714] = true;
	
	//Pattern 4
	grid[716] = true;
    grid[718] = true;
    grid[720] = true;
    grid[747] = true;
	grid[748] = true;
    grid[752] = true;
	
	//Pattern 5
	grid[753] = true;
    grid[817] = true;
    grid[818] = true;
    grid[822] = true;
	grid[823] = true;
	
	//Pattern 6
	grid[850] = true;
    grid[852] = true;
    grid[854] = true;
    grid[856] = true;
	grid[858] = true;
    grid[860] = true;
    grid[883] = true;
	
	//Pattern 7
	grid[884] = true;
    grid[885] = true;
    grid[888] = true;
	grid[889] = true;
    grid[891] = true;
    grid[892] = true;
	grid[895] = true;
    grid[896] = true;
	grid[897] = true;
    grid[957] = true;
    grid[958] = true;
	
	//Pattern 7
	grid[962] = true;
    grid[963] = true;
    grid[992] = true;
    grid[998] = true;
	grid[1027] = true;
    grid[1033] = true;
 
   }
	updateBoard();
	
	
}


/* Still life */
function stillLife() {


  grid = grid.map(function() {
    return false;
  });
  updateBoard();
  stop = true;
  playBtn.textContent = "Play";
  newBtn.focus();
  
    if(gridWidth == 35){
		// square
    grid[285] = true;
    grid[286] = true;
    grid[320] = true;
    grid[321] = true;
	
	//Pattern 2
	grid[257] = true;
    grid[258] = true;
    grid[291] = true;
    grid[294] = true;
	grid[326] = true;
    grid[329] = true;
    grid[362] = true;
    grid[363] = true;
	
	//Pattern 3
	grid[264] = true;
    grid[298] = true;
    grid[300] = true;
    grid[334] = true;
	
	//Pattern 4
	grid[495] = true;
    grid[529] = true;
    grid[531] = true;
    grid[564] = true;
	grid[566] = true;
    grid[600] = true;
	
	//Pattern 5
	grid[506] = true;
    grid[507] = true;
    grid[541] = true;
    grid[543] = true;
	grid[577] = true;
	
	//Pattern 6
	grid[511] = true;
    grid[512] = true;
    grid[546] = true;
    grid[548] = true;
	grid[582] = true;
    grid[584] = true;
    grid[618] = true;
	
	//Pattern 7
	grid[739] = true;
    grid[740] = true;
    grid[742] = true;
    grid[743] = true;
	grid[775] = true;
    grid[777] = true;
    grid[810] = true;
	grid[812] = true;
    grid[844] = true;
	grid[845] = true;
    grid[847] = true;
    grid[848] = true;
	
	//Pattern 7
	grid[750] = true;
    grid[751] = true;
    grid[785] = true;
    grid[788] = true;
	grid[822] = true;
    grid[823] = true;
	
	//Pattern 8
	grid[794] = true;
    grid[795] = true;
    grid[797] = true;
    grid[829] = true;
	grid[831] = true;
    grid[832] = true;
	
	//Pattern 8
	grid[517] = true;
    grid[518] = true;
    grid[552] = true;
    grid[554] = true;
	grid[588] = true;
    grid[590] = true;
	grid[624] = true;
    grid[626] = true;
    grid[660] = true;
    
    }
  

  
  updateBoard();
}


/* Single step */
function step() {

  grid = nextGeneration();
  
  updateBoard();
}

/* Single 23 steps */
function step2() {
	var y;
	for (y=0;y<23;y++)
	{
  grid = nextGeneration();
	}
  updateBoard();
}

/* Loop and Timer */
var speed = 100;
var stop = false;
function loop() {
  step();
  if (!stop) {
    setTimeout(loop, speed);
  }
}

/* Create board */
var board = $("board");
var checkboxes = makeBoard(gridWidth, gridHeight);
var grid = makeGrid();
updateBoard();
loop();

/* Play Button */
var playBtn = $("play");
playBtn.addEventListener("click", function() {
  if (stop) {
    this.textContent = "Stop";
    stop = false;
    loop();
    return;
  }
  this.textContent = "Play";
  stop = true;
});

/* Next Button */
var nextBtn = $("next");
nextBtn.addEventListener("click", step);

/* 23 steps */
var next2Btn = $("23next");
next2Btn.addEventListener("click", step2);

/* New Button */
var newBtn = $("new");
newBtn.addEventListener("click", function() {
  grid = makeGrid();
  updateBoard();
  nextBtn.focus();
});

/* Clear Button */
$("clear").addEventListener("click", function() {
  grid = grid.map(function() {
    return false;
  });
  updateBoard();
  stop = true;
  playBtn.textContent = "Play";
  newBtn.focus();
});

/* Still Life Button */
var stillBtn = $("still");
stillBtn.addEventListener("click", stillLife);

/*Gosper Glider Button */
var stillBtn = $("gosper");
stillBtn.addEventListener("click", gosperGliderGun);

/*Gosper Glider Button */
var stillBtn = $("oscillators");
stillBtn.addEventListener("click", oscillators);

/* Speed control, min - 2 fps, max - 20 fps */
var slider = $("speed");
function logSlider(position) {
  var minp = slider.min;
  var maxp = slider.max;
  var minv = Math.log(500);
  var maxv = Math.log(50);
  var scale = (maxv - minv) / (maxp - minp);
  return Math.ceil(Math.exp(minv + scale * (position - minp)));
}
slider.addEventListener("input", function(event) {
  speed = logSlider(this.value);
});
/* For IE */
slider.addEventListener("change", function(event) {
  speed = logSlider(this.value);
});

board.addEventListener("click", function(event) {
  var target = event.target;
  if (target.tagName === "LABEL") {
    var index = parseInt(target.htmlFor.substring(3), 10);
    grid[index] = !grid[index];
  }
  nextBtn.focus();
});

//console.time("timer");
//for (var i = 0; i < 1000; i++) {
//  grid = nextGeneration();
//}
//console.timeEnd("timer");
//updateBoard();

/* Helper */
function $(id) {
  return document.getElementById(id);
}