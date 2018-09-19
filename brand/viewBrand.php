<?php
include_once '../user/userMasterPage/header.php';
echo $_SESSION['login'];
$brand_id = $_GET['id'];
$brand= new BrandModel();
$result=$brand->productList($brand_id);
$result2=$brand->brandName($brand_id);

?>

<div class="container">
    <div class="row">  
    <h1><?php echo  $result2?></h1>    
      <div class="col-md-12">
        <div class="table-responsive">                
              <table id="mytable" class="table table-bordred table-striped">                   
                   <thead>
                  <th>Product Id</th>
                  <th>Product Name</th>
                  <th>Description</th>
                  <th>Price</th>
                   </thead>

  
    <?php foreach ($result as $key => $res) {?>     
        <tbody>
                     <td><?php echo $id=$res['id'];?></td>
                     <td><?php echo $res['name'];?></td>
                     <td><?php echo $res['description'];?></td>
                     <td> <?php echo $res['price'];?></td>
                     
   <?php } ?>

    </tbody>
        
</table>           
            </div>
            
        </div>
    </div>
</div>

<?php include_once '../user/userMasterPage/footer.php';
 ?>