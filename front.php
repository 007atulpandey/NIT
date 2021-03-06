<?php
session_start();
error_reporting(0);
include('style/phpfile/config.php');
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
 
<title>Document</title>
</head>
<body>
 
 <!--
 navbarr  
-->


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

              <?php if($_SESSION['libid']) {?>
              <li class="nav-item mr-2">
                  <div class="btn-group">
                      <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       FEATURES
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="libupdate.php" class="dropdown-item" type="button">Update Profile </a>
                        <a href="publications.php" class="dropdown-item" type="button">Publicatoins </a>
                        <a href="author.php" class="dropdown-item" type="button">Author </a>
                      </div>
                    </div>
              </li>

                          

              <a class="mr-2" href="libdashboard.php" style="text-decoration:none ; display: inline-flex">
                <div style="border: radius 10px;">
                  <img class="mr-2" height="24px" width="24px" src="https://cdn1.iconfinder.com/data/icons/navigation-elements/512/user-login-man-human-body-mobile-person-512.png" alt="user">
                </div>
                <span style="font-size:18px"></span>
               
              
              </a>
             
<?php }?>
<?php if($_SESSION['admin']) {?>
              <li class="nav-item mr-2">
                  <div class="btn-group">
                      <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       FEATURES
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="adminpro.php" class="dropdown-item" type="button">Update Profile </a>
                        <a href="publications.php" class="dropdown-item" type="button">Publicatoins </a>
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
             
              
<?php }?>
    
      <!--   all set  -->


              <?php if($_SESSION['libid']) {?>
                <li class="nav-item active">
                <a class="nav-link" href="addbook.php">Add New Book </a>
              </li> 
              <li class="nav-item active">
                <a class="nav-link" href="signup.php">Reg. Students </a>
              </li> 
              <li class="nav-item active">
                <a class="nav-link" href="issue.php">Issue books </a>
              </li>
              <?php if($_SESSION['admin']) {?>
              <li class="nav-item active">
                <a class="nav-link" href="libsignup.php">Reg  Librarian </a>
              </li>
              
              <?php } ?>


                          

             
              <li class="nav-item">
                <a class="btn btn-outline-success" href="logout.php" tabindex="-1" aria-disabled="true">Logout</a>
              </li>
<?php }?>






             <?php if(!($_SESSION['login'] || $_SESSION['admin']|| $_SESSION['libid'])) {?>
              <li class="nav-item mr-2">
                <a class="btn btn-outline-danger" href="login.php">LogIn</a>
              </li>
              <li class="nav-item mr-2">
                <a class="btn btn-outline-danger" href="adminlogin.php">adminLogin</a>
              </li>
              <li class="nav-item mr-2">
                <a class="btn btn-outline-danger" href="liblogin.php">Librarian SignIn</a>
              </li>
              <li class="nav-item mr-2">
                <a class="btn btn-outline-danger" href="signup.php">SIGNUP</a>
              </li>
             <?php  }?>
           

             
            </ul>
          </div>
        </nav>


<!--  navbarr -->



<div class="container mt-5 mb-4">
    
 <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://cdn.quotes.pub/660x400/i-have-always-imagined-that-paradise-will-be-20965.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://lh3.googleusercontent.com/proxy/tPcQ72nR6G_pHqROXKekeS2iuzojlztE12VY9cyXyXhJLVNLIs89JhS01UBHBPX7NS9W5PRAGiSG98w4V7b1_MMJI5hVSdGc1wppbdGTGS6K8p2AYk5b7XfBRWLaZzBTxYsRvYavwQG68sf3s07igJdFfK0" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://s26162.pcdn.co/wp-content/uploads/2019/07/used-books-store-2.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>
 
  <!-- carouselExampleCaptions -->

<?php  include('./style/phpfile/footer.php')  ?>
</body>
</html>