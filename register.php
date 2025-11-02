<?php
session_start();
require_once 'config.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if ($username === '' || $email === '' || $password === '') {
        $error = 'All fields are required.';
    } else {
        $hashed = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed);

        if ($stmt->execute()) {
            header('Location: login.php');
            exit;
        } else {
            $error = 'Username or email already exists.';
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Register</title>
  <style>
    body {
      margin:0;
      padding:0;
      font-family: Arial, sans-serif;
      height:100vh;
      display:flex;
      justify-content:center;
      align-items:center;
      background: linear-gradient(135deg, #111827, #1e3a8a);
      color:white;
    }

    .container {
      width:350px;
      background: rgba(255,255,255,0.08);
      padding:40px;
      border-radius:12px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 25px rgba(0,0,0,0.5);
    }

    h2 { text-align:center; margin-bottom:25px; }

    input {
      width:100%;
      padding:12px;
      margin:8px 0 16px 0;
      border:none;
      border-radius:6px;
      background: rgba(255,255,255,0.2);
      color:white;
      outline:none;
    }

    input::placeholder { color:#ddd; }

    button {
      width:100%;
      padding:12px;
      background:#ffca28;
      border:none;
      border-radius:6px;
      font-weight:bold;
      cursor:pointer;
    }

    button:hover { background:#e0b020; }

    .link {
      margin-top:15px;
      text-align:center;
    }

    .link a {
      color:#ffca28;
      text-decoration:none;
      font-weight:bold;
    }

    .error {
      color:#ff6b6b;
      text-align:center;
      margin-bottom:12px;
      font-size:14px;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Create Account</h2>

  <?php if ($error): ?>
    <p class="error"><?= htmlspecialchars($error) ?></p>
  <?php endif; ?>

  <form method="post">
    <input name="username" placeholder="Username" required value="<?= htmlspecialchars($username ?? ''); ?>">
    <input name="email" type="email" placeholder="Email" required value="<?= htmlspecialchars($email ?? ''); ?>">
    <input name="password" type="password" placeholder="Password" required>
    <button type="submit">Register</button>
  </form>

  <div class="link">
    <a href="login.php">Already have an account? Login</a>
  </div>
</div>

</body>
</html>
