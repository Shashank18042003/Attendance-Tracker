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
    form{
      margin-top: 40px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

table {
  width: 100%;
  margin: 0 auto;
  border-collapse: collapse;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

/* Header styles */
table th {
  background-color: #4CAF50;
  color: white;
  padding: 12px 15px;
  text-align: left;
}

/* Alternating row colors */
table tr:nth-child(even) {
  background-color: #f2f2f2;
}

/* Cell styles */
table td {
  padding: 10px 15px;
}

/* Hover effect */
table tbody tr:hover {
  background-color: #ddd;
}

/* Responsive table */
@media screen and (max-width: 600px) {
  table {
    border: 0;
  }
  table caption {
    font-size: 1.3em;
  }
  table thead {
    display: none;
  }
  table tr {
    margin-bottom: 10px;
    display: block;
    border-bottom: 2px solid #ddd;
  }
  table td {
    display: block;
    text-align: right;
    font-size: 0.8em;
    border-bottom: 1px dotted #ccc;
  }
  table td:before {
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
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
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="shashank4848"; // Mysql password
$db_name="students"; // Database name
$tbl_name="members"; // Table name

// Connect to server and select databse.
$con=mysqli_connect("$host", "$username", "$password")or die("cannot connect");
$con->select_db("$db_name")or die("cannot select DB");
$myusername = $_GET['username'];
$sql="SELECT * FROM $tbl_name WHERE username=('$myusername')";
$result=$con->query($sql);

echo "<center>";
echo "<center>";
echo "<font size='6' color='white' /><div><h1>Attendance Tracker</h1></div><br \><br \><br \>";
echo "<table border='1'>";
echo "<tr>";
echo "<th><font size=\"5\" color=\"white\">Courses Offered</font></th>";
echo "</tr>";

while ($row = $result->fetch_array())
  {
  echo "<tr>";
  echo "<td><font size='4' color='white'><a href='retrieve_teacher.php?username=$myusername&subcode=".$row['sub']."'>" . $row['sub'] . "</a></font></td>";
  echo "</tr>"; 
  }
?>
</body>
</html>
