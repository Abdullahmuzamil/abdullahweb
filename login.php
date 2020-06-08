
    
 <?php session_start(); ?>   


 
    
<!DOCTYPE html>
<html>
<head>
 <title> Login </title>
 <link rel="stylesheet" a href="style.css">
 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>




 <div class="container">
 <img src="images/logo.png"/>
 <form action="loginphp.php" method="POST">
 <div class="form-input">
 <input type="text" name="username" placeholder="Enter the User Name" required /> 
 </div>
 <div class="form-input">
 <input type="password" name="password" placeholder="Password" required />
 </div>

 <input type="checkbox" name="remember" /> Remember me <br>
 


 <input type="submit" name="submit" value="LOGIN" class="btn-login"/>

 <?php      

    if (isset($_SESSION['invalid']) and $_SESSION['invalid'] == true)
   {
  

    
    echo "<p> <font color=red>Username or Password is Invalid...</font> </p>";

    $_SESSION['invalid'] = false;

   }
   ?>

   
 

 </form>




 </div>
</body>
</html>






