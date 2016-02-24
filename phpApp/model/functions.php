<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getSearchList($search) {
    $db = dbConnection();
    try {
        if($search == NULL)
        {
            $sql = 'SELECT * FROM complex INNER JOIN location ON complex.location_id=location.location_id';
        }
        else
        {
            $sql = 'SELECT complex_id, name, type, street, city, zipCode FROM complex INNER JOIN location ON complex.location_id=location.location_id WHERE name=:name OR city=:city OR state=:state OR type=:type';        
        }
        
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':name', $search, PDO::PARAM_STR);
        $stmt->bindValue(':city', $search, PDO::PARAM_STR);
        $stmt->bindValue(':state', $search, PDO::PARAM_STR);
        $stmt->bindValue(':type', $search, PDO::PARAM_STR);
        $stmt->execute();
        $searchList = $stmt->fetchAll();
        $stmt->closeCursor();
    } catch (PDOException $exc) {
        return FALSE;
    }

    if (!empty($searchList)) {
        return $searchList;
    } else {
        return FALSE;
    }
}

function getComplex($id) {
    $db = dbConnection();
    try {
            $sql = 'SELECT * FROM complex INNER JOIN location ON complex.location_id=location.location_id WHERE complex.complex_id=:id';        

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $searchList = $stmt->fetchAll();
        $stmt->closeCursor();
    } catch (PDOException $exc) {
        return FALSE;
    }

    if (!empty($searchList)) {
        return $searchList;
    } else {
        return FALSE;
    }
}


function getReview($id) {
    $db = dbConnection();
    try {
        $sql = 'SELECT firstName, lastName, date, rating, comment FROM complexReview INNER JOIN review ON complexReview.review_id=review.review_id INNER JOIN user ON complexReview.user_id=user.user_id WHERE complexReview.complex_id=:id';        

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $searchList = $stmt->fetchAll();
        $stmt->closeCursor();
    } catch (PDOException $exc) {
        return FALSE;
    }

    if (!empty($searchList)) {
        return $searchList;
    } else {
        return FALSE;
    }
}


function addUser($firstName, $lastName, $email, $password) {
    $db = dbConnection();
    
    $password = passHash($password);
    $rowCount = 0;
    try {
        $sql = 'SELECT email FROM user WHERE email=:email';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        
        $rowCount = $stmt->rowCount();
    } catch (PDOException $e) {
        echo $message = "PDO Failure";
    }
    
    if($rowCount == 0){

    try {
        $sql = 'INSERT INTO user(firstName, lastName, email, password, location_id)
                VALUES (:firstName, :lastName, :email, :password, 1)';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
        $stmt->bindValue(':lastName', $lastName, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $result = $stmt->execute();

        $stmt->closeCursor();
    } catch (PDOException $e) {
        echo $message = "PDO Failure";
    }

    if ($result) {
        $_SESSION['logged_in_user'] = $email;
        return TRUE;
    } else {
        return FALSE;
    }
        
    }else
    {
        return 0;
        
    }
}

function verifyUser($email, $password) {
    $db = dbConnection();
    
    $rowCount = 0;
    
    try {
        $sql = 'SELECT email, password FROM user WHERE email=:email';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $userInfo = $stmt->fetch();
        $stmt->closeCursor();

        $rowCount = $stmt->rowCount();
        echo $rowCount;
    } catch (PDOException $e) {
        echo $message = "PDO Failure";
    }
        
    if($rowCount == 1)
    {
        $_SESSION['logged_in_user'] = $email;
        return password_verify($password, $userInfo['password']);
    }
    else
        return 0;

    
}


function getProfileInfo($email) {
    $db = dbConnection();
    try {
        $sql = 'SELECT firstName, lastName, picture, city, state, zipCode FROM user INNER JOIN location ON user.location_id=location.location_id WHERE user.email=:email';        

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $profile = $stmt->fetchAll();
        $stmt->closeCursor();
    } catch (PDOException $exc) {
        return FALSE;
    }

    if (!empty($profile)) {
        return $profile;
    } else {
        return FALSE;
    }
}

function getReviewInfo($email) {
    $db = dbConnection();
    try {
        $sql = 'SELECT complex.name, complex.street, review.date, review.rating, review.comment FROM complexReview 
        JOIN complex
        ON complexReview.complex_id=complex.complex_id 
        JOIN review 
        ON complexReview.review_id=review.review_id 
        JOIN user 
        ON complexReview.user_id=user.user_id WHERE user.email=:email';        

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $reviews = $stmt->fetchAll();
        $stmt->closeCursor();
    } catch (PDOException $exc) {
        return FALSE;
    }

    if (!empty($reviews)) {
        return $reviews;
    } else {
        return FALSE;
    }
}


function addReview($complexID, $review, $email) {
    
    $reviewID = insertReview($review);
    $userID = getUserId($email);
    
    $db = dbConnection();
        try {
            $sql = 'INSERT INTO complexReview(complex_id, review_id, user_id) VALUES(:complexID, :reviewID, :userID)';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':complexID', $complexID, PDO::PARAM_INT);
            $stmt->bindValue(':reviewID', $reviewID, PDO::PARAM_INT);
            $stmt->bindValue(':userID', $userID['user_id'], PDO::PARAM_INT);
            $result = $stmt->execute();
            $stmt->closeCursor();
            
        } catch (PDOException $e) {
            echo $message = "PDO Failure";
        }

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
}

function getUserId($email)
{
    $db = dbConnection();
    try {
        $sql = 'SELECT user_id FROM user WHERE email=:email ';        

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $id = $stmt->fetch();
        $stmt->closeCursor();
    } catch (PDOException $exc) {
        return FALSE;
    }

    if (!empty($id)) {
        return $id;
    } else {
        return FALSE;
    }
    
    
}

function insertReview($review)
{
    $db = dbConnection();
    try {
        $sql = 'INSERT INTO review(comment) VALUES(:review)';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':review', $review, PDO::PARAM_STR);
        $stmt->execute();
        $lastid = $db->lastInsertId();

        $stmt->closeCursor();
    } catch (PDOException $e) {
        echo $message = "PDO Failure";
    }

    if ($lastid) {
        return $lastid;
    } else {
        return FALSE;
    } 
}









function passHash($pass)
{
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    return $pass;  
}





