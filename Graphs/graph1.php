<?php include '../backend.php';
// include("connection.php");
 ?>


<!DOCTYPE HTML>
<html>
<head>
</head>
<?php 

 $count_all="SELECT * FROM students";
 $Count_all_result=mysqli_query(createConn(),$count_all) or die("Query Uncessfull");
 $Count_all_result_=mysqli_num_rows($Count_all_result);
 

 $count_1="SELECT * FROM students WHERE response= 1";
 $Count_1_result=mysqli_query(createConn(),$count_1) or die("Query Uncessfull");
$Count_1_result_=mysqli_num_rows($Count_1_result);
// echo  $count_0;   

$count_0 = $Count_all_result_  - $Count_1_result_;

// echo  $Count_all_result_ ."<br>" ;
// echo  $Count_1_result_;
		   	
		   			$data99= array
						(
							array("label"=> "Total Students", "y"=> $Count_all_result_),
							array("label"=> "Responsed", "y"=> $Count_1_result_),
							array("label"=> "Remaining", "y"=> $count_0),
						 );
?>


<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Number of responded students."
	},
	axisY: {
		title: "Feedback Analysis",
		includeZero: true,
		prefix: "",
		suffix:  ""
	},
	data: [{
		type: "bar",
		yValueFormatString: "#,##00",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($data99, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>



<!-- </head> -->
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>