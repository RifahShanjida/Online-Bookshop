<?php 

include "../db_connect.php"; ?>

<?php 
session_start();
if (!$_SESSION['admin']) {
	header("Location: ../adminlogin.php");
}
 ?>

<?php 
  	if (isset($_GET['logout'])) {
    	session_destroy();
    	header("Location: ../adminlogin.php");
  	}

    if (isset($_GET['delete'])) {
      $sql = "DELETE FROM category WHERE cat_id = '{$_GET['delete']}'";
      $result11 = mysqli_query($connect, $sql);;

      if($result11){
        echo '<script>alert("Delete Success")</script>';
      }
    }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <a class="navbar-brand" href="#">Book House</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <form class="form-inline my-2 my-lg-0">
    	<a href="" class=" mr-1" type="button">Hello, <?php echo $_SESSION['username']; ?></a>
      	<a href="?logout" class="btn btn-outline-success" type="submit">logout</a>
    </form>
  </div>
</nav>
    <h2 class="text-center text-light bg-success p-3">Welcome to admin panel!</h2>

<?php

    $sql = "SELECT * FROM category";
    $result = mysqli_query($connect, $sql);
    
?>

<section class="container-fluid container mt-4">
  <div class="row">
    <div class="col-md-4">
      <h4 class="text-center text-success">Category</h4>
      <ul class="list-group">
        <?php 

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
            echo '<li class="list-group-item">'.$row['cat_title'].' <a href="?delete='.$row['cat_id'].'" class="btn btn-danger float-right">Delete</a></li>';
          }
        }
         ?>

        <?php

          if(isset($_POST['addcategory'])){
            
            $sql = "INSERT INTO `category`(`cat_title`) VALUES ('{$_POST['category']}')";
            $result1 = mysqli_query($connect, $sql);
            if($result1){
              header("Location: http://localhost/sanjida/admin/index.php");
            }
          }

        ?>


      </ul>
    </div>
    <div class="col-md-8 border">
      <?php if (isset($msg)) {
        echo $msg;
      } ?>
      <h4 class="text-center text-success pt-3">Add Category</h4>
      <form class="form-inline m-5 " method="post" action="">
        <div class="form-group mx-sm-3 mb-2">
          <label for="inputPassword2" class="sr-only">Category</label>
          <input type="text" class="form-control" id="category" name="category" placeholder="enter category">
        </div>
        <button type="submit" class="btn btn-primary mb-2" name="addcategory">Add Category</button>
      </form>
    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
