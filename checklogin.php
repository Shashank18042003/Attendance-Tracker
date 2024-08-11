<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animated Attendance Tracker</title>
  <style>
    /* Global styles */
    body {
      background: linear-gradient(45deg, #1e90ff, #ff69b4);
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      background: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      backdrop-filter: blur(10px);
      text-align: center;
      width: 90%;
      max-width: 800px;
    }

    h1 {
      margin: 20px 0;
      font-size: 3em;
      color: #333;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    /* Animated styles */
    .animated-text {
      position: relative;
      display: inline-block;
      font-size: 24px;
      color: #333;
      overflow: hidden;
      animation: animate-text 10s infinite linear;
    }

    @keyframes animate-text {
      0% {
        transform: translateY(0);
      }

      100% {
        transform: translateY(-100%);
      }
    }

    /* Form styles */
    form {
      margin-top: 40px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .form-box {
      background: rgba(255, 255, 255, 0.4);
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      backdrop-filter: blur(10px);
      text-align: center;
      flex: 1;
      min-width: 300px;
      max-width: 400px;
      transition: transform 0.3s ease;
    }

    .form-box:hover {
      transform: translateY(-10px);
    }

    input[type="text"],
    input[type="password"] {
      width: calc(100% - 20px);
      padding: 15px;
      margin: 10px 0;
      border: none;
      border-radius: 25px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background: linear-gradient(45deg, #ff69b4, #1e90ff);
      color: white;
      text-align: center;
      font-size: 1.2em;
      transition: background-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      outline: none;
      background: linear-gradient(45deg, #ff1493, #1e90ff);
    }

    input[type="submit"] {
      padding: 15px 30px;
      background-color: #333;
      border: none;
      border-radius: 25px;
      color: white;
      cursor: pointer;
      font-size: 1.2em;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #555;
      transform: scale(1.05);
    }
  </style>

</head>
<body>
<?php
session_start();

$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = "shashank4848"; // Mysql password
$db_name = "students"; // Database name
$tbl_name = "members"; // Table name

// Connect to server and select database.
$con = new mysqli($host, $username, $password, $db_name);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Username and password sent from form
$myusername = $_POST['username'];
$mypassword = $_POST['password'];

// To protect MySQL injection
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = $con->real_escape_string($myusername);
$mypassword = $con->real_escape_string($mypassword);

$sql = "SELECT * FROM $tbl_name WHERE username='$myusername' AND password='$mypassword'";
$result = $con->query($sql);

// Mysql_num_row is counting table row
$count = $result->num_rows;

// If result matched $myusername and $mypassword, table row must be 1 row
if ($count == 1) {
    // Register session variables
    $_SESSION['username'] = $myusername;
    $_SESSION['password'] = $mypassword;
    
    // Redirect to the desired page
    header("Location: teacher.php?username=$myusername");
    exit();
} else {
    echo '<form action="back.php" method="post">';
    echo "<div align='center'><font size='5' color='white'>Wrong Username or Password</font></div>";
    echo "<div align='center'><input type='submit' name='back' value='Back'></div>";
    echo '</form>';
}

// Close the database connection
$con->close();
?>
</body>
</html>