<?php

include_once ("../masterpage/header.php");

$brand= new BrandModel();
$result=$brand->brandDisplay();
?>

<div class="container">
    <div class="row">      
                <div class="col-md-12">
        <div class="table-responsive">                
              <table id="mytable" class="table table-bordred table-striped">                   
                   <thead>
                   <th>Brand Id</th>
                    <th>Brand Name</th>
                     <th>Description</th>
                   </thead>

    <tbody>
    <?php foreach ($result as $key => $res) {?>     
        <tr>
            <td><?php echo $res['id']?></td>
            <td> <?php echo $res['brand_name']?></td>
            <td><?php echo $res['brand_description']?></td>  
            <?php  echo "<td><a href=\"editBrand.php?id=$res[id]\">Edit</a> | <a href=\"deleteProduct.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }?>      
   
    
    </tbody>
        
</table>

                
            </div>
            
        </div>
    </div>
</div>


<?php include_once ("../masterpage/footer.php"); ?>