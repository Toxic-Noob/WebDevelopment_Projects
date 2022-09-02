<?php
  
  try{
    $_POST = json_decode(file_get_contents("php://input"), true);
    
    if (file_exists("tmp.json")){
      $tmpData = json_decode(file_get_contents("tmp.json"), true);
    }else{
      $tmpData = [];
    }
    
    if ($_POST["name"] == "submit"){
      
      if (!file_exists("../data/data.json")){
        file_put_contents("../data/data.json", json_encode([]));
      }
  
      $data = json_decode(file_get_contents("../data/data.json"), true);
      
      if ($tmp["gender"] == "female"){
         $tmpData["profile-image"] = "img/blank-profile-female.jpg";
      } else {
         $tmpData["profile-image"] = "img/blank-profile-male.jpg";
      }
      
      $tmpData["cover-image"] = "img/blank-cover.jpg";
      
      $email = $tmpData["email"];
      $password = $tmpData["password"];
      
      session_start();
      $_SESSION["email"] = $email;
      $_SESSION["password"] = $password;
      
      
      $data[$email] = $tmpData;
      
      file_put_contents("../data/data.json", json_encode($data));
      
      file_put_contents("tmp.json", json_encode([]));
      
      echo "200";
    }else{
      $tmpData[$_POST["name"]] = $_POST["value"];
      
      if (array_key_exists("name2", $_POST)){
        $tmpData[$_POST["name2"]] = $_POST["value2"];
      }
    
      file_put_contents("tmp.json", json_encode($tmpData));
      
      echo "200";
    }
      
    
  }catch (Exception $e){
    
    echo "Error: ".$e;
    
  }
  
  
  
?>