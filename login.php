<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';

if (isset($_SESSION["user_id"])) {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <nav>
            <a href="index.php">Home</a>
            <?php if (!isset($_SESSION["user_id"])) { ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php } ?>
        </nav>
        <h3 class="section-title">Login</h3>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button>Login</button>
        </form>
        <?php check_login_errors(); ?>
    </div>
</body>

</html>