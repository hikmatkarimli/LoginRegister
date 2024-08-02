<?php

declare(strict_types=1);

function is_input_empty(string $name, string $surname, string $username, string $pwd, string $repeatPwd, string $email)
{
    if (empty($name) || empty($surname) || empty($username) || empty($pwd) || empty($repeatPwd) || empty($email)) {
        return true;
    } else {
        return false;
    }
}

function is_password_match(string $pwd, string $repeatPwd)
{
    if ($pwd == $repeatPwd) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_username_taken(object $pdo, string $username)
{
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

function is_email_registered(object $pdo, string $email)
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $name, string $surname, string $pwd, string $username, string $email)
{
    set_user($pdo, $name, $surname, $pwd, $username, $email);
}