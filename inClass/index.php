<?php

if (!$_SESSION) {
    session_start();
}

require 'dbConnect.php';
require 'password.php';

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if (!isset($action)) {
    $action = 'signup';
}

switch ($action) {

    case 'signup':
        $title = 'Home';
        include 'signup.php';
        insertHash($_POST['username'], $_POST['password']);
        exit;


}
