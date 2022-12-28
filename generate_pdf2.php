<?php
namespace Dompdf;
require_once 'pdf/dompdf/autoload.inc.php';
// include 'backend.php';

include("connection.php");

$fid = $_GET['fid'];
$cid = $_GET['cid'];

$query = "select name from course where id=".$cid;
$result = $connection->query($query);
$course = $result->fetch_assoc();

$query = "select name from faculty where id=".$fid;
$result = $connection->query($query);
$faculty = $result->fetch_assoc();

$query = "select * from feedback where course_id=".$cid." and faculty_id=".$fid;
$result = $connection->query($query);
$feedback_data = $result->fetch_assoc();

$total = $feedback_data['responses']*5;

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
body{
    font-family: "Times New Roman", Times, serif;
    font-weight:500;
}

.heading{
    width:15rem;
    margin:auto;
}
.heading h2{
    width:15rem;
    margin: 0;
    font-size: 1.2rem;
    letter-spacing: 1px;
    border-bottom:2px solid black;
}

.analysis{
    margin:2rem 5rem 0rem 5rem;
}

.analysis pre{
    height:1rem;
}

.analysis strong{
    font-size:1.2rem;
}

.footer{
    margin-top: 6rem;
}

.column {
    float: left;
    width: 50%;
    padding: 10px;
}

</style>

</head>
<body>
<br>
<br>
<div class="heading">
<center><h2>FEEDBACK ANALYSIS</h2></center>
</div>
<div class="analysis">
<p><pre>Name of the faculty    :  '.$faculty['name'].'</pre></p>
<p><pre>Subject                        :  '.$course['name'].'</pre></p>
<p><pre>Academic Year          :  '.date('Y').'</pre></p>
<p><pre>Semester/Class          :  sem '.$result['semester'].' / '.$result['branch'].' / '.$result['batch'].'</pre></p>
<br>
<p><pre>Depth of Knowledge     :  '.($feedback_data['q1']/$total*100).'% </pre></p>
<p><pre>Way of Presentation    :  '.$feedback_data['q2'].'%</pre></p>
<p><pre>Lectures conducted with involvement   :  '.($feedback_data['q1']/$total*100).'%</pre></p>
<p><pre>Syllabus Covered       :  '.($feedback_data['q1']/$total*100).'%</pre></p>
<p><pre>Innovative teaching Technique         :  '.($feedback_data['q1']/$total*100).'%</pre></p>
<p><pre>Audible & Clean board writing         :  '.($feedback_data['q1']/$total*100).'%</pre></p>
<p><pre>Recommendation to teach the same subject for the next batches :</pre></p>
<br>
<br>
<p><pre>Number of students gave feedback      :  '.$feedback_data['responses'].'</pre></p>
<p><pre><strong>HOD Remark</strong>    :</pre></p>

<div class="footer">
<div class="row">
<div class="column">
<span class="span1">Faculty</span>
</div>
<div class="column">
<center><span class="span2">HOD<br>(Computer Engineering)</span></center>
  </div>
</div>
</div>

</div>
</body>
</html>
');



// <div><span><b>Total Score: </b></span><span>8.1</span></div>
$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
$dompdf->stream("",array("Attachment" => false));
$output = $dompdf->output();
file_put_contents("file.pdf", $output);

exit(0);
// }
?>