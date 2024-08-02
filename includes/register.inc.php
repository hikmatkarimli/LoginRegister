<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $repeatPwd = $_POST["repeat_pwd"];
    $email = $_POST["email"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];

    try {
        require_once "dbh.inc.php";
        require_once "register_model.inc.php";
        require_once "register_contr.inc.php";
        //error handlers
        $errors = [];
        if (is_input_empty($name, $surname, $username, $pwd, $repeatPwd, $email)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used!";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username already taken!";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Email already registered!";
        }
        if (!is_password_match($pwd, $repeatPwd)) {
            $errors["password_mismatch"] = "Password mismatch!";
        }

        require_once "config_session.inc.php";

        if ($errors) {
            $_SESSION["errors_register"] = $errors;
            $registerData = [
                "username" => $username,
                "email" => $email,
                "name" => $name,
                "surname" => $surname
            ];
            $_SESSION["register_data"] = $registerData;
            header("Location: ../register.php");
            die();
        }

        create_user($pdo, $name, $surname, $pwd, $username, $email);
        header("Location: ../index.php?register=success");
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../register.php");
    die();
}