<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
       </style> 
    <title>Home</title>
</head>
<body>
<h1>Delete Account from Database</h1>
    <form method="POST" action="">
      <input type="text" name="uname" id="uname" placeholder="your name">
      <input type="submit" value="Delete">
    </form>
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
$uname = $_POST['uname'];
$sql = "DELETE FROM info WHERE uname = $uname";
if (mysqli_query($conn, $sql)) {
  echo "Data deleted successfully";
} else {
  echo "Error deleting data: " . mysqli_error($conn);
}
mysqli_close($conn);
}
?>