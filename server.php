<?php

 session_start();
 $errors=array();
 $serverName="remotemysql.com";
 $database="3aHzSEcVNr";
 $user="3aHzSEcVNr";
 $password="vRZDMF62hM";
 $connection = mysqli_connect("Server=$serverName;Database=$database;", $user, $password);

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
     $sql="INSERT INTO lg (username,email,password) VALUES ('$username','$email','$password')";
     $st=mysqli_query($connection,$sql);

     $_SESSION['username'] = $username;
     $_SESSION['success'] = " Logged In";
     header('location: index1.php');

   }
 }

?>
