<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    body {
      background: url(bb.jpg);
      background-size: 200% 200%;
      -moz-background-size: 100% 100%;
      background-repeat: no-repeat;
      word-wrap: break-word;
    }

    div {
      background: url(02.jpg);
      border: 2px solid #a1a1a1;
      padding: 10px 40px;
      word-wrap: break-word;
      width: 1200px;
      border-radius: 25px;
      margin: 0 auto; /* Center align div */
      text-align: center; /* Center align text inside div */
      margin-top: 20%; /* Adjust top margin for positioning */
    }

    table {
      background: url(02.jpg);
      width: 100%; /* Make table fill the containing div */
      border-collapse: collapse; /* Ensure cells in the table don't have space between them */
    }

    th, td {
      border: 1px solid black; /* Border for table cells */
      padding: 10px; /* Padding inside table cells */
      text-align: center; /* Center-align text in cells */
    }

    th {
      background-color: #f2f2f2; /* Background color for table headers */
      color: white; /* Text color for table headers */
    }

  </style>
</head>

<body>
<?php
$myusername = $_POST['username'];

// Perform a basic check to prevent empty username redirection
if (!empty($myusername)) {
  header("Location: teacher.php?username=$myusername");
  exit; // Terminate script after redirection
} else {
  echo "<div>";
  echo "<h2>Error: Username not provided</h2>";
  echo "<p>Please go back and enter your username.</p>";
  echo "</div>";
}
?>
</body>
</html>