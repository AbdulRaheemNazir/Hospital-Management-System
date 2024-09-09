<?php

function getUsers (){
    $db = new SQLITE3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = "SELECT * FROM Hospital_Officers_Or_Administrators";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();
    $arrayResult = [];
    while ($row = $result->fetchArray()){
        $arrayResult [] = $row;
    }
    return $arrayResult;
}

function getPassword (){
    $db = new SQLITE3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = "SELECT * FROM Authentication";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();
    $arrayResult = [];
    while ($row = $result->fetchArray()){
        $arrayResult [] = $row;
    }
    return $arrayResult;
}











