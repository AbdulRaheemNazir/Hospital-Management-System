<?php
 function verifyUsers () {
        session_start();
        if (!isset($_POST['Patient_ID']) or !isset($_POST['Patient_Password'])) {
            return;  // <-- return null;  
        }
        $db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
        $stmt = $db->prepare('SELECT * FROM Patients WHERE Patient_ID=:Patient_ID AND Patient_Password=:Patient_Password');
        $stmt->bindParam(':Patient_ID', $_POST['Patient_ID'], SQLITE3_TEXT);
        $stmt->bindParam(':Patient_Password', $_POST['Patient_Password'], SQLITE3_TEXT);
        $_SESSION['Patient_ID'] = $_POST['Patient_ID'];
        $result = $stmt->execute();
        $rows_array = [];
        while ($row=$result->fetchArray())
        {
            $rows_array[]=$row;
        }
        return $rows_array;
    }
?>
