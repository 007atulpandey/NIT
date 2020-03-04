
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
              <li class="nav-item mr-2">
                <a class="btn btn-outline-danger" href="signup.php">SignUp</a>
              </li>
             <?php  }?>
             
            </ul>
          </div>
        </nav>
