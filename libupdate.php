<?php 
session_start();
include('style/phpfile/config.php');
error_reporting(0);
if(strlen($_SESSION['libid'])==0&&strlen($_SESSION['admin'])==0)
    {   
header('location:front.php');
}
else{ 
if(isset($_POST['update']))
{  
    $sid;
    if($_SESSION['libid'])  
$sid=$_SESSION['libid'];
echo $sid;
if($_GET['upd'])  
$sid=$_GET['upd'];
$fname=$_POST['name'];
$mobileno=$_POST['mobile'];
$email=$_POST['email'];
$sql="update librarian set name=:fname,mobile=:mobileno,email=:email where id=:sid";
$query = $dbh->prepare($sql);
$query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();

echo '<script>alert("Your profile has been updated")</script>';
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
                            <form name="signup" method="post">
<?php 
    $sid;
    if($_SESSION['libid'])  
$sid=$_SESSION['libid'];

if($_GET['upd'])  
$sid=$_GET['upd'];

$sql="SELECT id,name,mobile,email,time from  librarian  where id=:sid ";
$query = $dbh -> prepare($sql);
$query-> bindParam(':sid', $sid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

<div class="form-group">
<label>ID : </label>
<?php echo htmlentities($result->id);?>
</div>

<div class="form-group">
<label>Reg Date : </label>
<?php echo htmlentities($result->time);?>
</div>

<div class="form-group">
<label>Enter Full Name</label>
<input class="form-control" type="text" name="name" value="<?php echo htmlentities($result->name);?>" autocomplete="off" required />
</div>


<div class="form-group">
<label>Mobile Number :</label>
<input class="form-control" type="text" name="mobile" maxlength="10" value="<?php echo htmlentities($result->mobile);?>" autocomplete="off" required />
</div>
                                        
<div class="form-group">
<label>Enter Email</label>
<input class="form-control" type="email" name="email" id="emailid" value="<?php echo htmlentities($result->email);?>"  autocomplete="off" required readonly />
</div>
<?php }} ?>
                              
<button type="submit" name="update" class="btn btn-primary" id="submit">Update Now </button>

                                    </form>
                            </div>
                        </div>
                            </div>
        </div>
    </div>
    </div>


<?php  include('./style/phpfile/footer.php')  ?>
</body>
</html>
<?php } ?>
