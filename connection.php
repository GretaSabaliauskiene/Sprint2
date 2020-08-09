<?php 
   $conn = mysqli_connect('localhost', 'root', 'mysql', 'projectsworkers');
   if ($conn) {
      echo "Connection succesfull!!";
   } else {
    die("Database connection failed");
   }
?>