<?php
session_start();
if(!isset($_SESSION['admin'])){
	echo "<script>window.open('login.php', '_self')</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
 <link rel="icon" href="gp.jpg" type="image/gif" sizes="16x16">
	<title>MITAOE</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>


<style>
*{

	padding: 0;
	margin: 0;
	text-decoration: none;
	list-style: none;
	box-sizing: border-box;
	overflow: hidden;



}


.data{
	
	height: 100vh;
	width: 86%;
	padding-top: 60px;
	margin-left: 195px;
	/*background-color: red;*/
	background-size:cover;
	background-repeat: no-repeat;
	overflow-y:scroll;
}

nav{
	background: #333;
	line-height: 60px;
	position: fixed;
	width: 100%;
}

label{
	line-height: 60px;
	font-size: 30px;
	color: white;
	font-weight: 200;
	margin-left: 50px;
	cursor: pointer; 
}

nav ul{
	float: right;
	margin-right: 20px;
}

nav ul li{
	line-height: 60px;
	margin: 0 10px;
}

nav ul li a{
	color: white;
	font-size: 20px;
	padding: 6px 15px;
	font-weight: 600;
	background-color: rgb(55,34,246);
	border-radius: 3px;
}

nav ul li a:hover{
	background-color:(49,27,214);
	color: white;
	transition: 0.5s;
}


::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,2);
    border-radius: 10px;
    background-color: #333;
}

::-webkit-scrollbar {
    width: 10px;
    background-color: #333;
}

::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,2);
    background-color: white;
}



.side-menu{
	position: fixed;
	background: #333;
	width: 195px;
	height: 100%;
	margin-top: 60px;
	overflow-y: scroll;
}

.side-menu center img{
	height: 120px;
	width: 120px;
	border-radius: 50%;
	margin-top: 10px;
	border:3px solid white;
}


.side-menu center h3{
	color: white;
}

.side-menu a{
	 display: block;
	 line-height: 55px;
	 transition: 0.5s;
}

.side-menu a:hover{
	background: #0a0f0f;
	padding-left: 20px;
}

.side-menu span{
	font-size: 20px;
	margin-left: 10px;
	color: white;
}

.side-menu i{
	font-size: 20px;
	margin-left: 20px;
	color: white;
}

nav .menu-bar{
	float: right;
	margin-top: 20px;
	display: none;
	margin-right: 20px;
}

#menu{
	display: none;
}

.side-menu .logout{
	display: none;
}


@media (max-width:850px){
	
	.side-menu a span{
		display: none;
	}

	.side-menu center{
		display: none;
	}

	.side-menu{
		width: 100px;
		overflow-y: scroll;
	}

	.side-menu a i{
		display: block;
		line-height: 80px;
		text-align: center;
		margin-left: 0;
		font-size: 35px;
	}
	.data{
		margin-left:100px;
	}
}


@media (max-width: 650px){

	.data{
		margin: 0;
		width: 100%;
		overflow-y: scroll;
	}

	nav ul{
		display: none;
	}

	.side-menu{
		width: 60%;
		text-align: left;
		left: 100%;
		background: #333;
		transition: all 0.5s;
		margin-top: 100px;
		overflow-y: scroll;
	}

	.side-menu a i{
		display: none;
	}

	.side-menu a span{
		display: block;
	}

	.side-menu .Logout{
		display: block;
	}

	nav .menu-bar{
		display: block;
		margin-left: 0px;
	}
}



#menu:checked ~ .side-menu{
	left: 0;
}











</style>


<body>




<input type="checkbox" id="menu">

<nav>
	  
	 
	 <ul>
	 	<label>MIT Academy Of Engineering, Alandi, Pune</label> 
	 	<!-- <div style="display: inline-block ; color: white; font-size: 20px;height: 40px; "><li>{{Session::get('admin_email')}}</li></div> -->
	 	<!-- <div  style="display: inline-block;height: 40px;"><li><a href="/ad_logout">Logout</a></li></div> -->
	 </ul>

	 <label for="menu" class="menu-bar">
	 	<i class="fa fa-bars"></i>
	 </label>

</nav>

<div class="side-menu">
	
	<center>
		<img src="img/campus2.png">
		<br><br>
		<h3>MITAOE</h3>
	</center>
	<br>

	<a href="dashboard.php" target="frame">
		<i class="fa fa-desktop"></i><span>Dashboard</span>
	</a>
	<a href="course_admin.php" target="frame">
		<i class="fa fa-building"></i><span>Courses</span>
	</a>
	
	<a href="course_allocation.php" target="frame">
		<i class="fa fa-list"></i><span>Allocation</span>
	</a>
	
	<a href="faculty_admin.php" target="frame">
		<i class="fa fa-university"></i><span>Faculty</span>
	</a>
	<a href="students.php" target="frame">
		<i class="fa fa-user"></i><span>Students </span>
	</a>
	<a href="Analysis.php" target="frame">
		<i class="fa fa-question-circle"></i><span>Analysis</span>
	</a>
	
	


<a href="login.php" class="Logout"><span>Logout</span></a>
</div>

<div style="" >
	
	<iframe src="dashboard.php" name="frame" class="data" scrolling="none" style="">
	</iframe>
</div>

</body>
</html>