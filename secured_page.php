<?php 
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !=true) {
    header('location: login.php');
}



?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" type="text/css">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <div class="logo">
          <a class="navbar-brand fs-2" href="index.php" id="logo">AR Codings <i class="fa fa-code" aria-hidden="true"></i></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto text-center">
            <li class="nav-item">
              <a class="nav-link active text-warning"><?php echo $_SESSION['name']; ?></a>
            </li>
            <li class="nav-item">
              <a href="login.php?logout=1" class="btn btn-danger">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


<div class="container col-md-8 my-5 text-center">
  <h1 class="text-warning"> Welcome <span class="text-danger"><?php echo $_SESSION['name']; ?></span> </h1>
  <div class="my-5">
    <p class="fs-5">This a secured page</p>
    <p>only authenticated users have access to this page</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit fugit dolores quam ea sequi nam impedit atque laborum? Reprehenderit accusamus atque debitis, doloribus corporis consequatur deserunt quidem magnam unde officiis.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit fugit dolores quam ea sequi nam impedit atque laborum? Reprehenderit accusamus atque debitis, doloribus corporis consequatur deserunt quidem magnam unde officiis.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit fugit dolores quam ea sequi nam impedit atque laborum? Reprehenderit accusamus atque debitis, doloribus corporis consequatur deserunt quidem magnam unde officiis.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit fugit dolores quam ea sequi nam impedit atque laborum? Reprehenderit accusamus atque debitis, doloribus corporis consequatur deserunt quidem magnam unde officiis.</p>
  </div>
</div>

<?php include_once('footer.php') ?>
