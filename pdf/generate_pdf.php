<?php
namespace Dompdf;
require_once 'pdf/dompdf/autoload.inc.php';

$fid = $_GET['fid'];
$cid = $_GET['cid'];

include("connection.php");

$query = "select name from course where id=".$cid;
$result = $connection->query($query);
$course = $result->fetch_assoc();

$query = "select name from faculty where id=".$fid;
$result = $connection->query($query);
$faculty = $result->fetch_assoc();

$query = "select batch, branch, semester from course_allocation where course_id=".$cid." and faculty_id=".$fid;
$result = $connection->query($query);
$result = $result->fetch_assoc();



$dompdf = new Dompdf(); 
$dompdf->loadHtml('
<! html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>
table {
  border-spacing: 1rem;
}
</style>

</head>
<body>
<center><h1>MIT Academy of Engineering</h1></center>
<center><h3>TLFQ Feedback Report - Confidential</h3></center>
<hr>
<br>
<table width=300>
<tr><td>Course Name </td><td>'.$course['name'].'</td></tr>
<tr><td>Faculty Name </td><td>'.$faculty['name'].'</td></td></tr>
<tr><td>Class and Division</td><td>Sem '.$result['semester'].' / '.$result['branch'].' / '.$result['batch'].'</td></tr>
</table>

<br>
<br>
<table width=520>
<tr><td>The instructor is well prepared and organized for the live sessions.</td><td>0.9</td></tr=>
<tr><td>The instructor illustrates the concepts through examples and applications or references like books, fundamental papers, blogs, etc.</td><td>0.8</td></td></tr>
<tr><td>How easy or difficult was it to understand the concepts in the online classroom?</td><td>0.9</td></tr>
<tr><td>Do instructors encOurage you for effective engagement or participation in online sessions or discussions forums?</td><td>0.9</td></tr>
<tr><td>How do you rate the quality of presentation materials (like PPT, animations, programs, videos, etc.) used in webinars or recorded lectures?</td><td>0.7</td></tr>
<tr><td>How Would you describe quizzes, assignments, or any other assessment tool in terms of question variety and covered topics?</td><td>0.9</td></tr>
<tr><td>Continuous and timely internal assessment and evaluation are done by the instructors?</td><td>0.8</td></tr>
<tr><td>Refers to the latest development and career opportunities in the subject.</td><td>0.7</td></tr>
<tr><td>Do you found the course is engaging in online mode?</td><td>0.7</td></tr>
<tr><td>Overal, how do you rate your experience in this course?</td><td>0.8</td></tr>
<br>
<tr><td align=right><b>Total Score:   </b></td><td><b>8.1</b></td></tr>
</table>

</body>
</html>
');
// <div><span><b>Total Score: </b></span><span>8.1</span></div>
$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
$dompdf->stream("",array("Attachment" => false));
exit(0);
// }
?>