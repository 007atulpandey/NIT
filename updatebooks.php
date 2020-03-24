<?php 
session_start();
include('style/phpfile/config.php');
error_reporting(0);
if(strlen($_SESSION['libid'])==0 || strlen($_SESSION['admin'])==0)
    {   
header('location:front.php');
}
else   {

if(isset($_POST['submit'])){

$name=$_POST['name'];
$publication=$_POST['publication'];
$author=$_POST['author']; 
$price=$_POST['price'];
$total=$_POST['total'];
$sql="update `books` set `BookName`=:name, `Author`=:author, `Publication` = :publication, `BookPrice`=:bookprice,`Totalavailable`=:total where id =:id";
$query = $dbh->prepare($sql);
$query->bindParam(':id',$_GET['upd'],PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':author',$author,PDO::PARAM_STR);
$query->bindParam(':publication',$publication,PDO::PARAM_STR);
$query->bindParam(':bookprice',$price,PDO::PARAM_STR);
$query->bindParam(':total',$total,PDO::PARAM_STR);
if(isset($_POST['submit']))
$query->execute();
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

   <!---  nav bar and header  -->
<?php include('style/phpfile/header.php');?>
<div class="container">


<div class="row pad-botm">
            <div class="col-md-12">
            <center>
            <h4 class="header-line">Add Book Detail</h4>
            </center>
               
                
                            </div>

        </div>
<?php 
$sq ="select * from books where id = ".$_GET['upd'];
$q = $dbh->prepare($sq);
$q->execute();
$res = $q->fetchAll(PDO::FETCH_OBJ);

 

 
?>

<form method= "POST" >
 
<div class="form-group">
    <label for="exampleInputPassword1">Book Title</label>
    <input type="text" name ="name" value = "<?php  echo htmlentities($res[0]->BookName); ?>" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Publication</label>
    <input type="text" name = "publication" value = "<?php  echo htmlentities($res[0]->Publication); ?>" class="form-control" id="exampleInputPassword1">
  </div> 
<div class="form-group">
    <label for="exampleInputPassword1">Author</label>
    <input type="text" name="author" value = "<?php  echo htmlentities($res[0]->Author); ?>" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input type="text" name="price" value = "<?php  echo htmlentities($res[0]->BookPrice); ?>" class="form-control" id="exampleInputPassword1">
  </div> 

  <div class="form-group">
    <label for="exampleInputPassword1">No of books</label>
    <input type="text" name="total" class="form-control" id="exampleInputPassword1"value = "<?php  echo htmlentities($res[0]->Totalavailable); ?>">
  </div> 
  
  <button type="submit" name = "submit" class="btn btn-primary">Submit</button>
</form>

</div>


<?php  include('./style/phpfile/footer.php')  ?>
</body>
</html>

