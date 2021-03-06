<?php 
session_start();
include('style/phpfile/config.php');
error_reporting(0);
if( strlen($_SESSION['admin'])==0 && strlen($_SESSION['libid'])==0 )
    {   
header('location:front.php');
}
else{ 
    
    if(isset($_GET['del']))
    {
    $id=$_GET['del'];
    $sql = "delete from books  WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query -> bindParam(':id',$id, PDO::PARAM_STR);
    $query -> execute();
    $_SESSION['delmsg']="Author deleted";
    header('location:infostu.php');
    
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

if(isset($_GET['author']))
{
$id=$_GET['author'];
$ids= explode("%20",$id);


$name = $ids[0].' '.$ids[1];

$sql1 = "SELECT * from books where Author = '".$name."'";
}
else{
    $sql1 = "SELECT * from books";
}
$quer= $dbh->prepare($sql1);
$quer->execute();
$results=$quer->fetchAll(PDO::FETCH_OBJ);

$cnt=1;

if($quer->rowCount() > 0)
{
    $tmp = 1;
    ?>
<div class="container">
    <div class="row py-2 mb-3 px-2" style="text-align:center;color:white; background-color:purple;font-weight:bold">
       
<div class="col-md-2 heading" > Id</div>
<div class="col-md-3 heading">BookName</div>
<div class="col-md-3 heading">Publication</div>
<div class="col-md-2 heading">Price</div>
<div class="col-md-2 heading">delete/update</div>      
</div>


<?php
foreach($results as $result)
{               ?>  


        <div data-aos="zoom-out-left" class="row py-2 mb-3 px-2" style="text-align:center;color:white; background-color:lightpink;font-weight:bold">
            
            <div class="col-md-2 heading" ><?php echo htmlentities($result->id);?></div>
            <div class="col-md-3 heading"><?php echo htmlentities($result->BookName);?></div>
            <div class="col-md-3 heading"><?php echo htmlentities($result->Publication);?></div>
            <div class="col-md-2 heading"><?php echo htmlentities($result->BookPrice);?></div>
            <div class="col-md-2 heading"><a href="listissue.php?del=<?php echo htmlentities($result->StudentId);?> "> <button class="btn btn-danger" > X</button></a>  
            <a href="updatebooks.php?upd=<?php echo htmlentities($result->id);?>"> <atul class="px-1 ml-1" style="color : green ;font-weight:bold ; ">  <i class="fas fa-wrench"></i></a> </atul>    </div>   
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
