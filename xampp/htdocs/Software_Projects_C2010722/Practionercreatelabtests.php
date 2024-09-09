<?php
session_start();
function createlabtest(){
    $Patient_ID = $_GET['Patient_ID'];
    $created = false;//this variable is used to indicate the creation is successfull or not
    $db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = 'INSERT INTO Lab_Test(Patient_ID, Lab_Test_ID, Lab_Test_Diagnosis, Lab_Test_Name, Date_Of_Lab_Test_Diagnosis) VALUES (:Patient_ID, :Lab_Test_ID, :Lab_Test_Diagnosis, :Lab_Test_Name, :Date_Of_Lab_Test_Diagnosis)';
    $stmt = $db->prepare($sql); //prepare the sql statement

        $stmt->bindParam(':Patient_ID', $Patient_ID, SQLITE3_TEXT);
        $stmt->bindParam(':Lab_Test_Diagnosis', $_POST['Lab_Test_Diagnosis'], SQLITE3_TEXT);
        $stmt->bindParam(':Lab_Test_Name', $_POST['Lab_Test_Name'], SQLITE3_TEXT);  
        $stmt->bindParam(':Date_Of_Lab_Test_Diagnosis', $_POST['Date_Of_Lab_Test_Diagnosis'], SQLITE3_TEXT);



        $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $Lab_Test_ID = substr(str_shuffle($characters), 0, 7);


        $_SESSION["Lab_Test_ID"] = $Lab_Test_ID;
        $stmt->bindParam(':Lab_Test_ID', $Lab_Test_ID, SQLITE3_TEXT);

        //execute the sql statement
    $stmt->execute();

        //the logic
    if($stmt){
        $created = true;
    }

    return $created;
}
