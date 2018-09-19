<?php
include_once ("../masterpage/header.php");
$crud = new Crud();

$id = $crud->escape_string($_GET['id']);
 
$result = $crud->getData("SELECT * FROM brand WHERE id=$id");
 
foreach ($result as $res) {
    $brand_name = $res['brand_name'];
    $brand_description = $res['brand_description'];
}

$crud = new Crud();
$validation = new Validation();
 
if(isset($_POST['update']))
{    
    $brand_name = $crud->escape_string($_POST['brand_name']);
    $brand_description = $crud->escape_string($_POST['brand_description']);
    
    $msg = $validation->check_empty($_POST, array('brand_name', 'brand_description'));
    
    // checking empty fields
    if($msg) {
        echo $msg;        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }else {    
        //updating the table
        $result = $crud->execute("UPDATE brand SET brand_name='$brand_name',brand_description='$brand_description' WHERE id=$id");
        header("Location: brand.php");
    }
}
?>

    <a href="brand.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="brand_name" value="<?php echo $brand_name;?>"></td>
            </tr>
            <tr> 
                <td>Description</td>
                <td><input type="text" name="brand_description" value="<?php echo $brand_description;?>"></td>
            </tr>            
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
<?php include_once ("../masterpage/footer.php"); ?>