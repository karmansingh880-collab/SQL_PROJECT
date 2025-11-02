<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg, #111827, #1e3a8a);
        color: white;
    }

    .card {
        background: rgba(255, 255, 255, 0.08);
        padding: 40px 50px;
        border-radius: 14px;
        backdrop-filter: blur(12px);
        text-align: center;
        width: 380px;
        box-shadow: 0 0 25px rgba(0,0,0,0.4);
    }

    h2 {
        margin-bottom: 15px;
        font-size: 24px;
        font-weight: 700;
    }

    p {
        font-size: 15px;
        margin-bottom: 25px;
        color: #dcdcdc;
    }

    .logout-btn {
        padding: 12px 28px;
        background: #ff6b6b;
        border: none;
        border-radius: 6px;
        color: white;
        cursor: pointer;
        font-weight: bold;
        transition: 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .logout-btn:hover {
        background: #e04848;
    }
</style>
</head>
<body>

<div class="card">
    <h2>Welcome, <strong><?php echo htmlspecialchars($username); ?></strong></h2>
    <p>You are logged in successfully!</p>
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

</body>
</html>

