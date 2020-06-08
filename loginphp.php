<?php 


 session_start();
include "connection.php";


 
if(isset($_POST['submit'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];

    





   $query="SELECT * FROM `users` where name='$uname' AND password='$password' ";
    
    
    
    $query_result =mysqli_query($conn, $query);

    if (!$query_result) {
  die("Database query failed: " );

}
    $rows = mysqli_num_rows($query_result);
    
    if($rows == 1){
        

        if(isset($_POST['remember']))
        {
           setcookie('log', $uname , time() + (86400*1), '/' );
        }
        else
        {
            
            $_SESSION['log'] = $uname; 

        }



        header("Location:welcome.php");
    }
    else{

        $_SESSION['invalid'] = true;

       header('location:login.php');
        

    }

    mysqli_close($conn);
        
}
?>