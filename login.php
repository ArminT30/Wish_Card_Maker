<?php
session_start();
require_once 'db_connect.php';

$message='';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $pass = $_POST['password'];
    $r = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($r && $r->num_rows > 0) {
        $row = $r->fetch_assoc();
        if ($row['password'] === md5($pass)) {
            $_SESSION['user_email'] = $email;
            header('Location: home.php');
            exit;
        } else {
            $message = 'Incorrect password.';
        }
    } else {
        $message = 'No user found with that email.';
    }
}
?>
<!doctype html>
<html><head><meta charset='utf-8'><meta name='viewport' content='width=device-width,initial-scale=1'><title>Login</title><link rel='stylesheet' href='style.css'></head>
<body>
<div class='wrap'>
  <h2>Login</h2>
  <div class='form-card'>
    <?php if($message) echo "<p style='color:red;'>$message</p>"; ?>
    <form method='post' action=''>
      <div class='form-row'><label>Email</label><input required name='email' type='email'></div>
      <div class='form-row'><label>Password</label><input required name='password' type='password'></div>
      <div class='form-row center'><button class='btn' type='submit'>Login</button></div>
    </form>
    <p class='small'>Not registered? <a href='register.php'>Create an account</a></p>
  </div>
</div>
</body></html>
