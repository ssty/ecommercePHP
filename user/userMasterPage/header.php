   <?php  
    session_start();
   include_once '../classes/UserModel.php';
  include_once '../classes/ProductModel.php';
  include_once '../classes/BrandModel.php';
   $user = new UserModel();
   $product=new ProductModel();
   if (isset($_GET['q']) && $_GET=="logout")
   {
       $user->user_logout();
       header("location:../login.php");
  }
   if (($user->get_session())==24)
   {
      header("location:../login.php");
      die();
   }   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">See Product</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="../user/home.php">Home</a></li>
      <li><a href="../user/viewProduct.php">Product</a></li>
      <li><a href="../user/myWishlist.php">Liked Products</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Brand<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <?php 
            $result = $product->displayBrandName();
            foreach ($result as $key => $res) {?>
            <?php $id=$res['id']?>
              <li><a href="../brand/viewBrand.php?id=<?php echo $id=$res['id'] ?>"><?php echo $res['brand_name']?></a></li>
            <?php }?>
        </ul>
      </li>
      <li><a href="#">About Us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../login.php?q=logout""><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  

 