<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>

  <section class="container">
      <h2 class="text-center p-3 bg-warning text-light">Search Results</h3>
  </section>

    <section class="container m-5">
<?php include "db_connect.php"; ?>
<?php
  $search =$_GET['searching'];
  $sql = "SELECT * FROM product WHERE product_name LIKE '%{$search}%'";
  $result = mysqli_query($connect, $sql);
  //$data = mysqli_fetch_array($result);
  //print_r($data);
?>
      <h2 class="text-center p-3 text-light bg-success">All Booklist</h2>
        <div class="row">
          <?php 
            if (mysqli_num_rows($result) > 0) {
                  while ($data = mysqli_fetch_array($result)) {
           ?>
          <div class="col-md-4 mt-1">
            <img class="img-fluid" src="img/<?php echo $data['product_image'] ?>" alt="Card image cap" style="width: 300px;height: 300px;">
            <br>
              <div class=" d-inline p-1 float-left"><?php echo $data['product_name']; ?></div>
              <div class=" d-inline p-1 float-right " style="margin-right: 70px;">$<?php echo $data['product_price']; ?></div>
            <br>
            <a class="btn btn-primary btn-success float-right" href="book_details.php?id=<?php echo $data['product_id']; ?>" role="button" style="margin-right: 70px;">Book Details</a>
          </div>
        <?php }}else{echo '<h2>No books found</h2>'; } ?>
          <div class="col-md-4 ">
            <img class="img-fluid" src="http://via.placeholder.com/300C/O https://placeholder.com/" alt="Card image cap" style="width: 300px;height: 300px;">
            <a class="btn btn-primary btn-success" href="book_details.html" role="button">Book Details</a>
          </div>
          <div class="col-md-4 ">
            <img class="img-fluid" src="http://via.placeholder.com/300C/O https://placeholder.com/" alt="Card image cap" style="width: 300px;height: 300px;">
            <a class="btn btn-primary btn-success" href="book_details.html" role="button">Book Details</a>
          </div>
          <div class="col-md-4 mt-1">
            <img class="img-fluid" src="http://via.placeholder.com/300C/O https://placeholder.com/" alt="Card image cap" style="width: 300px;height: 300px;">
            <a class="btn btn-primary btn-success" href="book_details.html" role="button">Book Details</a>
          </div>
        </div>
      </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>