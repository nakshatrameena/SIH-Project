<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>

<body>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Log In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" class="input username">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input password" data-type="password">
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Keep me Logged in</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button submitin" value="Log In">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                </div>
                <div class="sign-up-htm">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" class="input username">
                    </div>
                    <div class="group"> 
                        <label for="pass" class="label password">Password</label>
                        <input id="pass" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Repeat Password</label>
                        <input id="pass" type="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <label for="pass" class="label email">Email Address</label>
                        <input id="pass" type="text" class="input">
                    </div>
                    <div class="group">
                        <input type="submit" class="button submitup " value="Sign Up">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1">Already Member?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="login.js"></script>
</body>
</html>

<?php

// Create a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbz";

// Create a connection
$db = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($db === false) {
  die("Error connecting to the database: " . mysqli_connect_error());
}
// create the dbtable table if it doesn't already exist
$sql = "CREATE TABLE if not exists dbtable (
  username VARCHAR(20),
  email VARCHAR(20),
  password VARCHAR(50)  
)"; 

$db->query($sql);

// Check if the form was submitted
if (isset($_POST['submitup'])) {

  // Get the form data
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Check if the username already exists
  $sql = "SELECT * FROM dbtable WHERE username = '$username'";
  $result = $db->query($sql);

  if ($result->num_rows>0) {
    // Username already exists
    echo "The username already exists. Please choose a different username.";
  } else {

    // Insert the data into the database
    $sql = "INSERT INTO dbtable (username, email, password) VALUES ('$username', '$email', '$password')";
    $db->query($sql);
}
}

// Check if the login form was submitted
if (isset($_POST['submitin'])) {

  // Get the form data
  $nickname = $_POST['username'];
  $password = $_POST['password'];

  // Check if the user exists in the database
  $sql = "SELECT * FROM dbtable WHERE username = '$nickname' AND password = '$password'";
  $result = $db->query($sql);

  if ($result->num_rows>0) {

    // User exists, login the user
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $nickname;

    // Redirect the user to the home page
// Get the current directory

// Set the header to go to the file
header("Location: ../Game/dbz.html");

  } else {
    echo "error".mysqli_error($db);
    // User does not exist, show an error message
    // echo "<p>The username or password is incorrect. Please try again.</p>";
  }
}
?>   
