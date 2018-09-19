<?php 
session_start();
 include_once '../classes/UserModel.php';
  include_once '../classes/ProductModel.php';
   include_once '../classes/Validation.php';
    include_once '../classes/BrandModel.php';
   $user = new UserModel();
   $product=new ProductModel();
   if (isset($_GET['q']) && $_GET['q']=="logout")
   {
       $user->user_logout();
       header("location:../login.php");
  }
   if (($user->get_session())!=24)
   {
      header("location:../login.php");
      die();
   }
   else{
      
   }
?>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="userMasterPage/style.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">See Product</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="../product/product.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Product<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../product/product.php">View Product</a></li>
          <li><a href="../product/addProduct.php">Add Product</a></li>
          <li><a href="../product/addedToFav.php">Liked Products</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Brand<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../brand/brand.php">View Brand</a></li>
          <li><a href="../brand/addBrand.php">Add Brand</a></li>
        </ul>
      </li>
      <li><a href="#">View Graph</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../login.php?q=logout""><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
