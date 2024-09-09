<?php
session_start();
function createmedicaldiagnosis(){
    $Patient_ID = $_GET['Patient_ID'];
    $created = false;//this variable is used to indicate the creation is successfull or not
    $db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = 'INSERT INTO Patient_Medical_Diagnosis(Patient_ID, Patient_Medical_Diagnosis_ID, Patient_Medical_Diagnosis, Patient_Date_Of_Medical_Diagnosis) VALUES (:Patient_ID, :Patient_Medical_Diagnosis_ID, :Patient_Medical_Diagnosis, :Patient_Date_Of_Medical_Diagnosis)';
    $stmt = $db->prepare($sql); //prepare the sql statement

        $stmt->bindParam(':Patient_ID', $Patient_ID, SQLITE3_TEXT);
        $stmt->bindParam(':Patient_Medical_Diagnosis', $_POST['Patient_Medical_Diagnosis'], SQLITE3_TEXT);
        $stmt->bindParam(':Patient_Date_Of_Medical_Diagnosis', $_POST['Patient_Date_Of_Medical_Diagnosis'], SQLITE3_TEXT);  


        $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $Patient_Medical_Diagnosis_ID = substr(str_shuffle($characters), 0, 7);


        $_SESSION["Patient_Medical_Diagnosis_ID"] = $Patient_Medical_Diagnosis_ID;
        $stmt->bindParam(':Patient_Medical_Diagnosis_ID', $Patient_Medical_Diagnosis_ID, SQLITE3_TEXT);

        //execute the sql statement
    $stmt->execute();

        //the logic
    if($stmt){
        $created = true;
    }

    return $created;
}