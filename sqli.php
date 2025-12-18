<?php
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql = "select * from users where username = '$username' AND password = '$password'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    header("Location: dashboard.php");
    exit;
  } else {
    $message = "wrong username or password";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
</head>

<body>

  <h2>Login</h2>

  <form method="POST">
    <input type="text" name="username" placeholder="Username"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <button type="submit">Login</button>
  </form>

  <p><?php echo $message; ?></p>

</body>

</html>