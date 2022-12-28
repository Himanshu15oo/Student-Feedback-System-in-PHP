<?php
session_start();

include("connection.php");
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


if (isset($_POST['course_allocation_excel_data'])) 
{
	$filename = $_FILES['import_file']['name'];
	$file_ext= pathinfo($filename, PATHINFO_EXTENSION);

	$allowed_ext =[ 'xls', 'csv', 'xlsx'];
	
	if(in_array($file_ext, $allowed_ext))
	{
		
		$inputFileNamePath = $_FILES['import_file']['tmp_name'];
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
		$data = $spreadsheet->getActiveSheet()->toArray();

		$count='0';
		foreach($data as $row)
		{
			// if($count> 0)
			// {
				 // $faculty_email = $row[1] . "<br>";
			// 	// gettype($faculty_email) . "<br>";
			// 	// $new[] = array_push($faculty_email);
			// 	 echo $faculty_email = implode('<br>',array_unique(explode('<br>', $faculty_email)));
			// }
			if($count> 0)
			{

			 $course_id= $row[0] ;
			 $batch = $row[2] ;
			 $branch= $row[3] ;
			 $faculty_id=$row[4] ;
			 $semester =$row[6] ;
			 // $division =$row[5];
			 // $batch = $row[6];

			
			$studentQuery ="INSERT INTO course_allocation(  course_id, batch,branch, faculty_id, semester) 
            VALUES (  '$course_id','$batch' ,'$branch' ,'$faculty_id' ,'$semester' )";

            $result =mysqli_query(createConn(),$studentQuery);
            $msg =true;
            }
			else
			{
				$count='1';

			}
		}
		if(isset($msg))
		{
			$_SESSION['message']="Successfully Imported ";
			header('Location: course_allocation.php');
			exit(0);
		}
		else
		{
			$_SESSION['message']="NOT Imported ";
			header('Location: course_allocation.php');
			exit(0);
		}
	}
	else
	{
		$_SESSION['message']="Invalid File";
		header('Location: course_allocation.php');
		exit(0);
	}



}else{
	echo "not sellll";
}
?>