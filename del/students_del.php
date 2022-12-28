<?php 
include("../connection.php");

// Delete faculty with id
  $student_id_del=$_GET['del_student_id'];
  $sql= "DELETE FROM students WHERE student_id='$student_id_del'";
  $result= mysqli_query($connection, $sql) or die("Query Unsuccessful!!");
   echo "<script>window.open('../students.php', '_self')</script>";

  ?>
