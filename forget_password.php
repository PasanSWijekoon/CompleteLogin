<html>

<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
    <meta name="description" content="Login - Register Template">
    <meta name="author" content="Lorenzo Angelino aka MrLolok">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://accounts.google.com/gsi/client" async></script>

    <style>
        body {
            background-color: #303641;
        }
    </style>
</head>

<body>
    <div id="container-login">
        <div id="title">
            <i class="material-icons lock">lock</i> Password Reset
        </div>

        <div class="register">
            Enter Your Email 
        </div>

        <div class="input">
            <div class="input-addon">
                <i class="material-icons">email</i>
            </div>
            <input name="email" id="email" placeholder="Email" type="email" required class="validate" autocomplete="off">
        </div>


        <div class="clearfix"></div>


        <div class="remember-me">
          
        </div>

        <button class="buttont" onclick="sendpasswordrequest();"> Reset Password</button>
        <div id="form-message" class="form-message"></div>



        <div>
            
                <div id="g_id_onload" data-client_id="981433577522-c3sc7ltq656j61chpk0h08aguf6ffvhi.apps.googleusercontent.com" data-context="signin" data-ux_mode="popup" data-callback="handleCredentialResponse" data-auto_prompt="false"></div>
               
                <div class="g_id_signin" data-text="Sign In" data-theme="white" data-size="medium" data-shape="pill">
                
            
            </div>
        </div>

        <div class="register">
            Password Rememberd?
            <a href="login.php"><button id="register-link">Login here</button></a>
        </div>
    </div>

</body>

<script src="./assets/js/main.js"></script>



</html>
<?php
session_start();
if (isset($_SESSION['email'])) {


    header("location:index.php");
    exit();
} else if (isset($_SESSION["jsonData"])) {

    header("location:index.php");
    exit();
}
if (isset($_COOKIE['email']) || isset($_COOKIE['password'])) {

    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];

    echo "<script>document.getElementById('email').value = '$email'</script>";
    echo "<script>document.getElementById('password').value = '$password'</script>";
}
?>
