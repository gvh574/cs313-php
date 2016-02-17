<?php

/*
 * Functions Library
 */

function valUrl($url) {
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED);
    return $url;
}

function hashPassword($password) {
    $salt = '$956$$cheesesmells$7' . substr(md5(uniqid(rand(), true)), 0, 16);
    return crypt($password, $salt);
}

function comparePassword($password, $hashedPassword) {
    return crypt($password, $hashedPassword) == $hashedPassword;
}

function valString($string) {
    $string = filter_var(trim($string), FILTER_SANITIZE_STRING);
    return $string;
}

function valEmail($email) {
    $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    $email = filter_var(trim($email), FILTER_VALIDATE_EMAIL);
    return $email;
}

function valNumber($number) {
    if (is_int($number)) {
        $number = filter_var($number, FILTER_SANITIZE_NUMBER_INT);
        $number = filter_var($number, FILTER_VALIDATE_INT);
        return $number;
    } elseif (is_float($number)) {
        $number = filter_var($number, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $number = filter_var($number, FILTER_VALIDATE_FLOAT);
        return $number;
    } else {
        return FALSE;
    }
}

function dateCheck($date) {
    try {
        $date = preg_replace("/(\d{1,4})[\s\S](\d{1,4})[\s\S](\d{1,4})/", "$1-$2-$3", $date);
        $date = new DateTime($date);
        return date_format($date, 'Y-m-d');
    } catch (Exception $e) {
        return FALSE;
    }
}

function sanPassword($password) {
    $password = preg_replace("/([<>'\"])/", "-", $password);
    $password = filter_var(trim($password), FILTER_SANITIZE_STRING);
    return $password;
}
