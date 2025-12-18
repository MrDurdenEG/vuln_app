<?php
include "db.php";

$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $sql = mysqli_prepare($conn, "select * from users where username = ? AND password = ?");
  mysqli_stmt_bind_param($sql, "ss", $username, $password);
  mysqli_stmt_execute($sql);
  $result = mysqli_stmt_get_result($sql);
  $user = mysqli_fetch_assoc($result);

  if ($user && password_verify($password, $user["password"])) {
    header("Location: dashboard.php");
    exit;
  } else {
    $message = "wrong username or password";
  }
} ?>

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