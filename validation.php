<?php 

session_start();


$con=mysqli_connect('remotemysql.com','V9jxftGKr3');

if ($con) 
  {
		echo "no";
  }
else
	{
		echo "connection successful";
	}

 mysqli_select_db($con,'V9jxftGKr3','ygC3UQB4Gw','V9jxftGKr3');
 $name=$_POST['name'];
 $pass=$_POST['password'];
 $email=$_POST['email'];

 $q="select * from login where username='$name' && password='$pass'";

 $result=mysqli_query($con,$q);
 $res=mysqli_fetch_assoc($result);
 $num=mysqli_num_rows($result);
 if ($num==1)
  {

  	if ($res['username']=='admin') 
  	{
  		header("location:admin/admin_main.php");
  		
  	}
  	else
  	{

 	$_SESSION['username']=$name;
 	header('location:index.php');
 	}
 }
 else
 {
 	$_SESSION['error']="error";
 	header('location:login.php');

 }





 ?>
