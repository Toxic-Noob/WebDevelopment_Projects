function logout(){
    if (!confirm("Are you sure you want to Logout?")){
      return
    }
    fetch("../php/login.php", {
    method: "POST",
    headers: {
        "Accept": "application/json",
        "Content-Type": "application/json"
    },
    body: JSON.stringify({"email": "logOut", "password": "logOut"})
    })
    .then(function (a) {
        return a.json();
    })
    .then(function (json) {
        console.log(json)
    
        if (json.status == "logout"){
          location.href = "login.html";
        }else {
          console.log(json.msg);
        }
    })
}


// Changing Profile and Cover photo
profilePhoto = document.getElementById("edit-profile-photo");
coverPhoto = document.getElementById("edit-cover-photo")

profilePhoto.addEventListener("change", function() {
   const file = profilePhoto.files[0]
   const formData = new FormData()
   
   formData.append("file", file)
   formData.append("photoOf", "profile")
   
    fetch("../php/upload.php", {
      method: "POST",
      body: formData
    })
     .then(response => response.json())
     .then(data => {
       console.log(data)
       if (data.status == "success"){
         location.href = "profile.php";
       }else {
         alert("Profile Picture Changing Failed!");
       }
      })
      .catch(error => {
        console.error(error)
      })
});

coverPhoto.addEventListener("change", function() {
   const file = coverPhoto.files[0]
   const formData = new FormData()
   
   formData.append("file", file)
   formData.append("photoOf", "cover")
   
    fetch("../php/upload.php", {
      method: "POST",
      body: formData
    })
     .then(response => response.json())
     .then(data => {
       console.log(data)
       if (data.status == "success"){
         location.href = "profile.php";
       }else {
         alert("Cover Photo Changing Failed!");
       }
      })
      .catch(error => {
        console.error(error)
      })
})
