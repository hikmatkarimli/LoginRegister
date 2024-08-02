<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/register_view.inc.php';

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
    <title>Register</title>
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
        <h3 class="section-title">Register</h3>
        <form action="includes/register.inc.php" method="post">
            <?php
            register_inputs();
            ?>
            <button>Register</button>
        </form>
        <?php check_register_errors(); ?>
    </div>
</body>

</html>