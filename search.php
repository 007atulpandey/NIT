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
        </nav>
    <div class=" mt-5 mb-5" style = "min-height:90px;background-color: #e3afd2 ">
   
   <div class="nav-item col-12 px-5 py-5 ">
   <span>
   <h3 class="text-muted"> Search Here </h3>
   </span>
   
                   <form class="form-inline my-2 my-lg-2 container-fluid ">
                       <input class="form-control form-control-lg mr-0 col-10" type="search" placeholder="Search for courses" aria-label="Search" onkeyup = "showHint(this.value)">
                      <a href=""></a> <button class="btn btn-light btn-lg my-2 my-sm-0 ml-0 col-2" type="submit"><i class="fas fa-search"></i></button>
                     </form>
 
               </div>
     </div>
  
 