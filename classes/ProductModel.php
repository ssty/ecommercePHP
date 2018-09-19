<?php
include_once 'Crud.php';
 
class ProductModel extends Crud
{
	public function __construct()
    {
        parent::__construct();
    }	
	
	public function productDisplay()
    { 
    	$query = "SELECT product.id,product.name,product.description,product.price,product.filename,brand.brand_name FROM product inner JOIN brand ON product.fk_brand_id = brand.id;";
		$result = $this->getData($query);
		return $result;
    }
    
    public function addProduct($productName,$brand_id,$description,$price,$filename)
    { 
        $query="INSERT INTO product(name,fk_brand_id,description,price,filename) VALUES('$productName','$brand_id','$description','$price','$filename')";
        $result = $this->execute($query);
        return $result;
    }
    public function imageDisplay($id)
    { 
        $sql = "select filename from product where id='$id'";
        $result= $this->executeReturnObject($sql);
        return $result;
    }
    public function displayBrandName()
    { 
        $sql = "select brand_name,id from brand";
        $result= $this->getData($sql);
        return $result;
    }
    public function addMyWishlistProduct($product_id,$user_id)
    { 
         $sql2="SELECT wishlist_id from mywishlist WHERE product_id='$product_id' and user_id='$user_id'";

            $result = $this->executeReturnObject($sql2);
            $count_row = $result->num_rows;
            if ($count_row <1) {  
                 $query="INSERT INTO mywishlist(product_id,user_id) VALUES('$product_id','$user_id')";
                $result = $this->execute($query);
                return $result;
            }
            else{
                return false;
            }        
    }
    public function myWishlistProduct($user_id)
    { 
        $query = "SELECT product.id,product.name,product.description,product.price,product.filename FROM product inner JOIN mywishlist ON product.id = mywishlist.product_id where mywishlist.user_id='$user_id';";
        $result = $this->getData($query);
        return $result;
    }
    public function addedToFav()
    { 

        $query = " SELECT id, name,filename,(SELECT COUNT(DISTINCT user_id) AS Expr1 FROM mywishlist WHERE (product_id = temp.id)) AS Total_likes FROM product AS temp";
        $result = $this->getData($query);
        return $result;
    }  


}