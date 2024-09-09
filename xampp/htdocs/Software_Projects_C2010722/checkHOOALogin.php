<?php
 function verifyUsers () {
        session_start();
        if (!isset($_POST['HOOA_ID']) or !isset($_POST['HOOA_Password'])) {
            return;  // <-- return null;  
        }
        $db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
        $stmt = $db->prepare('SELECT * FROM Authentication WHERE HOOA_ID=:HOOA_ID AND HOOA_Password=:HOOA_Password');
        $stmt->bindParam(':HOOA_ID', $_POST['HOOA_ID'], SQLITE3_TEXT);
        $stmt->bindParam(':HOOA_Password', $_POST['HOOA_Password'], SQLITE3_TEXT);
        $_SESSION['HOOA_ID'] = $_POST['HOOA_ID'];
        $result = $stmt->execute();

        $rows_array = [];
        while ($row=$result->fetchArray(SQLITE3_NUM))
        {
            $rows_array[]=$row;
        }
        return $rows_array;
    }
 function verifystatus () {
        $db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
        $stmt = $db->prepare("SELECT * FROM Hospital_Officers_Or_Administrators WHERE HOOA_ID=:HOOA_ID AND HOOA_Status= 'active'");
        $stmt->bindParam(':HOOA_ID', $_POST['HOOA_ID'], SQLITE3_TEXT);
        $result = $stmt->execute();

        $rows_array = [];
        while ($row=$result->fetchArray(SQLITE3_NUM))
        {
            $rows_array[]=$row;
        }
        return $rows_array;
    }
?>