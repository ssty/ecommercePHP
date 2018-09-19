<?php
include_once ("../masterpage/header.php");
 
$crud = new Crud();
 
$id = $crud->escape_string($_GET['id']);
 
$result = $crud->delete($id, 'product');
 
if ($result) {
    header("Location:product.php");
}
?>