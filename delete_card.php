<?php
session_start();
require_once 'db_connect.php';
if (!isset($_SESSION['admin_user'])) { header('Location: admin_login.php'); exit; }
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id) {
    $conn->query("DELETE FROM cards WHERE id=$id");
}
header('Location: admin_dashboard.php');
exit;
?>