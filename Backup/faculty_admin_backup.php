<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="css/style1.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 
<body>
<script type="text/javascript">
	
	$(document).ready(function() {

   
   // inspired by http://jsfiddle.net/arunpjohny/564Lxosz/1/
   $('.table-responsive-stack').each(function (i) {
      var id = $(this).attr('id');
      //alert(id);
      $(this).find("th").each(function(i) {
         $('#'+id + ' td:nth-child(' + (i + 1) + ')').prepend('<span class="table-responsive-stack-thead">'+             $(this).text() + ':</span> ');
         $('.table-responsive-stack-thead').hide();
         
      });
      

      
   });

   
   
   
   
$( '.table-responsive-stack' ).each(function() {
  var thCount = $(this).find("th").length; 
   var rowGrow = 100 / thCount + '%';
   //console.log(rowGrow);
   $(this).find("th, td").css('flex-basis', rowGrow);   
});
   
   
   
   
function flexTable(){
   if ($(window).width() < 768) {
      
   $(".table-responsive-stack").each(function (i) {
      $(this).find(".table-responsive-stack-thead").show();
      $(this).find('thead').hide();
   });
      
    
   // window is less than 768px   
   } else {
      
      
   $(".table-responsive-stack").each(function (i) {
      $(this).find(".table-responsive-stack-thead").hide();
      $(this).find('thead').show();
   });
      
      

   }
// flextable   
}      
 
flexTable();
   
window.onresize = function(event) {
    flexTable();
};
   
   
   
   

  
// document ready  
});

</script>

<div class="container">
<br><br>
   
<nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: white;">Home</a>
        </div>
    </nav> <br>

              <div class="col-md-9 grid-margin stretch-card" style="margin-left: 10%; ">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Faculty</h4>
      
                    <form class="forms-sample" method="post" action="database_controller.php">
                      
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Faculty </label>
                        <div class="col-sm-9">
                          <input type="text" name="faculty_name" class="form-control" id="exampleInputUsername2" placeholder="Username">
                        </div>
                      </div>
                  
                      <div class="form-group form-control-md row">
                        <label for="" class="col-sm-3 col-form-label">Courses</label>
                        <div class="col-sm-9 " >
                            <select class="js-example-basic-single form-control" >
                              <option value="">DBMS</option>
                              <option value="">ADS</option>
                              <option value="">M3</option>
                            </select>
                        </div>
                      </div>

                      <div class="form-group form-control-md row">
                        <label for="" class="col-sm-3 col-form-label">Department</label>
                        <div class="col-sm-9 " >
                            <select class="js-example-basic-single form-control" >
                              <option value="">IT</option>
                              <option value="">CM</option>
                              <option value="">EnTC</option>
                            </select>
                        </div>
                      </div>
                    


                      <button type="submit" name="submit_add_faculty" value="submit_add_faculty" class="btn btn-primary mr-2" >Submit</button>
                      
                    </form>
                  </div>
                </div>
              </div>
<br><Br>

   <table class="table table-bordered table-striped table-responsive-stack" id="tableOne">
      <thead class="thead-dark">
       <tr>
        <th scope="col">Staff Id</th>
        <th scope="col">Staff Name</th>
        <th scope="col">Course</th>
        <th scope="col">Department</th>
        <th scope="col">Action</th>
      </tr>
      </thead>
      <tbody>
         <tr>
        <th scope="row">1</th>
        <td>Siddhi</td>
        <td>DBMS</td>
        <td>Information Technology</td>
        <td><button type="button" class="btn btn-primary btn-sm">Edit</button>
            <button type="button" class="btn btn-secondary btn-sm">Delete</button>
        </td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Siddhi</td>
        <td>DBMS</td>
        <td>Information Technology</td>
        <td><button type="button" class="btn btn-primary btn-sm">Edit</button>
            <button type="button" class="btn btn-secondary btn-sm">Delete</button>
        </td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Siddhi</td>
        <td>DBMS</td>
        <td>Information Technology</td>
        <td><button type="button" class="btn btn-primary btn-sm">Edit</button>
            <button type="button" class="btn btn-secondary btn-sm">Delete</button>
        </td>
      </tr>
      </tbody>
    </div>
   

  
</body>
</html>