<?php
// login.php
session_start();
require_once 'config.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = 'Enter username and password.';
    } else {
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ? LIMIT 1");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($user_id, $hashed);
            $stmt->fetch();
            if (password_verify($password, $hashed)) {
                // success
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $user_id;
                header('Location: index.php');
                exit;
            } else {
                $error = 'Incorrect password.';
            }
        } else {
            $error = 'Username not found.';
        }
        $stmt->close();
    }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<style>
    body{
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
    h2 {
        text-align:center;
        margin-bottom:25px;
    }
    input{
        width:100%;
        padding:12px;
        margin:8px 0 16px 0;
        border:none;
        border-radius:6px;
        background: rgba(255,255,255,0.2);
        color:white;
        outline:none;
    }
    input::placeholder {
        color:#ddd;
    }
    button {
        width:100%;
        padding:12px;
        background:#ffca28;
        border:none;
        border-radius:6px;
        font-weight:bold;
        cursor:pointer;
    }
    button:hover {
        background:#e0b020;
    }
    .link {
        margin-top:15px;
        text-align:center;
    }
    .link a {
        color:#ffca28;
        text-decoration:none;
        font-weight:bold;
    }
</style>
</head>
<body>

<div class="container">
<h2>Login</h2>

<?php if ($error): ?>
<p style="color:#ff6b6b; text-align:center;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<form method="post">
    <input type="text" name="username" placeholder="Username" required value="<?php echo htmlspecialchars($username ?? ''); ?>">
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

<div class="link">
    <a href="register.php">Create Account</a>
</div>

</div>

</body>
</html>
