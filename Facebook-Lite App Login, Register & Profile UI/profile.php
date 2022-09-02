<?php
  
  $data = json_decode(file_get_contents("data/data.json"), true);
  
  session_start();
  $_SESSION = $_SESSION;
  if (array_key_exists("email", $_SESSION) && array_key_exists("password", $_SESSION)){
    $email = $_SESSION["email"];
    $password = $_SESSION["password"];
  } else {
    $email = "";
    $password = "";
  }
  
  //echo array_key_exists($data, $email);
  if (array_key_exists($email, $data)){
    if ($password == $data[$email]["password"]) {
      $userData = $data[$email];
      
    } else {
      
      echo "<script>alert('You must Login First!'); location.href = 'login.html'</script>";
    }
  } else {
    echo "<script>alert('You must Login First!'); location.href = 'login.html'</script>";
  }
  
  $fullName = $userData["first-name"]." ".$userData["last-name"];
  $email = $userData["email"];
  $gender = $userData["gender"];
  $birthdate = $userData["birthdate"];
  $profileImage = $userData["profile-image"];
  $coverImage = $userData["cover-image"];
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/profile.css" type="text/css" media="all" />
  <script src="js/profile.js" defer></script>
  <title>Profile</title>
</head>
<body>
  
  <header>
    <p id="head-name"><?php echo $fullName; ?></p>
    <hr>
  </header>
  
  <div id="body">
    
    <div class="images">
      
      <img src="img/blank-cover.jpg" alt="Cover Photo" id="cover-photo">
      <label>
        <img src="icons/edit-image.png" alt="Edit Image" id="edit-cover">
        <input type="file" name="Cover Photo Edit" id="edit-cover-photo" style="display: none;" accept="image/*"/>
      </label>
      
      <img src="img/blank-profile-male.jpg" alt="Profile Photo" id="profile-photo">
      <label>
        <img src="icons/edit-image.png" alt="Edit Image" id="edit-p-photo">
        <input type="file" name="Cover Photo Edit" id="edit-profile-photo" style="display: none;" accept="image/*"/>
      </label>
      
      <script>
        document.getElementById('profile-photo').src = "<?php echo $profileImage; ?>"; document.getElementById('cover-photo').src = "<?php echo $coverImage; ?>"
      </script>
      
    </div>
    
    <div id="profile-menu">
      <p id="user-name" class="user-name"><?php echo $fullName; ?></p>
    
      <button id="add-to-story"><span>+</span>Add to story</button>
      <button id="edit-profile"><img src="icons/edit-profile.png" alt="Edit profile">Edit profile</button>
      <button id="more">•••</button>
      
    </div>
    
    <div id="about">
      
      <div>
        <img src="icons/num-icon.png" alt="Num icon" id="num-icon" class="about-img"> <span id="email"  class="about-data"><?php echo $email; ?></span>
      </div>
      
      <div>
        <img src="icons/gender-icon.png" alt="Gender icon" id="gender-icon" class="about-img"> <span id="gender" class="about-data"><?php echo $gender; ?></span>
      </div>
      
      <div>
      <img src="icons/bd-icon.png" alt="Birthday icon" id="bd-icon" class="about-img"> <span id="birthday" class="about-data"><?php echo $birthdate; ?></span>
      </div>
      
      <div>
      <span id="sma">•••</span><span id="see-more-about">See more about yourself</span>
      </div>
      
    </div>
    
  </div>
  
</body>

<!-- A Temporary Logout Button and Script -->
<footer>
  <button type="button" onclick="logout()">Logout</button>
</footer>

</html>