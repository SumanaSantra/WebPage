<?php

 session_start();
 $errors=array();
 $serverName="DESKTOP-BEUEN6Q\SQLEXPRESS01";
 $database="Login_Page";
 $user="mydatabase";
 $password="root123";
 $connection = odbc_connect("Driver={ODBC Driver 17 for SQL Server};Server=$serverName;Database=$database;", $user, $password);

 if(isset($_POST['register']))
 {
   $username=$_POST['username'];
   $email=$_POST['email'];
   $password_1=$_POST['password_1'];
   $password_2=$_POST['password_2'];

   if(empty($username))
   {
     array_push($errors,"Username is required");
   }
   if(empty($email))
   {
     array_push($errors,"Email is required");
   }
   if(empty($password_1))
   {
     array_push($errors,"Password is required");
   }
   if($password_1 != $password_2)
   {
     array_push($errors,"Password Mismatched");
   }

   if(count($errors)== 0)
   {
     $password=md5($password_1);
     $sql="INSERT INTO signin (username,email,password) VALUES ('$username','$email','$password')";
     $st=odbc_exec($connection,$sql);

     $_SESSION['username'] = $username;
     $_SESSION['success'] = " Logged In";
     header('location: index.php');

   }
 }

?>
