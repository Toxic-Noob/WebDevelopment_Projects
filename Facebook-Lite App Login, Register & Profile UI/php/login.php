<?php
  
  if (!file_exists("../data/data.json")){
    $return = [
      "status" => "error",
      "msg" => "User Not Exists"
    ];
    
    echo json_encode($return);
    exit;
  }
  
  
  $data = json_decode(file_get_contents("../data/data.json"), true);
  
  $_POST = json_decode(file_get_contents("php://input"), true);
  
  $email = $_POST["email"];
  $password = $_POST["password"];
  
  //echo array_key_exists($data, $email);
  if (array_key_exists($email, $data)){
    if ($password == $data[$email]["password"]) {
      $return = [
        "status" => "success",
        "msg" => "Login Successful"
      ];
      
      session_start();
      $_SESSION["email"] = $email;
      $_SESSION["password"] = $password;
      
      
    } else {
      $return = [
        "status" => "error",
        "msg" => "Password Wrong"
      ];
      
    }
  }
  // (Temporary) Logout System
  else if ($email == "logOut" && $password == "logOut"){
    session_start();
    
    session_destroy();
    
    $return = [
      "status" => "logout",
      "msg" => "Logout Successful"
    ];
      
  } else {
    $return = [
        "status" => "error",
        "msg" => "Incorrect Username"
      ];
  }

  echo json_encode($return);
  
?>
