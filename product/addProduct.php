<?php
include_once ("../masterpage/header.php");
 
$crud = new Crud();
$product= new ProductModel();
$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    $productName = $crud->escape_string($_POST['productName']);
    $id = $crud->escape_string($_POST['id']);
    $description = $crud->escape_string($_POST['description']);
    $price = $crud->escape_string($_POST['price']);
        
    $msg = $validation->check_empty($_POST, array('productName','id','description', 'price')); 
    $check_currency = $validation->is_currency($_POST['price']);   
    // checking empty fields
    if($msg != null) {
        echo $msg;              
    } elseif (!$check_currency) {
        echo 'Please provide amount of currency.';
    }
    else { 
      if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $tmp = explode('.', $file_name);
      $file_ext = strtolower(end($tmp));      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
               }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
        $filename="../image/".$file_name;
         move_uploaded_file($file_tmp,$filename);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
        $result=$product->addProduct($productName,$id,$description,$price,$filename);
        //display success message
        echo "Data added successfully.";
        echo "<br/><a href='product.php'>View Result</a>";
    }
}
?><div class="container">
    <div class="row">      
               <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <form action="" method="POST" name="addProduct" enctype="multipart/form-data">
                     <h4>Add products </h4>
                     <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="productName" class="form-control" id="productName" placeholder="Enter product name" required="">
                     </div>
                     <div class="form-group">
                         <label>Brand</label><br>
                         <select class="form-control" name="id">
                            <?php 
                                $result = $product->displayBrandName();
                            foreach ($result as $key => $res) {?>
                            <option value="<?php echo $res['id']?>"><?php echo $res['brand_name']?></option>
                            <?php }?>
                        </select>
                    </div>
                     <div class="form-group">
                        <label >Description</label>
                        <textarea name="description" id="description" class="form-control" cols="75" rows="5" required=""></textarea>
                     </div>
                     <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="Enter price" required="">
                     </div>
                     <div class="form-group">
                         <input type="file" name="image" />
                     </div>
                     <div class="form-check">    
                        <input type="submit" name="Submit" value="Add">  
                     </div>
                  </form>
               </div>
            </div>
        </div>
<?php include_once ("../masterpage/footer.php"); ?>