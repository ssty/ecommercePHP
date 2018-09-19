<?php
include_once 'Crud.php';
 
class UserModel extends Crud
{
	public function __construct()
    {
        parent::__construct();
    }
	
	public function userDisplay()
    { 
    	$query = "SELECT * FROM registration";
		$result = $this->getData($query);
		return $result;
    }

     public function registration($first_name,$middle_name,$last_name,$password,$email,$phone_number)
     { 
        $sql="SELECT * FROM registration WHERE email='$email'";
            $result = $this->executeReturnObject($sql);
            $count_row = $result->num_rows;
            if ($count_row == 0){
                $password = md5($password);
              $query="INSERT INTO registration SET first_name='$first_name', password='$password', middle_name='$middle_name', last_name='$last_name',email='$email',phone_number='$phone_number'";
              $result = $this->execute($query);
               return $result;
            }
            else { 
                return false;
            }        
    }

    public function login($email, $password){
            $password = md5($password);
            $sql2="SELECT id from registration WHERE email='$email' and password='$password'";
            $result = $this->executeReturnObject($sql2);
            $count_row = $result->num_rows;
            if ($count_row == 1) {                      
                while ($row = $result->fetch_assoc())
                {                  
                   $_SESSION['user_id'] =$row['id'];
                   echo $_SESSION['user_id'];
                   if($row['id']==24){                    
                        return 1;
                    }
                    else{                        
                        return 2;
                    } 
                }
            }
            else{
                return 3;
            } 
    }
    public function get_session(){
        return $_SESSION['user_id'];
    }

    public function user_logout() {
        $_SESSION['login'] = false;
        session_destroy();
    }
}
            