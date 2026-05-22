<?php
session_start();
require_once 'db_connect.php';
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$card = null;
if ($id) {
    $r = $conn->query("SELECT c.*, t.name AS theme_name FROM cards c LEFT JOIN themes t ON c.theme_id=t.id WHERE c.id=$id");
    if ($r && $r->num_rows>0) $card = $r->fetch_assoc();
}
?>
<!doctype html>
<html><head><meta charset='utf-8'><meta name='viewport' content='width=device-width,initial-scale=1'><title>Thank You</title><link rel='stylesheet' href='style.css'></head>
<body>
<div class='wrap'>
  <h2>Card Created Successfully!</h2>
  <div class='card-preview'>
    <div class='card-inner'>
      <?php if($card){ ?>
        <h3><?php echo htmlspecialchars($card['title']); ?></h3>
        <p class='small'>Theme: <?php echo htmlspecialchars($card['theme_name']); ?></p>
        <p class='message'><?php echo nl2br(htmlspecialchars($card['message_text'])); ?></p>
        <p class='from'>— <?php echo htmlspecialchars($card['from_name']); ?></p>
      <?php } else { echo '<p class="small">No card found.</p>'; } ?>
    </div>
  </div>
  <p class='center'><a class='btn' href='view_cards.php'>View All Cards</a> <a class='btn' href='create_card.php'>Create Another</a></p>
</div>
</body></html>
