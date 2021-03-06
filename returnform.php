<?php 
session_start();
include('style/phpfile/config.php');
error_reporting(0);
$fine =0;
$bookid="";
$stuid="";
if(isset($_POST['issue']))
{
  
$stuid=$_POST['stuid'];

$bookid=$_POST['bookid']; 


$sql="delete from  issuedbooks where studId=:studid and BookId =:bookid";

$query = $dbh->prepare($sql);
$query->bindParam(':studid',$stuid,PDO::PARAM_STR);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);

$query->execute();

if($query->rowCount()){
   $sql = "select fine from books where id =:id";
   $query = $dbh->prepare($sql);
   $query=bindParam(':id',$bookid,PDO::PARAM_STR);
   $query->execute();
   $resu = $query->fetch();
   echo "take fine ".$resu[0];
   $total = $resu[0]+$fine;
   $sq= "UPDATE `books` SET `fine` = :total WHERE `books`.`id` = :id";
   $quer = $dbh->prepare($sq);
   $quer=bindParam(':id',$bookid,PDO::PARAM_STR);
   $quer->execute();

echo '<script>alert("Book Returned Successfully ");</script>'; 
   
 }
 else {
     # code...
     echo '<script>alert("not available ")</script>';
 }
}

//  check payment...


 if(isset($_POST['check']))
{
  
$stuid=$_POST['stuid'];

$bookid=$_POST['bookid']; 


$sql="select ReturnDate from  issuedbooks where studId=:studid and BookId =:bookid";

$query = $dbh->prepare($sql);
$query->bindParam(':studid',$stuid,PDO::PARAM_STR);
$query->bindParam(':bookid',$bookid,PDO::PARAM_STR);
$date = date("Y-m-d h:i:s");
echo $date ; 
$query->execute();
$result = $query->fetch();
echo $result[0];
$d1 = strtotime($result[0]);
$d2 = strtotime($date);
$fin =((abs)($d2-$d1))/86400;
$fine = floor($fin);
echo ($d2-$d1)/86400;
if($query->rowCount()){
    echo $result[0];
// echo '<script>alert("Book Returned Successfully ");</script>'; 
   
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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
 
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
                <h4 class="header-line">Book Return</h4>

             
                
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
<input class="form-control" type="text" value ="<?php echo $stuid; ?>"  name="stuid" autocomplete="off" required />
</div>


                                        
<div class="form-group">
<label>book id </label>
<input class="form-control" type="bookid" value ="<?php echo $bookid; ?>"  name="bookid" id="bookid"   autocomplete="off" required  />
   <span id="user-availability-status" style="font-size:12px;"></span> 
</div>
<div class="form-group">
<label>Fine </label>
<input class="form-control" value ="₹<?php echo $fine; ?>"   autocomplete="off" required readonly />

</div>
<button type="submit" name="check" class="btn btn-success mt-2" id="submit">check </button>                 
<button type="submit" name="issue" class="btn btn-danger mt-2" id="submit">return </button>

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