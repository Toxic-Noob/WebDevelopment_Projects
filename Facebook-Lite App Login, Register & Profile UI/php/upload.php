<?php
  
  $data = json_decode(file_get_contents("../data/data.json"), true);
  
  session_start();
  $email = $_SESSION["email"];
  $photoOf = $_POST["photoOf"];
  
  try {
    
    if (isset($_FILES["file"]["name"])){
       // file name
       $filename = $_FILES["file"]["name"];
       
       if ($photoOf == "cover") {
         $location = "../img/".$email."-cover-photo.jpg";
       }else if ($photoOf == "profile") {
         $location = "../img/".$email."-profile-photo.jpg";
       }
    
        if(move_uploaded_file($_FILES["file"]["tmp_name"],$location)){
          
          $data[$email][$photoOf."-image"] = $location;
          
          file_put_contents("../data/data.json", json_encode($data));
          
           $response = [
             "status" => "success"
           ];
        } else {
          $response = [
             "status" => "failed"
          ];
        }
    
    } else {
      $response = [
        "status" => "failed",
        "msg" => "no file found"
      ];
    }
  } catch (Exception $e) {
    $response = [
      "status" => "error",
      "msg" => $e
    ];
  }
  
  echo json_encode($response);
  exit;

?>