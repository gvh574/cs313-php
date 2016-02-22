<?php

if (!$_SESSION) {
    session_start();
}


if (is_readable('model/library.php')) {
    require 'model/library.php';
} else {
    $message = 'Sorry, a library error occurred.';
    $_SESSION['message'] = $message;
    header('location: error.php');
    exit;
}

if (is_readable('model/functions.php')) {
    require 'model/functions.php';
} else {
    $message = 'Sorry, a data functions error occurred.';
    $_SESSION['message'] = $message;
    header('location: error.php');
    exit;
}

if (is_readable('model/db.php')) {
    require 'model/db.php';
} else {
    $message = 'Sorry, a database error occurred.';
    $_SESSION['message'] = $message;
    header('location: error.php');
    exit;
}


if (isset($_POST['action'])) {
    $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if (!isset($action)) {
    $action = 'home';
}

switch ($action) {

    case 'home':
        $title = 'Home';
        include 'view/home.php';
        exit;
    case 'results':
        $searchList = getSearchList($_POST['srch-term']);
        $title = 'Results';
        include 'view/results.php';
        exit;
    case 'complexReview':
        $complex = getComplex($_GET['id']);
        $review = getReview($_GET['id']);
        $title = 'Complex Review';
        include 'view/complexReview.php';
        exit;
    case 'loginSignin':
        $title = 'Sign Up';
        include 'view/signUp.php';
        exit;
    case 'login':
        if($_POST['type'] == 'signup'){
            $userCreated = addUser($_POST['form-first-name'], $_POST['form-last-name'], $_POST['form-email'], $_POST['form-password']);
            if($userCreated)
            {
                $message = 'User Successfully Created';
                $_SESSION['message'] = $message;
                $title = 'Login';
                include 'view/profile.php';
                exit;
            }else
            {
                $_SESSION['message'] = 'Email is already in use. Please select another.';
                include 'view/signUp.php';         
                exit;
            }
        }
        else
        {
            $exists = verifyUser($_POST['form-username'], $_POST['form-password']);
            if($exists)
                include 'view/profile.php';
            else
            {
                $_SESSION['message'] = 'Invalid Credentials';
                include 'view/signUp.php';
                exit;
            }
        }
    case 'profile':
        if(isset($_SESSION['logged_in_user']))
            include 'view/profile.php';
        else
            header('Location: ?action=home');
      
}