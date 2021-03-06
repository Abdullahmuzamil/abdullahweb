 
    <?php
  session_start();
  include "connection.php";
  $query="SELECT * FROM `products` ";
  $query_result =mysqli_query($conn, $query);
if (!$query_result) {
  die("Database query failed: " );

}

  mysqli_close($conn);

  
  ?>


 
<!DOCTYPE html>
<html>
  <head>
    

    <title>Products</title>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
  </head>
  <body>

     <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      margin: 15px 0;
      font-weight: 400;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 3px;
      }
      form {
      width: 50%;
      padding: 20px;
      background: #fff;
      box-shadow: 0 2px 5px #ccc; 
      }
      input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      select {
      width: 100%;
      padding: 7px 0;
      background: transparent;
      }
      textarea {
      width: calc(100% - 6px);
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      .item:hover p, .item:hover i {
      color: #095484;
      }
      input:hover, select:hover, textarea:hover {
      box-shadow: 0 0 5px 0 #095484;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      input[type="time"]::-webkit-inner-spin-button {
      margin: 2px 22px 0 0;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #a9a9a9;
      }
      .item i {
      right: 1%;
      top: 30px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 0;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      .btn-block {
      margin-top: 20px;
      text-align: center;
      }
      button {
      width: auto;
      padding: 10px;
      border: none;
      -webkit-border-radius: 5px; 
      -moz-border-radius: 5px; 
      border-radius: 5px; 
      background-color: #095484;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background-color: #0666a3;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .city-item input {
      width: calc(50% - 20px);
      }
      .city-item select {
      width: calc(50% - 8px);
      }
      }
    </style>

<div>
<nav class="navbar navbar-expand-sm bg-dark justify-content-center">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="welcome.php">Home &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="insert.php">Add Product &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="read.php">View Product &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">Log Out</a>
    </li>
  </ul>
</nav>

</div>
<br>

<?php

     if(isset($_SESSION['update_result']) and ($_SESSION['update_result'] )== true)
   {
    echo "<h2>Record update successfully...</h2>";
    $_SESSION['update_result']=false;

   }

   if(isset($_SESSION['delete_result']) and $_SESSION['delete_result'] == true)
   {
    echo "<h2>Record Deleted successfully...</h2>";
    $_SESSION['delete_result']=false;

   }
    
    ?>


     <table border="1" class="table table-bordered table-dark">
  <thead>
  <tr>

  <th>Id</th>
  <th>Name</th>
  <th>Price</th>
  <th>Code</th>
  <th>Instock</th>
   <th>Discount</th>
  <th>Size</th>
  <th>Product Details</th>
  <th>Image</th>
  <th>Update</th>
  <th>Delete</th>

  </tr>


</thead>

<tbody>
  
  <?php 
  
  while($res=mysqli_fetch_array($query_result))
  {

  ?> 

  <tr>
    
     
         <td> <?php echo $res['id'] ?> </td>
         <td> <?php echo $res['name'] ?> </td>
         <td> <?php echo $res['price'] ?> </td>
         <td> <?php echo $res['code'] ?> </td>
         <td> <?php echo $res['instock'] ?> </td>
         <td> <?php echo $res['discount'] ?> </td>
         <td> <?php echo $res['size'] ?> </td>
         <td> <?php echo $res['details'] ?> </td>
         <td> <img src="<?php echo $res['photo'] ?>" width=50% height=50% > </td>
         <td> <a href="update.php?u_id= <?php echo $res['id'] ?>">Update </a> </td>
         <td> <a href="delete.php?d_id= <?php echo $res['id'] ?>">Delete </a> </td>
         
  </tr>

  <?php
}

?>
</tbody>
</table>




    
    
  </body>


</html>























