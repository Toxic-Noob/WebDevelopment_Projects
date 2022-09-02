let button = document.getElementById("submit");

function makeJson(){
  tag = document.getElementById("input");
  name1 = tag.name;
  
  if (tag.value.length == 0 && name1 != "submit"){
    alert("You Must Fill Your Data!");
    return "err";
  }
  
  if (name1 == "gender"){
    
    radio = document.querySelectorAll('input[type="radio"]:checked').length;
    if (radio === 0){
      alert("You Must Fill Your Data!");
       return "err";
    }
    
    value1 = document.querySelector('input[name="gender"]:checked').value;
  }
  else if (name1 == "birthdate"){
    value1 = tag.value.split("-").reverse().join("-")
  }
  else if (name1 == "submit"){
    value1 = "submit"
  }
  else{
    value1 = tag.value;
  }
  
  
  
  if (name1 == "first-name"){
    tag2 = document.getElementById("input2");
    name2 = tag2.name;
    value2 = tag2.value;
    
    data = {
      "name": name1,
      "value": value1,
      "name2": name2,
      "value2": value2
    }
  }
  else{
    data = {
      "name": name1,
      "value": value1
    }
  }
  
  return data;
}

function nextPage(){
  name = document.getElementById("input").name;
  if (name == "first-name"){
    location.href = "signup-02-1.html";
  }else if (name == "email"){
    location.href = "signup-03.html";
  }else if (name == "birthdate"){
    location.href = "signup-04.html";
  }else if (name == "gender"){
    location.href = "signup-05.html";
  }else if (name == "password"){
    location.href = "signup-06.html";
  }else if (name == "submit"){
    location.href = "login.html"
  }
  
}


button.addEventListener("click", function(){
  let data = makeJson();
  if (data == "err"){
    return
  }
  fetch("../php/signup.php", {
  method: "POST",
  headers: {'Content-Type': 'application/json'}, 
  body: JSON.stringify(data)
  }).then(res => {
  console.log("Request complete! response:", res);
  });
  
  nextPage();
  
  
});

