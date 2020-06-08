<?php

session_start();

if(isset($_POST['submit']))
{
  
  function clean($val)
  {
    $val =trim($val);
    $val =htmlspecialchars($val);
    $val =stripslashes($val);
    return $val;



  }



  $fname= clean($_POST['fullname']);
    $uname= clean($_POST['username']);
    $email= clean($_POST['email']);
    $gender= clean($_POST['gender']);
    $country= clean($_POST['country']);
    $pass= clean($_POST['pass']);
    $conpass= clean($_POST['conpass']);
    $details= clean($_POST['details']);





$photo_info =$_FILES['photo'];
$photo_name =$photo_info['name'];
$photo_tmp_name =$photo_info['tmp_name'];

$photo_exe=pathinfo($photo_name, PATHINFO_EXTENSION);
$photo_exe=strtolower($photo_exe);


     if($fname=="" or $uname=="" or $email=="" or $gender=="" or $country=="" or $pass=="" or $conpass=="" or $details=="" or $photo_name=="")
     {
           $invalid = true;
     header('location:umerass.php');
}

else if($email=="")
{
  $_SESSION['emailformat'] = true;
     header('location:assignment3.php');
}


else if($pass!=$conpass)
{



  $_SESSION['passmatch'] = true;
     header('location:assignment3.php');

 }

 else if($photo_exe!="jpg" or $photo_exe!="png")
{

  echo $photo_exe;
  $_SESSION['photoerror'] = true;
     header('location:assignment3.php');
}
  
 

else
{

  header('location:abc.php');
}







}


?>







<!DOCTYPE html>
<html lang="en">
<head>
<title></title>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>




 </head>

<body>


  <div class="bg-warning w-50 p-3 text-white mx-auto mt-5">

    <h2 class="text-center text-uppercase">Signup form     </h2>
    <?php      

    if ($invalid== true)
   {
  

    
    echo "<p> <font color=red>All fields are Required*</font> </p>";

    $invalid = false;

   }

   ?>
    



    <form action="" method="POST" id='signupform' enctype="multipart/form-data">

      
     <input type="text" name="fullname" placeholder="Full Name*" class="form-control mb-3">


     <input type="text" name="username" placeholder="UserName *" class="form-control mb-3" required>


    <input type="text" name="email" placeholder="Email*" class="form-control mb-3" >

<?php      

       if (isset($_SESSION['emailformat']) and $_SESSION['emailformat'] == true)
   {
  

    
    echo "<p> <font color=red>Email Format*</font> </p>";

    $_SESSION['emailformat'] = false;

   }

   ?>



    <br>
    
    <b class="text-dark">GENDER: *</b> <input type="radio" name="gender" value="male" required >&nbsp <span class="text-dark">Male</span> &nbsp
    <input type="radio" name="gender" value="female" required>&nbsp  <span class="text-dark">Female</span> 
  <br>
 <br>
    <select name="country"  class="form-control mb-3" required>
      <option value="">Select Country*</option>
  <option value="pak">Pakistan</option>
  <option value="uae">UAE</option>
  <option value="china">China</option>
  <option value="tur">Turkey</option>          
</select>

 <input type="password" name="pass" placeholder="Password*" class="form-control mb-3" required id="pass" >
  <input type="password" name="conpass" placeholder="Confirm Password*" class="form-control mb-3" required id="conpass"  >
  
<?php      

       if (isset($_SESSION['passmatch']) and $_SESSION['passmatch'] == true)
   {
  

    
    echo "<p> <font color=red>Enter the same password as above*</font> </p>";

    $_SESSION['passmatch'] = false;

   }
   ?>


   <textarea rows="5" name="details" placeholder="Product details *" class="form-control mb-3" required></textarea>
   <br>

   <b class="text-dark">PICTURE: *</b> 
        <input type="file" name="photo" required class="text-dark" >

        <?php      

       if (isset($_SESSION['photoerror']) and $_SESSION['photoerror'] == true)
   {
  

    
    echo "<p> <font color=red>Upload png or jpg*</font> </p>";

    $_SESSION['photoerror'] = false;

   }
   ?>
<br>
      <font color="black">    <input type="submit" name="submit"  class="form-control mb-3 w-50  bg-success" > </font>







    </form>
    

  </div>






	</body>

</html>

<script>

  

 // $(document).ready(function(){ $('#signupform').validate(); });




    </script>