<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page </title>
    <link rel="stylesheet" href="Stylesheet.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
body {
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-image: linear-gradient(#bfffff, #d89696);
    font-family: "poppins";
}

h1 {
    text-align: center;
    color: #000000;
    font-family: "poppins";
}

.login {
    width: 360px;
    padding: 0 0 0;
    margin: auto;
}

.heading {
    position: relative;
    text-align: left;
    color: rgb(70, 70, 70);
}

.login .form .login {
    margin-top: -31px;
    margin-bottom: 26px;
}

.form {
    position: relative;
    z-index: 1;
    background-image: linear-gradient(#66ffcc, #ffffff);
    max-width: 360px;
    margin: 0 auto 100px;
    padding: 45px;
    text-align: center;
    box-shadow: 2px 2px 0 0 #d7f3f2;
}

.form input {
    font-family: "poppins";
    outline: 0;
    background: #f2f2f2;
    width: 100%;
    border: 0;
    margin: 0 0 15px;
    padding: 15px;
    box-sizing: border-box;
    font-size: 15px;
}

.form button {
    font-family: "poppins";
    text-transform: uppercase;
    outline: 0;
    background-color: #328f8a;
    width: 100%;
    border: 0;
    padding: 15px;
    color: #FFFFFF;
    font-size: 14px;
    cursor: pointer;
    position: relative;
    bottom: -5px;
}

.login-form .message {
    font-size: small;
    color: #000000;
}

.login-1:hover {
    background-color: #4ba8a4;
    position: relative;
}

.with {
    color: gray;
    font-size: small;
}

.message-2 {
    color: gray;
    font-size: small;
    margin-top: 5px;
}
.message-1 {
    color: gray;
    font-size: small;
}

.copyright {
    text-align: right;
    font-size: small;
    color: gray;
}

    </style>
    <title>Instalook</title>
</head>
<body>
    <h1>Instalook</h1>
    <div class="login">
        <div class="form">
            <div class="login">
                <div class="heading">
                    <h2>Login</h2>
                    <h3>Enter Your Info.</h3>
                </div>
            </div>
            <form action="" method="post" class="login-form">
                <input type="email" name="email" placeholder="example@gmail.com">
                <input type="password" name="password" placeholder="Password">
                <button type="Submit" value="Submit" class="login-1">Sign up</button>
                <br><br>
                <a class="message-1" href="signup.php">Forgot Password</a>
                <br><br>
                <p class="message-1">Don't Have an Account?
                    <a href="signup.php">Sign Up</a>
            </form>
        </div>
    </div>
    </div>
</body>
</html>

<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname="lucifer";
  $conn = new mysqli($servername, $username, $password,$dbname);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
} 
if($_SERVER['REQUEST_METHOD'] === 'POST') {
$email = $_POST['email'];
$password = $_POST['password'];
session_start();
if (isset($_SESSION['email'])) {
    header('Location: home.php');
    exit;
}

    $sql = "SELECT * FROM info WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
   
        $row = mysqli_fetch_assoc($result);
        $_SESSION['password'] = $row['password'];
        $_SESSION['email'] = $row['email'];
        header('Location: home.html');
        exit;
    } else {
      
        $error = "Invalid email or password.";
    }
    mysqli_close($conn);
}
?>
