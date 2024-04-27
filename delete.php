<?php
    include "db_conn.php";


    $owner_id = $_GET['owner_id'];
   
    $sql = "DELETE FROM `form` WHERE owner_id = $owner_id";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
      header("Location: index.php?msg=Data deleted successfully");
    } else {
      echo "Failed: " . mysqli_error($conn);
      header("Location: records.php?msg=Data deleted faild");

    }



