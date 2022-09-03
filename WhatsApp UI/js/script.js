let msgdetails = document.getElementById("msg-details");

let statusdetails = document.getElementById("status-details");

let calldetails = document.getElementById("call-details");

let chats = document.getElementById("chats");

let status = document.getElementById("status");

let calls = document.getElementById("calls");

let buttonstyle1 = "border-bottom: 3px solid white;";
let buttonstyle2 = "border-bottom: 3px solid transparent;"


chats.addEventListener("click", function() {
  chats.style = buttonstyle1;
  status.style = buttonstyle2;
  calls.style = buttonstyle2;
  msgdetails.style.display = "block";
  statusdetails.style.display = "none";
  calldetails.style.display = "none";
});

status.addEventListener("click", function() {
  chats.style = buttonstyle2;
  status.style = buttonstyle1;
  calls.style = buttonstyle2;
  msgdetails.style.display = "none";
  statusdetails.style.display = "block";
  calldetails.style.display = "none";
});

calls.addEventListener("click", function() {
  chats.style = buttonstyle2;
  status.style = buttonstyle2;
  calls.style = buttonstyle1;
  msgdetails.style.display = "none";
  statusdetails.style.display = "none";
  calldetails.style.display = "block";
});

