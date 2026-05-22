<?php
session_start();
require_once 'db_connect.php';
$message='';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $conn->real_escape_string($_POST['username']);
    $pass = $_POST['password'];
    $r = $conn->query("SELECT * FROM admins WHERE username='$user'");
    if ($r && $r->num_rows>0) {
        $row = $r->fetch_assoc();
        if ($row['password'] === md5($pass)) {
            $_SESSION['admin_user'] = $user;
            header('Location: admin_dashboard.php');
            exit;
        } else $message='Incorrect password.';
    } else $message='Admin user not found.';
}
?>
<!doctype html><html><head><meta charset='utf-8'><meta name='viewport' content='width=device-width,initial-scale=1'><title>Admin Login</title><link rel='stylesheet' href='style.css'></head><body>
<div class='wrap'><h2>Admin Login</h2><div class='form-card'>
<?php if($message) echo "<p style='color:red;'>$message</p>"; ?>
<form method='post' action=''>
 <div class='form-row'><label>Username</label><input required name='username' type='text'></div>
 <div class='form-row'><label>Password</label><input required name='password' type='password'></div>
 <div class='form-row center'><button class='btn' type='submit'>Login</button></div>
</form>
</div></div></body></html>
