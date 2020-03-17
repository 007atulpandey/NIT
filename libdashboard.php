<?php
session_start();
error_reporting(0);
include('style/phpfile/config.php');
if(strlen($_SESSION['libid'])==0)
  { 
header('location:front.php');
}
else {
    echo "this is a dash board ";
    echo $_SESSION["libid"];
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">''
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
<link href="style/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  
   <!-- <link rel="stylesheet" href="css/custom-style.css"> -->
<link href="style/css/style.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
    <?php include('style/phpfile/header.php');   ?>



<!-- animation  -->
<div class="container mt-5 mt-5">
    

<div class="row row-cols-1 row-cols-md-2">
  <div class="col mb-4">
  <a href="infostu.php" style = "text-decoration:none ; color :grey">
    <div class="card py-3" data-aos="zoom-in-left">
        <center>
        <h1 style="font-size:90px;">  <i class="fas fa-user-graduate"></i> </h1>
             
        
        <div class="card-body" >
        <h5 class="card-title">Student Registered</h5>
        <p class="card-text">
         <?php 
               $sq = "select * from tblstudents";
               $q = $dbh->prepare($sq);
               $q->execute();
               $no = $q->rowCount();


         ?>
          Total Students  : <?php echo $no;  ?>
        </p>
        
      </div>
      </center>
    </div>
</a>
  </div>
  <div class="col mb-4">
  <a href="listissue.php" style = "text-decoration:none ; color :grey">
    <div class="card py-3" data-aos="zoom-in-left">
        <center> 
            <h1 style="font-size:90px;">                        <i class="fas fa-book"></i>                     </h1>

        <div class="card-body">
        <h5 class="card-title">Books Issued</h5>
        <p class="card-text">
        <?php 
               $sq = "select * from issuedbooks";
               $q = $dbh->prepare($sq);
               $q->execute();
               $noissue = $q->rowCount();


         ?>
          Total Issued  : <?php echo $noissue;  ?>    

        </p>
      </div>
      </center>      
    </div>
</a>
  </div>
  <div class="col mb-4">
      <a href="author.php" style = "text-decoration:none ; color :grey">
    <div class="card py-3" data-aos="zoom-in-left">
        <center>
        <h1 style="font-size:90px;">                         <i class="fas fa-user-check"></i>                      </h1>

            <div class="card-body">
        <h5 class="card-title">Authors</h5>
        <p class="card-text">
        <?php 
               $sq = "select Distinct author from books";
               $q = $dbh->prepare($sq);
               $q->execute();
               $no = $q->rowCount();


         ?>
          Authors  : <?php echo $no;  ?>    

        </p>
      </div>
      </center>
    </div>
    </a>
  </div>
  <div class="col mb-4">
  <a href="totalbooks.php" style = "text-decoration:none ; color :grey">
    <div class="card py-3" data-aos="zoom-in-left">
        <center>
        <h1 style="font-size:90px;">                         <i class="fas fa-id-card"></i>                     </h1>
       
              <div class="card-body">
        <h5 class="card-title">Books Detail</h5>
        <p class="card-text">
        <?php 
               $sq = "select sum(totalavailable) author from books";
               $sl = "select * from books";
               $ql = $dbh->prepare($sl);
               $ql->execute();
               $q = $dbh->prepare($sq);
               $q->execute();
               $result = $q->fetch();
               

         ?>
           available  : <?php echo $result[0]-$noissue;  ?> 
           <br>
           types count : <?php echo $ql->rowCount() ; ?>
        </p>
      </div>
      </center>
    </div>
</a>
  </div>
</div>

</div>

<!-- animation  -->
<?php include('style/phpfile/footer.php')?>
<script>
  AOS.init();
</script>
</body>
</html>