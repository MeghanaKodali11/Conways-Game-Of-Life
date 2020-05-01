var e = document.getElementById("dropdownSel");
var gridWidth = e.options[e.selectedIndex].value;
var gridHeight = e.options[e.selectedIndex].value/ 2;

var Count =0;
var pop=0;

var select = document.querySelector('#dropdownSel');
select.addEventListener('change',function(){
	
	var e = document.getElementById("dropdownSel");
 gridWidth = e.options[e.selectedIndex].value;
 gridHeight = e.options[e.selectedIndex].value/2;

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
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
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
    
    if(gridWidth == 60){
		// square
    grid[484] = true;
    grid[485] = true;
	grid[544] = true;
	grid[545] = true;
	grid[376] = true;
	grid[377] = true;
	grid[435] = true;
	grid[439] = true;
	grid[494] = true;
	grid[500] = true;
	grid[554] = true;
	grid[558] = true;
	grid[560] = true;
	grid[561] = true;
	grid[614] = true;
	grid[620] = true;
	grid[675] = true;
	grid[679] = true;
	grid[736] = true;
	grid[737] = true;
	grid[268] = true;
	grid[326] = true;
	grid[328] = true;
	grid[384] = true;
	grid[385] = true;
	grid[444] = true;
	grid[445] = true;
	grid[504] = true;
	grid[505] = true;
	grid[566] = true;
	grid[568] = true;
	grid[628] = true;
	grid[398] = true;
	grid[399] = true;
	grid[458] = true;
	grid[459] = true;

	
   
	}
	if(gridWidth == 50){
		// square
    grid[302] = true;
    grid[303] = true;
	grid[352] = true;
	grid[353] = true;
	grid[214] = true;
	grid[215] = true;
	grid[263] = true;
	grid[267] = true;
	grid[312] = true;
	grid[318] = true;
	grid[362] = true;
	grid[366] = true;
	grid[368] = true;
	grid[369] = true;
	grid[412] = true;
	grid[418] = true;
	grid[463] = true;
	grid[467] = true;
	grid[514] = true;
	grid[515] = true;
	grid[126] = true;
	grid[174] = true;
	grid[176] = true;
	grid[222] = true;
	grid[223] = true;
	grid[272] = true;
	grid[273] = true;
	grid[322] = true;
	grid[323] = true;
	grid[374] = true;
	grid[376] = true;
	grid[426] = true;
	grid[236] = true;
	grid[237] = true;
	grid[286] = true;
	grid[287] = true;

	
   
	}
	 Count = 0;
  pop=0;
  document.getElementById("population").innerHTML="Live Cells : " + pop;
  document.getElementById("counter").innerHTML="Generation count : " + pop;
  setCookie("generation",pop,1);
setCookie("population",pop,1);
  
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
    
    if(gridWidth == 50){
	
    grid[453] = true;
    grid[454] = true;
	grid[455] = true;
	grid[410] = true;
	grid[411] = true;
	grid[460] = true;
	grid[513] = true;
	grid[562] = true;
	grid[563] = true;
	grid[519] = true;
	grid[520] = true;
	grid[521] = true;
	grid[568] = true;
	grid[569] = true;
	grid[570] = true;
	grid[282] = true;
	grid[288] = true;
	grid[332] = true;
	grid[338] = true;
	grid[382] = true;
	grid[383] = true;
	grid[387] = true;
	grid[388] = true;
	grid[478] = true;
	grid[479] = true;
	grid[480] = true;
	grid[483] = true;
	grid[484] = true;
	grid[486] = true;
	grid[487] = true;
	grid[490] = true;
	grid[491] = true;
	grid[492] = true;
	grid[530] = true;
	grid[532] = true;
	grid[534] = true;
	grid[536] = true;
	grid[538] = true;
	grid[540] = true;
	grid[582] = true;
	grid[583] = true;
	grid[587] = true;
	grid[588] = true;
	grid[682] = true;
	grid[683] = true;
	grid[687] = true;
	grid[688] = true;
	grid[730] = true;
	grid[732] = true;
	grid[734] = true;
    grid[736] = true;
    grid[738] = true;
 	grid[740] = true;
 	grid[778] = true;
 	grid[779] = true;
 	grid[780] = true;
 	grid[783] = true;
 	grid[784] = true;
 	grid[786] = true;
 	grid[787] = true;
 	grid[790] = true;
 	grid[791] = true;
 	grid[792] = true; 
	grid[882] = true;
	grid[883] = true;
	grid[887] = true;
 	grid[888] = true;
	grid[932] = true;
	grid[938] = true;
	grid[982] = true;
	grid[988] = true;
   
}
   if(gridWidth == 60){
	
    grid[543] = true;
    grid[544] = true;
	grid[545] = true;
	grid[490] = true;
	grid[491] = true;
	grid[550] = true;
	grid[613] = true;
	grid[672] = true;
	grid[673] = true;
	grid[618] = true;
	grid[619] = true;
	grid[620] = true;
	grid[677] = true;
	grid[678] = true;
	grid[679] = true;
	grid[392] = true;
	grid[398] = true;
	grid[452] = true;
	grid[398] = true;
	grid[458] = true;
	grid[512] = true;
	grid[513] = true;
	grid[517] = true;
	grid[518] = true;
	grid[628] = true;
	grid[629] = true;
	grid[630] = true;
	grid[633] = true;
	grid[634] = true;
	grid[636] = true;
	grid[637] = true;
	grid[640] = true;
	grid[641] = true;
	grid[642] = true;
	grid[690] = true;
	grid[692] = true;
	grid[694] = true;
	grid[696] = true;
	grid[698] = true;
	grid[700] = true;
	grid[752] = true;
	grid[753] = true;
	grid[757] = true;
	grid[758] = true;
	grid[872] = true;
	grid[873] = true;
	grid[877] = true;
	grid[878] = true;
	grid[930] = true;
	grid[932] = true;
	grid[934] = true;
	grid[936] = true;
	grid[938] = true;
	grid[940] = true;
	grid[988] = true;
	grid[989] = true;
	grid[990] = true;
	grid[993] = true;
	grid[994] = true;
	grid[996] = true;
	grid[997] = true;
	grid[1000] = true;
	grid[1001] = true;
	grid[1002] = true;
	grid[1112] = true;
	grid[1113] = true;
	grid[1117] = true;
	grid[1118] = true;
	grid[1172] = true;
	grid[1178] = true;
	grid[1232] = true;
	grid[1238] = true;
 
   }
    Count = 0;
  pop=0;
  document.getElementById("population").innerHTML="Live Cells : " + pop;
  document.getElementById("counter").innerHTML="Generation count : " + pop;
  setCookie("generation",pop,1);
setCookie("population",pop,1);
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
  
    if(gridWidth == 60){
		// square
    grid[430] = true;
    grid[431] = true;
    grid[437] = true;
    grid[442] = true;
	grid[443] = true;
	grid[447] = true;
	grid[448] = true;
	grid[454] = true;
	grid[455] = true;
	grid[461] = true;
	grid[462] = true;
	grid[473] = true;
	grid[474] = true;
	grid[484] = true;
	grid[485] = true;
	grid[489] = true;
	grid[492] = true;
	grid[496] = true;
	grid[498] = true;
	grid[502] = true;
	grid[504] = true;
	grid[507] = true;
	grid[509] = true;
	grid[513] = true;
	grid[516] = true;
	grid[520] = true;
	grid[523] = true;
	grid[527] = true;
	grid[528] = true;
	grid[530] = true;
	grid[533] = true;
	grid[536] = true;
	grid[544] = true;
	grid[545] = true;
	grid[549] = true;
	grid[552] = true;
	grid[557] = true;
	grid[563] = true;
	grid[568] = true;
	grid[570] = true;
	grid[574] = true;
	grid[576] = true;
	grid[581] = true;
	grid[582] = true;
	grid[587] = true;
	grid[589] = true;
	grid[590] = true;
	grid[595] = true;
	grid[596] = true;
	grid[610] = true;
	grid[611] = true;
	grid[629] = true;
	grid[635] = true;
    
    
    }
  if(gridWidth == 50){
		// square
    grid[305] = true;
    grid[306] = true;
    grid[310] = true;
    grid[311] = true;
	grid[317] = true;
	grid[321] = true;
	grid[322] = true;
	grid[326] = true;
	grid[327] = true;
	grid[333] = true;
	grid[334] = true;
	grid[338] = true;
	grid[339] = true;
	grid[341] = true;
	grid[344] = true;
	grid[345] = true;
	grid[355] = true;
	grid[356] = true;
	grid[359] = true;
	grid[362] = true;
	grid[366] = true;
	grid[368] = true;
	grid[371] = true;
	grid[373] = true;
	grid[376] = true;
	grid[378] = true;
	grid[382] = true;
	grid[385] = true;
	grid[388] = true;
	grid[390] = true;
	grid[391] = true;
	grid[394] = true;
	grid[397] = true;
	grid[409] = true;
	grid[412] = true;
	grid[417] = true;
	grid[422] = true;
	grid[427] = true;
	grid[429] = true;
	grid[433] = true;
	grid[435] = true;
	grid[446] = true;
	grid[447] = true;
	grid[460] = true;
	grid[461] = true;
	grid[478] = true;
	grid[484] = true;
	
    
    
    }
Count = 0;
 
  document.getElementById("counter").innerHTML="Generation count : " + Count;	
  pop=0;
  document.getElementById("population").innerHTML="Live Cells : " + pop;
   setCookie("generation",Count,1);
setCookie("population",pop,1);
  updateBoard();
}


function population()
{
	var pop=0;
	var i;
	for(i=0;i<size;i++)
		{
			if(grid[i] == true)
			pop = pop + 1;
		}	
		document.getElementById("population").innerHTML="Live Cells : " + pop;
		setCookie("population",pop,1);
}

/* Single step */
function step() {
   population();
   
  grid = nextGeneration();
  Count = Count + 1;
  
  document.getElementById("counter").innerHTML="Generation count : " + Count;
  setCookie("generation",Count,1);
  updateBoard();
}

/* Single 23 steps */
function step2() {
	var y;
	for (y=0;y<23;y++)
	{
  grid = nextGeneration();
  Count = Count + 1;
  document.getElementById("counter").innerHTML="Generation count : " + Count;
  setCookie("generation",Count,1);
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
  Count = 0;
  pop=0;
  document.getElementById("population").innerHTML="Live Cells : " + pop;
  document.getElementById("counter").innerHTML="Generation count : " + pop;	
  setCookie("generation",pop,1);
setCookie("population",pop,1);
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
  Count = 0;
  pop=0;
  document.getElementById("population").innerHTML="Live Cells : " + pop;
  document.getElementById("counter").innerHTML="Generation count : " + pop;
  setCookie("generation",pop,1);
setCookie("population",pop,1);	
});

/* Still Life Button */
var stillBtn = $("still");
stillBtn.addEventListener("click", stillLife);

/*Gosper Glider Button */
var stillBtn = $("gosper");
stillBtn.addEventListener("click", gosperGliderGun);

/*Oscillator Button */
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