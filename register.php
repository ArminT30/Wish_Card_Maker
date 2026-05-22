<?php
session_start();
require_once 'db_connect.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = md5($_POST['password']);

    // simple check if email exists
    $r = $conn->query("SELECT id FROM users WHERE email='$email'");
    if ($r && $r->num_rows > 0) {
        $message = 'Email already registered.';
    } else {
        $conn->query("INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')");
        $_SESSION['user_email'] = $email;
        header('Location: home.php');
        exit;
    }
}
?>
<!doctype html>
<html><head><meta charset='utf-8'><meta name='viewport' content='width=device-width,initial-scale=1'><title>Register</title><link rel='stylesheet' href='style.css'></head>
<body>
<div class='wrap'>
  <h2>Register</h2>
  <div class='form-card'>
    <?php if($message) echo "<p style='color:red;'>$message</p>"; ?>
    <form method='post' action=''>
      <div class='form-row'><label>Name</label><input required name='name' type='text'></div>
      <div class='form-row'><label>Email</label><input required name='email' type='email'></div>
      <div class='form-row'><label>Password</label><input required name='password' type='password'></div>
      <div class='form-row center'><button class='btn' type='submit'>Register</button></div>
    </form>
    <p class='small'>Already a user? <a href='login.php'>Login here</a></p>
  </div>
</div>
</body></html>
