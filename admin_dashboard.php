<?php
session_start();
require_once 'db_connect.php';
if (!isset($_SESSION['admin_user'])) { header('Location: admin_login.php'); exit; }
$users = $conn->query("SELECT * FROM users ORDER BY id DESC");
$cards = $conn->query("SELECT c.*, t.name AS theme_name FROM cards c LEFT JOIN themes t ON c.theme_id=t.id ORDER BY c.created_at DESC");
?>
<!doctype html><html><head><meta charset='utf-8'><meta name='viewport' content='width=device-width,initial-scale=1'><title>Admin Dashboard</title><link rel='stylesheet' href='style.css'></head><body>
<div class='wrap'><h2>Admin Dashboard</h2>
<div class='form-card'>
  <h3>Users</h3>
  <?php if($users && $users->num_rows>0){ ?>
    <table class='table'><thead><tr><th>Name</th><th>Email</th><th>Joined</th><th>Action</th></tr></thead><tbody>
    <?php while($u=$users->fetch_assoc()){ echo "<tr><td>".htmlspecialchars($u['name'])."</td><td>".htmlspecialchars($u['email'])."</td><td>".htmlspecialchars($u['created_at'])."</td><td><a class='admin-actions' href='delete_user.php?id=".$u['id']."'>Delete</a></td></tr>"; } ?>
    </tbody></table>
  <?php } else echo '<p class="small">No users yet.</p>'; ?>
  <h3 style='margin-top:20px'>Cards</h3>
  <?php if($cards && $cards->num_rows>0){ ?>
    <table class='table'><thead><tr><th>Title</th><th>Theme</th><th>From</th><th>Created</th><th>Action</th></tr></thead><tbody>
    <?php while($c=$cards->fetch_assoc()){ echo "<tr><td>".htmlspecialchars($c['title'])."</td><td>".htmlspecialchars($c['theme_name'])."</td><td>".htmlspecialchars($c['from_name'])."</td><td>".htmlspecialchars($c['created_at'])."</td><td><a class='admin-actions' href='delete_card.php?id=".$c['id']."'>Delete</a></td></tr>"; } ?>
    </tbody></table>
  <?php } else echo '<p class="small">No cards yet.</p>'; ?>
  <p class='center' style='margin-top:18px'><a class='btn' href='add_theme.php'>Add Theme</a> <a class='btn' href='logout.php'>Logout</a></p>
</div></div></body></html>
