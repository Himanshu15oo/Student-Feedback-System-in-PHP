<?php include '../backend.php';
// include("connection.php");
 ?>

<!DOCTYPE HTML>
<html>
<head>
</head>
<?php 

 $count_all="SELECT * FROM faculty";
 $Count_all_result=mysqli_query(createConn(),$count_all) or die("Query Uncessfull");
 $Count_all_result_=mysqli_num_rows($Count_all_result);
 

 $count_1="SELECT * FROM course ";
 $Count_1_result=mysqli_query(createConn(),$count_1) or die("Query Uncessfull");
$Count_1_result_=mysqli_num_rows($Count_1_result);
// echo  $count_0;  

$count_2="SELECT * FROM course_allocation ";
 $Count_2_result=mysqli_query(createConn(),$count_2) or die("Query Uncessfull");
$Count_2_result_=mysqli_num_rows($Count_2_result);


// echo  $Count_all_result_ ."<br>" ;
// echo  $Count_1_result_;
		   	
		   			$data99= array
						(
							array("label"=> "Total Faculty", "y"=> $Count_all_result_),
							array("label"=> "Total Courses", "y"=> $Count_1_result_),
							array("label"=> "Total Course Allocations", "y"=> $Count_2_result_),
						 );
?>


<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Faculty, Courses And Allocations"
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}",
		dataPoints:  <?php echo json_encode($data99, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

}
</script>

<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>