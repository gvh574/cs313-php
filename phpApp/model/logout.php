<?php
session_start();
unset($_SESSION['logged_in_user']);
header('Location: ../?action=home');