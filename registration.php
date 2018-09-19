<?php
   include_once 'classes/UserModel.php'; 
   $user = new UserModel(); // Checking for user logged in or not
   
    if (isset($_REQUEST['submit'])){
    extract($_REQUEST);
    $register = $user->registration($first_name,$middle_name, $last_name,$confirm_password, $email,$contact_number);
    if ($register) {
    // Registration Success
    echo 'Registration successful <a href="login.php">Click here</a> to login';
    } else {
    // Registration Failed
    echo 'Registration failed. Email or Username already exits please try again';
    }
    }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="   sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
   </head>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
               <h1>Registration</h1>
               <form action="" method="post" name="reg">
                  <div class="form-group">
                     <label>First Name</label>
                     <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter First name">
                  </div>
                  <div class="form-group">
                     <label>Middle Name</label>
                     <input type="text" name="middle_name" class="form-control" id="middle_name" placeholder="Enter Middle name">
                  </div>
                  <div class="form-group">
                     <label>Last Name</label>
                     <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last name">
                  </div>
                  <div class="form-group">
                     <label>Contact Number</label>
                     <input type="tel"  id="contact_number" name="contact_number" placeholder="+9771-9840-000-000" class="form-control">
                  </div>
                  <div class="form-group">
                     <label>Email address</label>
                     <input type="email" name="email" class="form-control" id="Email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                     <label >Password</label>
                     <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                     <label>Confirm Password</label>
                     <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                  </div>
                  <div class="form-check">                      
                     <input type="submit" name="submit" value="Register" />
                  </div>
               </form>
               <a href="login.php">Already have an account</a>    
            </div>
         </div>
      </div>
   </body>
</html>