   <?php
   
   include_once 'classes/UserModel.php';
   $user = new UserModel();
   if (isset($_GET['q']) && $_GET=="logout")
   {
       $user->user_logout();
       header("location:../ecommerce/login.php");
  }
   if (($user->get_session())==false)
   {
      header("location:../login.php");
      echo $_SESSION['login'];
   }
   else
   {     
      echo $_SESSION['login'];
   }
?>