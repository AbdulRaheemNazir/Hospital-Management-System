<?php
function HOOA_Messages (){
    $HOOA_ID = $_SESSION['HOOA_ID'];
    $db = new SQLITE3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = "SELECT * FROM Hospital_Officers_Or_Administrators WHERE HOOA_ID = '$HOOA_ID'";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();
    $arrayResult = [];    
    while ($row = $result->fetchArray()){
        $arrayResult [] = $row;
    }
    return $arrayResult;
}
?>

