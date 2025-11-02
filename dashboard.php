<?php
session_start();

// If user not logged in → kick them out
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

// Logged in user email
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>

<h2>Welcome, <?php echo htmlspecialchars($user); ?> 👋</h2>
<p>You are successfully logged in.</p>

<!-- Add your dashboard content below this line -->
<hr>
<h3>Dashboard</h3>
<p>This is your private dashboard page.</p>


<!-- Logout Button -->
<p><a href="logout.php" style="color:red;">Logout</a></p>

</body>
</html>
