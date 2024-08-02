<?php

declare(strict_types=1);

function register_inputs()
{
    if (
        isset($_SESSION["register_data"]["username"]) && !isset
    ($_SESSION["errors_register"]["username_taken"])
    ) {
        echo '<input type="text" name="username" 
        placeholder="Username" value="' . $_SESSION["register_data"]
                ["username"] . '">';
    } else {
        echo '<input type="text" name="username" 
        placeholder="Username">';
    }

    //Name
    if (
        isset($_SESSION["register_data"]["name"])
    ) {
        echo '<input type="text" name="name" 
        placeholder="Name" value="' . $_SESSION["register_data"]
                ["name"] . '">';
    } else {
        echo '<input type="text" name="name" 
        placeholder="Name">';
    }

    //Surname
    if (
        isset($_SESSION["register_data"]["surname"])
    ) {
        echo '<input type="text" name="surname" 
        placeholder="Surname" value="' . $_SESSION["register_data"]
                ["surname"] . '">';
    } else {
        echo '<input type="text" name="surname" 
        placeholder="Surname">';
    }

    echo '<input type="password" name="pwd" placeholder="Password">';
    echo '<input type="password" name="repeat_pwd" placeholder="Repeat Password">';

    if (
        isset($_SESSION["register_data"]["email"]) && !isset
    ($_SESSION["errors_register"]["email_used"]) && !isset
    ($_SESSION["errors_register"]["invalid_email"])
    ) {
        echo '<input type="text" name="email" placeholder="E-mail" 
        value="' . $_SESSION["register_data"]["email"] . '">';
    } else {
        echo '<input type="text" name="email" placeholder="E-mail">';
    }
}

function check_register_errors()
{
    if (isset($_SESSION['errors_register'])) {
        $errors = $_SESSION['errors_register'];
        echo "<br>";
        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }
        unset($_SESSION['errors_register']);
    } else if (isset($_GET["register"]) && $_GET["register"] === "success") {
        echo '<br>';
        echo '<p class="form-success">Register success!</p>';
    }
}