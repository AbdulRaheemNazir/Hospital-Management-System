<?php
function Patient_Medicaldiagnosis (){
$Patient_ID = $_SESSION['Patient_ID'];
    $db = new SQLITE3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = "SELECT * FROM Patient_Medical_Diagnosis WHERE Patient_ID = '$Patient_ID'";
    $stmt = $db->prepare($sql);
    $result2 = $stmt->execute();
    $arrayResult2 = [];    
    while ($row = $result2->fetchArray()){
        $arrayResult2 [] = $row;
    }
    return $arrayResult2;
}
?>

