<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/register_view.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        <!-- <h1>Welcome to Our Web App</h1> -->
        <h1>
            <?php outputNameAndSurname(); ?>
        </h1>
        <h3>
            <?php output_username(); ?>
        </h3>
        <?php if (isset($_SESSION["user_id"])) { ?>
            <form action="includes/logout.inc.php" method="post">
                <button>Logout</button>
            </form>
        <?php } ?>
    </div>
</body>

</html>