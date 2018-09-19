<?php
include_once ("../masterpage/header.php");
 
$crud = new Crud();
$brand= new brandModel();
$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    $brandName = $crud->escape_string($_POST['brandName']);
    $description = $crud->escape_string($_POST['description']);
        
    $msg = $validation->check_empty($_POST, array('brandName','description'));
    // checking empty fields
    if($msg != null) {
        echo $msg;              
    } 
        $result=$brand->addbrand($brandName,$description);
        if($result==false){
            echo "not successful";
        }else
        {
            echo "Data added successfully.";
            echo "<br/><a href='brand.php'>View Result</a>"; 
        }
        
}
?><div class="container">
    <div class="row">      
               <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <form action="" method="POST" name="addbrand" enctype="multipart/form-data">
                     <h4>Add brands </h4>
                     <div class="form-group">
                        <label>brand Name</label>
                        <input type="text" name="brandName" class="form-control" id="brandName" placeholder="Enter brand name" required="">
                     </div>
                     <div class="form-group">
                        <label >Description</label>
                        <textarea name="description" id="description" class="form-control" cols="75" rows="5" required=""></textarea>
                     </div>
                     <div class="form-check">    
                        <input type="submit" name="Submit" value="Add">  
                     </div>
                  </form>
               </div>
            </div>
        </div>
<?php include_once ("../masterpage/footer.php"); ?>