<?php 
include("../connection.php");

// Delete faculty with id
  $faculty_id_del=$_GET['del_course_id'];
  $sql= "DELETE FROM course_allocation WHERE id='$faculty_id_del'";
  $result= mysqli_query($connection, $sql) or die("Query Unsuccessful!!");
   echo "<script>window.open('../course_allocation.php', '_self')</script>";

  ?>
