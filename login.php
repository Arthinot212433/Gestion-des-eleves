
<?php   
 session_start();  
 require('db_conn.php');

 if (!isset($_SESSION['USER_ID'])) {  
      header("location:login.php");  
      die();  
 }  
 ?>  
 Login 
 <!DOCTYPE html>  
 <html>  
 <head>  
      <meta charset="utf-8">  
      <meta name="viewport" content="width=device-width, initial-scale=1">  
      <title>Dashboard</title>  
      <style>  
           @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap');  
           body{  
                display: flex;  
                justify-content: space-around;  
                font-family: 'Poppins', sans-serif;  
           }  
      </style>  
 </head>  
 <body>  
<?php
include_once('direction.php')
?>
 
 </body>  
 </html>  
