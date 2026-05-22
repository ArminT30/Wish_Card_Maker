<?php
session_start();
require_once 'db_connect.php';
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}
$email = $_SESSION['user_email'];
$r = $conn->query("SELECT name FROM users WHERE email='$email'");
$name = ($r && $r->num_rows>0) ? $r->fetch_assoc()['name'] : 'User';
?>
<!doctype html>
<html><head><meta charset='utf-8'><meta name='viewport' content='width=device-width,initial-scale=1'><title>Home</title><link rel='stylesheet' href='style.css'></head>
<body>
<div class='wrap'>
  <h2>Welcome, <?php echo htmlspecialchars($name); ?></h2>
  <div class='form-card'>
    <p class='small'>Go on — create a card or view your previous cards.</p>
    <p><a class='btn' href='create_card.php'>Create Card</a> <a class='btn' href='view_cards.php'>View Cards</a> <a class='btn' href='logout.php'>Logout</a></p>
  </div>
</div>
</body></html>
