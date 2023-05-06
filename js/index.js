showRooms();

// setInterval(function(){
// 	showRooms();
// },500)
function showRooms() {
  let state = localStorage.getItem("state");
  if (state == null) {
    stateObj = [];
  } else {
    stateObj = JSON.parse(state);
  }
  
  let html = "";
  stateObj.forEach(function(element, index) {
    html += `
    <div class="noteCard my-2 card" style="width:15rem">
    <div class="card-body">
    <h5 class="card-title"><span id="con_name">${element.name}</span> &nbsp; <span class='bg-secondary text-white rounded-pill' id="con_type">${element.con_type}</span></h5>
    <p class="card-text"> <b>Created</b>&nbsp;&nbsp;<span>${element.date}</span> <br>${element.my_state}</p>
    <button id="${index}" onclick="deleteNote(this.id)" class="btn btn-danger">Delete </button>
    <a id="" href="${element.url}" class="btn btn-primary">&nbsp;&nbsp;Join&nbsp;&nbsp; </a>

    </div>
    </div>`;
  });
  let roomElem = document.getElementById('rooms');
  if (stateObj.length != 0) {
    roomElem.innerHTML = html;  
  } 
  else {
    roomElem.innerHTML = `Nothing to show! Use "create" button above to add rooms.`;
  }
}


// Function to delete a note
function deleteNote(index) {
//   console.log("I am deleting", index);

  let state = localStorage.getItem("state");
  if (state == null) {
    stateObj = [];
  } else {
    stateObj = JSON.parse(state);
  }

  stateObj.splice(index, 1);
  localStorage.setItem("state", JSON.stringify(stateObj));
  showRooms();
}



function setName() {
	name = document.getElementById('name').value;

	let strName = JSON.stringify(name);
	localStorage.setItem("Name", strName);
	location.reload();
}

function delName(){
	localStorage.removeItem("Name");
	location.reload();
}

function clipboard(elem){
	var link = document.location.href;
	navigator.clipboard.writeText(link); 
  elem.innerHTML = "Copied";
  setTimeout(function(){
    elem.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
    </svg>`;
  },1500);
  
}

function Exit(){
  history.back();
}

function reload() {
	window.location.reload();
}

function DeleteAll() {
//   console.log("I am deleting", index);

 let state = localStorage.getItem("state");
 if (state == null) {
  stateObj = [];
} else {
  stateObj = JSON.parse(state);
}

let len = stateObj.length;
stateObj.splice(0, len);
localStorage.setItem("state", JSON.stringify(stateObj));
showRooms();
}
