<?php
function Practioner_Messages (){
    $HOOA_ID = $_SESSION['HOOA_ID'];
    $db = new SQLITE3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = "SELECT * FROM Hospital_Officers_Or_Administrators WHERE HOOA_ID = '$HOOA_ID'";
    $stmt = $db->prepare($sql);
    $result2 = $stmt->execute();
    $arrayResult2 = [];    
    while ($row = $result2->fetchArray()){
        $arrayResult2 [] = $row;
    }
    return $arrayResult2;
}
?>
