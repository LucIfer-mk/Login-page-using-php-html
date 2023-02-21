# Login-page-using-php-html
introduction
In today's digital world, websites have become an integral part of our lives. From social media to online shopping, we need to create accounts and log in to access various services. Therefore, designing a seamless and secure login and signup page is crucial for any website.
In this project, we will be using HTML, CSS, and PHP to create a login and signup page for a website. PHP will be used as a server-side scripting language to handle user authentication and store user data securely.
The login and signup page we will be creating will be visually appealing, responsive, and easy to use. Users will be able to create an account by filling out a registration form and then use their credentials to log in and access restricted content on the website.
Overall, this project aims to provide a comprehensive understanding of how to create a login and signup page using HTML, CSS, and PHP, and how to ensure the security of user data. By the end of this project, you will have a functional login and signup page that can be integrated into any website.













Connecting to Server
It stablishes connection between server and our program using
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname="lucifer";
 new mysqli($servername, $username, $password,$dbname);
command. 




Sign up page
Sign up page takes elements like ‘email’, ‘username’, and ‘password’ from HTML using element of form tag, and when we click submit button it saves entered information on server created by user using "INSERT INTO info ( uname, email, password) VALUES ('$uname', '$email', '$password')"; command.
It stores User name in ‘uname’ table of database email in ‘email’ table and password on ‘password’ table.
After Sign up it redirect user to login page:



Login Page
In login page it takes users email and password and check it whether entered information is correct or no, if given info is in the database it redirects user to home page if information is wrong it takes user to sign up page. 
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
This block of code performs validation of user given information is in server or not.


Home page
This page is made with HTML and CSS where information about member and their responsibilities in this page is mentioned in the home page. Home page is redirected from login page using,
if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['password'] = $row['password'];
        $_SESSION['email'] = $row['email'];
        header('Location: home.html');
        exit;
    }
This block of code. 
It contains three main function of this project, 
1.	Logout 
When logout button is clicked it perform logout operation using java script;
document.getElementById("logoutBtn").addEventListener("click", function() {
        window.location.href = "http://localhost/login/login.php";
        });   
This block of code performs logout operation when logout button is clicked.
and redirect it to login page. 

2.	Delete 
When delete button is clicked it delete data selected by user from server,
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
This block of code perform delete operation, user selected data get deleted from database.

3.	Modification of data

