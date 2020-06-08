<?php 
session_start();


include "connection.php";
$uid=$_GET['u_id'];
  $query="SELECT * FROM `products` WHERE id='$uid' ";
  $query_result =mysqli_query($conn, $query);
if (!$query_result) {
  die("Database query failed: " );

}
$res=mysqli_fetch_array($query_result);


 

if(isset($_POST['update']))
{
	
	$id= $_POST['id'];
    $name= $_POST['name'];
    $price= $_POST['price'];
    $code= $_POST['code'];
    $instock= $_POST['instock'];
    $discount= $_POST['discount'];
    $size= $_POST['size'];
    $details= $_POST['details'];
   


$photo_info =$_FILES['photo'];
$photo_name =$photo_info['name'];
$photo_tmp_name =$photo_info['tmp_name'];


$folder ="uploaded/";
$full_path =$folder . $photo_name;
if($folder==$full_path)
{
	 $full_path = $res['photo'];
}
else
{
move_uploaded_file($photo_info['tmp_name'], $full_path);
}


	$query= "UPDATE `products`  SET `id`='$id',`name`='$name',`price`='$price',`code`='$code',`instock`='$instock',`discount`='$discount',`size`='$size',`details`='$details',`photo`='$full_path' WHERE id='$uid' ";
	$query_result= mysqli_query($conn, $query);
	if($query_result){
	$_SESSION['update_result'] =true;
	header('location:read.php');

	}
	else
	{
	echo "some error occured while updating the file...";

	}
}

 mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
  <head>
    

    <title>Update Product</title>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
  </head>
  <body>

     







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


<br>

</div>

    <div class="testbox">
      <form action="" method="POST" enctype="multipart/form-data"  >
       
       
        <h1>Updae Details</h1>
          <div class="item">
          
          <input type="number" name="id" value="<?php echo $res['id'] ?>" />
        </div>
        <div class="item">
          
          <input type="text" name="name" value="<?php echo $res['name'] ?>"/>
        </div>
        <div class="item">
          
          <input type="number" name="price" value="<?php echo $res['price'] ?>"/>
        </div>
       <div class="item">
          
          <input type="text" name="code" value="<?php echo $res['code'] ?> "/>
        </div>
        <div class="item ">
        	<?php
        	$iselected= $res['instock'];
          ?>
          <select name="instock"  >
            
            <option <?php if($iselected == 'Y'){echo ("selected");}?> value="Y">Y</option>
            <option <?php if($iselected == 'N'){echo ("selected");}?> value="N">N</option>
            
          </select>
        </div>
        <div class="item">
          
          <input type="text" name="discount" value="<?php echo $res['discount'] ?> "/>
        </div>

         <div class="item">
         	<?php
         	$sselected= $res['size'];
          ?>
          <select name="size"  >
          
            <option <?php if($sselected == 'SMALL'){echo ("selected");}?> value="SMALL">SMALL</option>
            <option <?php if($sselected == 'MEDIUM'){echo ("selected");}?> value="MEDIUM">MEDIUM</option>
            <option <?php if($sselected == 'LARGE'){echo ("selected");}?> value="LARGE">LARGE</option>
            

            
          </select>
        
        <div class="item">
          
          <textarea name="details" rows="5"  > <?php echo $res['details'] ?> </textarea>
        </div>

        <div class="item">
          
          <input type="file" name="photo"   />
          <br>
          <img src="<?php echo $res['photo'] ?>">
        </div>
        <div class="btn-block">
          <button type="submit" name="update">Save</button>
        </div>
      </form>
    </div>
  </body>


</html>