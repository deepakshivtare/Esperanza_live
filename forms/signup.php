<?php
require_once"config.php";

$username = $password = $confirm_password ="";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(empty(trim($_POST["USERNAME"]))){
        $username_err = 'Username cannot be blank';
    }
    else{
        
    }
}



?>



<!DOCTYPE html> 
<html> 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Login Page </title>

<style> 
Body {
  font-family: Calibri, Helvetica, sans-serif;
  bg-ima
}
button { 
        background-color: #6262e2; 
        width: 100%;
        color: rgb(255, 255, 255); 
        padding: 15px; 
        margin: 10px 0px; 
        border: none; 
        cursor: pointer; 
        } 

   
 input[type=text], input[type=password] { 
        width: 100%; 
        margin: 8px 0;
        padding: 12px 20px; 
        display: inline-block; 
        border: 2px solid rgb(126, 0, 128); 
        box-sizing: border-box; 
    }
 button:hover { 
        opacity: 0.7;   
    } 
  .cancelbtn { 
        width: auto; 
        padding: 10px 18px;
        margin: 10px 5px;
    } 
      
   
 .container { 
        padding: 30px;
        background-color: rgb(254, 254, 254);
        border-radius: 30px;
        width: 20rem;
        height: 25rem;
        display: flex;
        flex-direction: column;
            
        justify-content: space-around;
        
    } 

    #login
    {
        display: flex;
        justify-content: center;
    }
</style> 
<script src="https://www.gstatic.com/firebasejs/9.18.0/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.18.0/firebase-firestore-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.18.0/firebase-auth-compat.js"></script>
</head>  
<body>  
    <p style="background-image: url('C:\Users\deepa\Desktop\Esperanza\assets\img\about.jpg');">
    <center> <h1> Esperanza signUp Form </h1> </center> 
    <form id="login">
        <div class="container"> 
            <label>Username : </label> 
            <input type="text" placeholder="Enter email" name="email" required id="email">
            <label>Password : </label> 
            <input type="password"  id="password" placeholder="Enter Password" name="password" required >
            <button onclick="redirectToHome()">SignUp</button>
            <div><input type="checkbox" checked="checked"> Remember me </div>
            <button type="button" class="cancelbtn">Create an account</button> 
            <a href="#"> Forgot password? </a> 
        </div> 
    </form>   


 
</body>

</html> 