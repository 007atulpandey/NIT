<?php 
session_start();
include('style/phpfile/config.php');
error_reporting(0);
if( strlen($_SESSION['admin'])==0 && strlen($_SESSION['libid'])==0 )
    {   
header('location:front.php');
}
else{ 


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
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 
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
<div class="container">
    <div class="row py-2 mb-3" style="text-align:center;color:white; background-color:purple;font-weight:bold">
       
<div class="col-md-2 heading" >Student</div>
<div class="col-md-3 heading">Studentid</div>
<div class="col-md-3 heading">Book Id</div>
<div class="col-md-2 heading">Issued Date</div>
       
</div>


<?php
foreach($results as $result)
{               ?>  


        <div data-aos="zoom-out-left" class="row py-2 mb-3" style="text-align:center;color:white; background-color:lightpink;font-weight:bold">
            
            <div class="col-md-2 heading" ><?php echo htmlentities($result->StudentId);?></div>
            <div class="col-md-3 heading"><?php echo htmlentities($result->FullName);?></div>
            <div class="col-md-3 heading"><?php echo htmlentities($result->EmailId);?></div>
            <div class="col-md-2 heading"><?php echo htmlentities($result->MobileNumber);?></div>
                    
        </div>
 <?php }?>

</div>

<?php } ?>

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
<script>
  AOS.init();
</script>
</body>
</html>
<?php } ?>
