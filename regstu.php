<?php 
session_start();
include('style/phpfile/config.php');
error_reporting(0);
if(strlen($_SESSION['libid'])==0 && strlen($_SESSION['admin'])==0)
    {   
header('location:front.php');
}
else{ 

    
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from tblstudents  WHERE StudentId=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$_SESSION['delmsg']="Author deleted";
header('location:regstu.php');

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
</head>
<body>

   <!---  nav bar and header  -->
<?php include('style/phpfile/header.php');?>

    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">My Profile</h4>
                
                            </div>

        </div>
             <div class="row">
           
<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <!-- <div class="panel-heading">
                           My Profile
                        </div> -->
                        <div class="panel-body">
                          
<?php 
$sql1 = "SELECT * from tblstudents";
$quer= $dbh->prepare($sql1);
$quer->execute();
$results=$quer->fetchAll(PDO::FETCH_OBJ);

$cnt=1;

if($quer->rowCount() > 0)
{
    $tmp = 1;
    ?>
    
<table class="table table-dark">
<thead>
  <tr>
    <th scope="col">id</th>
    <th scope="col">Student Name</th>
    <th scope="col">Email</th>
    <th scope="col">Mobile</th>
  </tr>
</thead>
<tbody>
<?php
foreach($results as $result)
{               ?>  




    <tr >
      <th scope="row" ><?php echo htmlentities($result->StudentId);?></th>
      <td><?php echo htmlentities($result->FullName);?></td>
      <td><?php echo htmlentities($result->EmailId);?></td>
      <td><?php echo htmlentities($result->MobileNumber);?></td>
      <td> <a href="regstu.php?del=<?php echo htmlentities($result->StudentId);?> "> <button class="btn btn-primary" > X</button></a> </td>
    </tr>



   
<?php }} ?>

<table class="table table-dark">
  <thead>
    <tr>
    <th scope="col">Total Students</th>
      <th scope="col"> <?php echo $quer->rowCount();   ?></th>
</thead>
</table>
                              

                            </div>
                        </div>
                            </div>
        </div>
    </div>
    </div>


<?php  include('./style/phpfile/footer.php')  ?>

<script >  
function delete(cls){
    $('.'+cls).css("display","none");
}
</script>
</body>
</html>
<?php } ?>
