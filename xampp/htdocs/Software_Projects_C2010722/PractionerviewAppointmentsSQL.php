<?php


$HOOA_ID = $_SESSION['HOOA_ID'];
function getUsers (){
    $db = new SQLITE3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = "SELECT * FROM Appointments WHERE HOOA_ID = '$HOOA_ID'";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();
    $arrayResult = [];
    while ($row = $result->fetchArray()){
        $arrayResult [] = $row;
    }
    return $arrayResult;
}