<?php
session_start();
error_reporting(0);
include('style/phpfile/config.php');
if($_SESSION['login']!=''){
$_SESSION['login']='';
}
if(isset($_POST['login']))
{
  //code for captach verification
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
        else {
$email=$_POST['emailid'];
$password=($_POST['password']);
$sql ="SELECT id,name,mobile,time FROM librarian WHERE email=:email and password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
 foreach ($results as $result) {
 $_SESSION['libid']=$result->id;
 echo "<script type='text/javascript'> document.location ='libdashboard.php'; </script>";
}

} 

else{
echo "<script>alert('Invalid Details');</script>";
}
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
</head>
<body>

<body>
    <!-- MENU SECTION START-->

<div style="min-height:170px; background-color:grey" class = "px-4 py-4" >
<center>
<img src="http://172.16.1.10/img/logo1.png" alt="logo" height="140px" width="140px">

<p style = "font-family : satisfy;font-size:2rem; color:black;"> When in doubt, go to the library. </p>
</center>

</div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">  <a class="navbar-brand" href="front.php">LIBRARY</a>
          <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
          <div class="collapse  navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ">
              <li class="nav-item active">
                <a class="nav-link" href="front.php">Home <span class="sr-only">(current)</span></a>
              </li>
           
              <?php if($_SESSION['login']) {?>
              <li class="nav-item mr-2">
                  <div class="btn-group">
                      <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       FEATURES
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="student.php" class="dropdown-item" type="button">Update Profile </a>
                        <a href="publications.php" class="dropdown-item" type="button">Publicatoins </a>
                        <a href="author.php" class="dropdown-item" type="button">Author </a>
                      </div>
                    </div>
              </li>

                          

              <a class="mr-2" href="dashboard.php" style="text-decoration:none ; display: inline-flex">
                <div style="border: radius 10px;">
                  <img class="mr-2" height="24px" width="24px" src="https://cdn1.iconfinder.com/data/icons/navigation-elements/512/user-login-man-human-body-mobile-person-512.png" alt="user">
                </div>
                <span style="font-size:18px"></span>
               
              
              </a>
             
              <li class="nav-item">
                <a class="btn btn-outline-success" href="logout.php" tabindex="-1" aria-disabled="true">Logout</a>
              </li>
<?php }?>

              <?php if($_SESSION['admin']) {?>
                <li class="nav-item active">
                <a class="nav-link" href="addbook.php">Add New Book </a>
              </li> 
              <li class="nav-item active">
                <a class="nav-link" href="regstu.php">Reg. Students </a>
              </li> 
              <li class="nav-item active">
                <a class="nav-link" href="issue.php">Issue books </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="libsignup.php">Reg  Librarian </a>
              </li>


              <li class="nav-item mr-2">
                  <div class="btn-group">
                      <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       FEATURES
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="adminpro.php" class="dropdown-item" type="button">Update Profile</a>
                        <a href="publications.php" class="dropdown-item" type="button">Publications </a>
                        <a href="author.php" class="dropdown-item" type="button">Author </a>
                        
                      </div>
                    </div>
              </li>

                          

              <a class="mr-2" href="admindashboard.php" style="text-decoration:none ; display: inline-flex">
                <div style="border: radius 10px;">
                  <img class="mr-2" height="24px" width="24px" src="https://cdn1.iconfinder.com/data/icons/navigation-elements/512/user-login-man-human-body-mobile-person-512.png" alt="user">
                </div>
                <span style="font-size:18px"></span>
               
              
              </a>
             
              <li class="nav-item">
                <a class="btn btn-outline-success" href="logout.php" tabindex="-1" aria-disabled="true">Logout</a>
              </li>
<?php }?>






             <?php if(!($_SESSION['login'] || $_SESSION['admin']) ) {?>
              <li class="nav-item mr-2">
                <a class="btn btn-outline-danger" href="login.php">LogIn</a>
              </li>
              <li class="nav-item mr-2">
                <a class="btn btn-outline-danger" href="adminlogin.php">adminLogin</a>
              </li>
           
          
             <?php  }?>
             

             
            </ul>
          </div>
        </nav>


<!--   nav
-->
<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line">USER LOGIN FORM</h4>
</div>
</div>
             
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 LOGIN FORM
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Enter Email id</label>
<input class="form-control" type="text" name="emailid" required autocomplete="off" />
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password" required autocomplete="off"  />
<p class="help-block"><a href="user-forgot-password.php">Forgot Password</a></p>
</div>

 <div class="form-group">
<label>Verification code : </label>
<input type="text" class="form-control1"  name="vercode" maxlength="6" autocomplete="off" required  style="height:25px;" />&nbsp;  <span style="background-color:lightblue " ><strong> <?php $_SESSION["vercode"]= (string) rand(100000,999999) ; echo $_SESSION["vercode"];  ?>  </strong></span>
</div> 

 <button type="submit" name="login" class="btn btn-info">LOGIN </button> | <a href="signup.php">Not Register Yet</a>
</form>
 </div>
</div>
</div>
</div>  
<!---LOGIN PABNEL END-->            
             
 
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('style/phpfile/footer.php');?>    

</body>
</html>