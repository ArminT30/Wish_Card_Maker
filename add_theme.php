<?php
session_start();
require_once 'db_connect.php';
if (!isset($_SESSION['admin_user'])) { header('Location: admin_login.php'); exit; }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $conn->query("INSERT INTO themes (name) VALUES ('$name')");
    header('Location: admin_dashboard.php');
    exit;
}
?>
<!doctype html><html><head><meta charset='utf-8'><meta name='viewport' content='width=device-width,initial-scale=1'><title>Add Theme</title><link rel='stylesheet' href='style.css'></head><body>
<div class='wrap'><h2>Add Theme</h2><div class='form-card'>
<form method='post' action=''>
  <div class='form-row'><label>Theme Name</label><input required name='name' type='text'></div>
  <div class='form-row center'><button class='btn' type='submit'>Add</button></div>
</form>
</div></div></body></html>
