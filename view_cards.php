<?php
session_start();
require_once 'db_connect.php';
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}
$email = $_SESSION['user_email'];
// show all cards (for demo)
$r = $conn->query("SELECT c.*, t.name AS theme_name FROM cards c LEFT JOIN themes t ON c.theme_id=t.id ORDER BY c.created_at DESC");
?>
<!doctype html>
<html><head><meta charset='utf-8'><meta name='viewport' content='width=device-width,initial-scale=1'><title>View Cards</title><link rel='stylesheet' href='style.css'></head>
<body>
<div class='wrap'>
  <h2>All Cards</h2>
  <?php if($r && $r->num_rows>0){ ?>
    <div class='table-wrap'>
      <table class='table'>
        <thead><tr><th>Title</th><th>Theme</th><th>Message</th><th>From</th><th>Created</th></tr></thead>
        <tbody>
        <?php while($row = $r->fetch_assoc()){ ?>
          <tr>
            <td><?php echo htmlspecialchars($row['title']); ?></td>
            <td><?php echo htmlspecialchars($row['theme_name']); ?></td>
            <td><?php echo htmlspecialchars(substr($row['message_text'],0,80)); ?></td>
            <td><?php echo htmlspecialchars($row['from_name']); ?></td>
            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  <?php } else { echo '<p class="small">No cards yet.</p>'; } ?>
  <p class='center'><a class='btn' href='create_card.php'>Create Card</a></p>
</div>
</body></html>
