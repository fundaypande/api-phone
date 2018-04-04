<?php

  include_once('connect.php');

  if($_SERVER['REQUEST_METHOD'] == "POST"){
   // Get data
   if(isset($_POST['merek'])){
     $merek = $_POST['merek'];
     $nama = $_POST['nama'];
     $harga = $_POST['harga'];
   }

   // Insert data into data base
   $sql = "INSERT INTO handphone(id, nama, merek, harga) VALUES (NULL, '".$nama."', '".$merek."', '".$harga."')";
   $qur = mysqli_query($conn, $sql);
   if($qur){
     $json = array("status" => 1, "msg" => "Done Data Aded!");
   }else{
     $json = array("status" => 0, "msg" => "Error adding data!", "merek" => $merek, "nama" => $nama, "harga" => $harga, "sql" => $sql);
   }
   }else{
    $json = array("status" => 0, "msg" => "Request method not accepted");
  }

  mysqli_close($conn);

  /* Output header */
   header('Content-type: application/json');
   echo json_encode($json);

 ?>
