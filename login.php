
<?php
session_start();
	include_once 'classes/UserModel.php';
	$user = new UserModel();

	if (isset($_GET['q']) && $_GET['q']=="logout")
   {
       $user->user_logout();
       echo $_SESSION['login'];
  }

	if (isset($_REQUEST['submit']))
	 {
		extract($_REQUEST);
	    $login = $user->login($email, $password);
	    if ($login==1) {
            $_SESSION['login'] = true; 
            echo $_SESSION['login'];
	    	header("location:product/product.php");
	    }
	    elseif ($login==2) {
            $_SESSION['login'] = true;
            echo $_SESSION['login']; 
	    	header("location:user/home.php");
	    } else {
	        echo "alert('Wrong username or password')";
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
	<script type="text/javascript" language="javascript">

            function submitlogin() {
                var form = document.login;
				if(form.email.value == ""){
					alert( "Enter email or username." );
					return false;
				}
				else if(form.password.value == ""){
					alert( "Enter password." );
					return false;
				}
			}

</script>

<div class="container"> 
  <div class="row">    
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      <h1>Login Information</h1>
      <form action="" method="post" name="login">
        <div class="form-group">
          <label>Email address</label>
          <input type="email" name="email" class="form-control" id="Email" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label >Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <div class="form-check">    
        <input onclick="return(submitlogin());" type="submit" name="submit" value="Login" />   
        </div>
        <a href="registration.php">Create new account?</a>                      
      </form>           
    </div>
  </div>
</div>
</body>
</html>

<!-- 

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style><
            #container{width:400px; margin: 0 auto;}

></style>

<script type="text/javascript" language="javascript">

            function submitlogin() {
                var form = document.login;
				if(form.email.value == ""){
					alert( "Enter email or username." );
					return false;
				}
				else if(form.password.value == ""){
					alert( "Enter password." );
					return false;
				}
			}

</script>

<span style="font-family: 'Courier 10 Pitch', Courier, monospace; font-size: 13px; font-style: normal; line-height: 1.5;"><div id="container"></span>
<h1>Login Here</h1>
<form action="" method="post" name="login">
<table>
<tbody>
<tr>
<th>Email:</th>
<td><input type="text" name="email" required="" /></td>
</tr>
<tr>
<th>Password:</th>
<td><input type="password" name="password" required="" /></td>
</tr>
<tr>
<td></td>
<td><input onclick="return(submitlogin());" type="submit" name="submit" value="Login" /></td>
</tr>
<tr>
<td></td>
<td><a href="signUp.php">Register new user</a></td>
</tr>
</tbody>
</table>
</form></div>
 -->