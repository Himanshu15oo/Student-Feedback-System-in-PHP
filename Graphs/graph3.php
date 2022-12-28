<?php include '../backend.php';
// include("connection.php");
 ?>

<!DOCTYPE HTML>
<html>
<head>  
</head>
<?php 

 $count_IT="SELECT * FROM students WHERE branch = 'IT' ";
 $Count_IT_result=mysqli_query(createConn(),$count_IT) or die("Query Uncessfull");
 $Count_IT_result_=mysqli_num_rows($Count_IT_result);
 
 $count_COMP="SELECT * FROM students WHERE branch = 'COMP'";
 $Count_COMP_result=mysqli_query(createConn(),$count_COMP) or die("Query Uncessfull");
 $Count_COMP_result_=mysqli_num_rows($Count_COMP_result);
 
 $count_ENTC="SELECT * FROM students WHERE branch = 'ENTC'";
 $Count_ENTC_result=mysqli_query(createConn(),$count_ENTC) or die("Query Uncessfull");
 $Count_ENTC_result_=mysqli_num_rows($Count_ENTC_result);
 
 $count_ETX="SELECT * FROM students WHERE branch = 'ETX' ";
 $Count_ETX_result=mysqli_query(createConn(),$count_ETX) or die("Query Uncessfull");
 $Count_ETX_result_=mysqli_num_rows($Count_ETX_result);
 
 $count_MECH="SELECT * FROM students WHERE branch = 'MECH' ";
 $Count_MECH_result=mysqli_query(createConn(),$count_MECH) or die("Query Uncessfull");
 $Count_MECH_result_=mysqli_num_rows($Count_MECH_result);
 
 $count_CIVIL="SELECT * FROM students WHERE branch = 'CIVIL'";
 $Count_CIVIL_result=mysqli_query(createConn(),$count_CIVIL) or die("Query Uncessfull");
 $Count_CIVIL_result_=mysqli_num_rows($Count_CIVIL_result);
 
 $count_CHEM="SELECT * FROM students WHERE branch = 'CHEM'";
 $Count_CHEM_result=mysqli_query(createConn(),$count_CHEM) or die("Query Uncessfull");
 $Count_CHEM_result_=mysqli_num_rows($Count_CHEM_result);

 $count_DESIGN="SELECT * FROM students WHERE branch = 'DESIGN'";
 $Count_DESIGN_result=mysqli_query(createConn(),$count_DESIGN) or die("Query Uncessfull");
 $Count_DESIGN_result_=mysqli_num_rows($Count_DESIGN_result);	
 
$data99= array
						(
							array("label"=> "IT", "y"=> $Count_IT_result_),
							array("label"=> "COMP", "y"=> $Count_COMP_result_),
							array("label"=> "ENTC", "y"=> $Count_ENTC_result_),
							array("label"=> "ETX", "y"=> $Count_ETX_result_),
							array("label"=> "MECH", "y"=> $Count_MECH_result_),
							array("label"=> "CIVIL", "y"=> $Count_CIVIL_result_),
							array("label"=> "CHEM", "y"=> $Count_CHEM_result_),
							array("label"=> "DESIGN", "y"=> $Count_DESIGN_result_),
						
						 );
?>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Departmental Responses"
	},
	data: [{        
		type: "line",
      	indexLabelFontSize: 16,
		dataPoints: <?php echo json_encode($data99, JSON_NUMERIC_CHECK); ?>
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