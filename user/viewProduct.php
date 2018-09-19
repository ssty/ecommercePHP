<?php
include_once 'userMasterPage/header.php';
$user = new UserModel();  
$product= new ProductModel();
$result=$product->productDisplay();
?>

<div class="container">
    <div class="row">      
                <div class="col-md-12">
        <div class="table-responsive">                
              <table id="mytable" class="table table-bordred table-striped">                   
                   <thead>
                    <th>Image</th>
                   <th>Product Id</th>
                    <th>Product Name</th>
                     <th>Brand</th>
                     <th>Description</th>
                     <th>Price</th>
                   </thead>

    <tbody>
    <?php foreach ($result as $key => $res) {?>     
        <tr>           
            <td><?php                
                $sql = $product->imageDisplay($res['id']);
                $row = mysqli_fetch_array($sql);
                $image = $row['filename'];
                $image_src = "../image/".$image;
                $ID=$res['id'];
                ?>
                <img src='<?php echo $image_src; ?>'>
            </td>

            <td><?php echo $id=$res['id']?></td>
            <td><?php echo $res['name']?></td>
            <td> <?php echo $res['brand_name']?></td>
            <td><?php echo $res['description']?></td>
            <td> <?php echo $res['price'];?></td>
            <?php  }?>
    
    
    </tbody>
        
</table>    
            </div>
            
        </div>
    </div>
</div>


<?php include_once ("../masterpage/footer.php"); ?>