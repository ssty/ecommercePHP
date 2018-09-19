<?php
include_once ("../masterpage/header.php");
$crud = new Crud();
// $
// id = $crud->escape_string($_GET['id']);
if (isset($_GET["id"])) {
    $id=$_GET['id'];
}  
 
$result = $crud->getData("SELECT * FROM product WHERE id=$id");
 
foreach ($result as $res) {
    $name = $res['name'];
    $description = $res['description'];
    $price = $res['price'];
}

$crud = new Crud();
$validation = new Validation();
 
if(isset($_GET['update']))
{    
    $product_name = $crud->escape_string($_GET['product_name']);
    $description = $crud->escape_string($_GET['description']);
    $price = $crud->escape_string($_GET['price']);
    
    $msg = $validation->check_empty($_GET, array('product_name', 'description', 'price'));
    
    // checking empty fields
    if($msg) {
        echo $msg;        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {    
        //updating the table
        $result = $crud->execute("UPDATE product SET name='$product_name',description='$description',price='$price' WHERE id=$id");       
        header("Location: product.php");
    }
}
?>

    <a href="product.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="GET" action="">
        <table border="0">
            <input type="text" name="id" hidden="hidden" value="<?php echo $id?>">
            <tr> 
                <td>Product Name</td>
                <td><input type="text" name="product_name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Description</td>
                <td><input type="text" name="description" value="<?php echo $description;?>"></td>
            </tr>
            <tr> 
                <td>Price</td>
                <td><input type="text" name="price" value="<?php echo $price;?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form> 
<?php include_once ("../masterpage/footer.php"); ?>