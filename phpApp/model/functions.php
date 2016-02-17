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