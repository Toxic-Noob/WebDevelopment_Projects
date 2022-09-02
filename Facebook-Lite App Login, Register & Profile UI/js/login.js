let showHide = document.getElementById("show-hide");
let passtag = document.getElementById("password");


showHide.addEventListener("click", function(){
  if (showHide.alt == "Show Password"){
    showHide.alt = "Hide Password";
    showHide.src = "../icons/hide-password.png";
    passtag.type = "text";
  }
  else{
    showHide.alt = "Show Password";
    showHide.src = "../icons/show-password.png";
    passtag.type = "password";
  }
});





let button = document.getElementById("login");


button.addEventListener("click", function() {
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;
  
  if ((email.length == 0) || (password.length == 0)){
    alert("You Need to Enter your Email and Password");
    return
  }
  
  let data = {
    "email": email,
    "password": password
  }
  
  fetch("../php/login.php", {
    method: 'POST',
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
})
    .then(function (a) {
        return a.json();
    })
    .then(function (json) {
        console.log(json)
    
        if (json.status == "success"){
      location.href = "profile.php";
        }else if (json.status == "error") {
          alert(json.msg);
        }
    })
  
})


