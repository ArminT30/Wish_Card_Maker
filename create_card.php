<?php
session_start();
require_once 'db_connect.php';
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $theme_id = intval($_POST['theme_id']);
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['message']);
    $from_name = $conn->real_escape_string($_POST['from_name']);
    $email = $_SESSION['user_email'];
    // insert card
    $conn->query("INSERT INTO cards (user_email, theme_id, title, message_text, from_name, created_at) VALUES ('$email',$theme_id,'$title','$content','$from_name',NOW())");
    $card_id = $conn->insert_id;
    header('Location: thank_you.php?id=' . $card_id);
    exit;
}

// load themes
$themes = $conn->query("SELECT * FROM themes ORDER BY id DESC");
?>
<!doctype html>
<html><head><meta charset='utf-8'><meta name='viewport' content='width=device-width,initial-scale=1'><title>Create Card</title><link rel='stylesheet' href='style.css'></head>
<body>
<div class='wrap'>
  <h2>Create Card</h2>
  <div class='form-card'>
    <form method='post' action=''>
      <div class='form-row'><label>Theme</label>
        <select name='theme_id' required>
          <?php while($t = $themes->fetch_assoc()){ echo "<option value='".$t['id']."'>".htmlspecialchars($t['name'])."</option>"; } ?>
        </select>
      </div>
      <div class='form-row'><label>Title</label><input name='title' required type='text'></div>
      <div class='form-row'><label>Message</label><textarea name='message' required></textarea></div>
      <div class='form-row'><label>From (your name)</label><input name='from_name' required type='text'></div>
      <div class='form-row center'><button class='btn' type='submit'>Create & Preview</button></div>
    </form>
  </div>
</div>
</body></html>
