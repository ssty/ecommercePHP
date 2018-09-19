<?php
include_once ("../masterpage/header.php");
 
$crud = new Crud();
 
$id = $crud->escape_string($_GET['id']);
 
$result = $crud->delete($id, 'brand');
 
if ($result) {
    header("Location:brand.php");
}
?>