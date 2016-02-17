<?php

function insertHash($user, $pass)
{
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    
    $db = dbConnection();

    try {
        $sql = 'INSERT INTO users(username, password) VALUES(:user, :pass)';

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':user', $user, PDO::PARAM_STR);
        $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    } catch (PDOException $exc) {
        return FALSE;
    }    
}