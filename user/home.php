<?php
   include_once 'userMasterPage/header.php';
   include_once 'userMasterPage/footer.php';  
   $product= new ProductModel();
   $result=$product->productDisplay();
   ?>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<style>
   body{
   font-family:Arial, Helvetica, sans-serif;
   }
   h1{
   font-family:'Georgia', Times New Roman, Times, serif;
   }
</style>
<link rel="stylesheet" type="text/css" href="style.css">
<div class="wrapper">
   <div id="container">
      <div id="main-body">
         <main class="container">           
            <?php foreach ($result as $key => $res) {?> 
            <div class="content">
            <div class="left-column">  
            <?php                
                $sql = $product->imageDisplay($res['id']);
                $row = mysqli_fetch_array($sql);
                $image = $row['filename'];
                $image_src = "../image/".$image;
                ?>
                <img src='<?php echo $image_src; ?>'  alt="error"> 
            </div>
            <!-- Right Column -->
            <div class="right-column">
               <!-- Product Description -->
               <div class="product-description">
                  <a href="#"><span>Brand :<?php echo $res['brand_name']?></span></a>
                  <h1><?php echo $res['name']?></h1>
                  <p>Description :<?php echo $res['description']?></p>
               </div>
               
               <!-- Product Pricing -->
               <div class="product-price">
                  <span>Price :Rs. <?php echo $res['price']?></span>
                   <?php  echo "<br><a href=\"myWishlist.php?id=$res[id]\" class=\"cart-btn\">Add to wishlist</a>";        
              ?>    
                 
               </div>
            </div>
            </div>
            <?php }
               ?> 
         </main>
      </div>
   </div>
</div>