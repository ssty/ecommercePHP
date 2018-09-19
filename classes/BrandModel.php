<?php
include_once 'Crud.php';
 
class BrandModel extends Crud
{
	public function __construct()
    {
        parent::__construct();
    }
	
	
	public function brandDisplay()
    { 
    	$query = "SELECT * FROM brand";
		$result = $this->getData($query);
		return $result;
    }
    public function addbrand($brandName,$description)
    { 
    	$query="INSERT INTO brand(brand_name,brand_description) VALUES('$brandName','$description')";
		$result = $this->execute($query);
		return $result;
    }    
    public function productList($id)
    { 
        $query = "SELECT * FROM product where fk_brand_id=$id";
        $result = $this->getData($query);
        return $result;
    }
     public function brandName($id)
    { 
        $query = "SELECT brand_name FROM brand where id=$id";
        $result = $this->getData($query);
        return $result[0]['brand_name'];
    }    


}