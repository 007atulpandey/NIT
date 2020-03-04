<?php 
session_start();
include('style/phpfile/config.php');
error_reporting(0);

if(isset($_POST['issue']))
{
  
$stuid=$_POST['stuid'];

$bookid=$_POST['bookid']; 

$sql="INSERT INTO  issuedbooks(studid,bookid) VALUES(:studid,:bookid)";

$query = $dbh->prepare($sql);
$query->bindParam(':studid',$stuid,PDO::PARAM_STR);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);

 $sqb = "select Totalavailable from books where id = ".$bookid;
 $q=$dbh->prepare($sqb);
 $results=$q->fetchAll(PDO::FETCH_OBJ);
 $q->execute();
 if($q->rowCount()>0){
    
    foreach($results as $result)
{ 
    echo '<script>alert("book issued ")'.$result->Totalavailable.'</script>'; 
}

    $query->execute();
    
 }
 else {
     # code...
     echo '<script>alert("not available ")</script>';
 }





}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
<link href="style/css/font-awesome.css" rel="stylesheet" />
<link href="style/css/style.css" rel="stylesheet" />
<title>Document</title>

<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>    


</head>
<body>

<body>
    <!-- MENU SECTION START-->
<?php include('style/phpfile/header.php');?>

<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Book Issue</h4>
                
                            </div>

        </div>
             <div class="row">
           
<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <!-- <div class="panel-heading">
                           SINGUP FORM
                        </div> -->
                        <div class="panel-body">
                            <form name="issue" method="post" >
<div class="form-group">
<label>Student Id</label>
<input class="form-control" type="text" name="stuid" autocomplete="off" required />
</div>


                                        
<div class="form-group">
<label>book id </label>
<input class="form-control" type="bookid" name="bookid" id="bookid"   autocomplete="off" required  />
   <span id="user-availability-status" style="font-size:12px;"></span> 
</div>
                            
<button type="submit" name="issue" class="btn btn-danger" id="submit">confirm </button>

                                    </form>
                            </div>
                        </div>
                            </div>
        </div>
    </div>
    </div>
 <?php include('style/phpfile/footer.php');?>    

</body>
</html>