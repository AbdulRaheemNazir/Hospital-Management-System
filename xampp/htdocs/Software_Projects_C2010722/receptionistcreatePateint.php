<?php
session_start();
function createpatient(){
    $created = false;//this variable is used to indicate the creation is successfull or not
    $db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = 'INSERT INTO Patients(Patient_ID, Patient_First_Name, Patient_Last_Name, Patient_Date_Of_Birth, Patient_Age, Patient_Sex, Patient_Address, Patient_Postcode, Patient_Contact_Information, Patient_Password, Patient_Messages) VALUES (:Patient_ID, :Patient_First_Name, :Patient_Last_Name, :Patient_Date_Of_Birth, :Patient_Age, :Patient_Sex, :Patient_Address, :Patient_Postcode, :Patient_Contact_Information, :Patient_Password, :Patient_Messages)';
    $stmt = $db->prepare($sql); //prepare the sql statement
        $stmt->bindParam(':Patient_First_Name', $_POST['Patient_First_Name'], SQLITE3_TEXT);
        $stmt->bindParam(':Patient_Last_Name', $_POST['Patient_Last_Name'], SQLITE3_TEXT);



        $fname = $_POST['Patient_First_Name'];
        $lname = $_POST['Patient_Last_Name'];
        $random = mt_rand(100,999); 

        $x = "";
        $x = $fname[0];
        $b = "";
        $b = $fname[1];
        $c = "";
        $c = $fname[2];
        $q = substr($lname,-2);
        $Patient_ID = $x.$b.$c.$q.$random;
        $_SESSION["Patient_ID"] = $Patient_ID;
        $stmt->bindParam(':Patient_ID', $Patient_ID, SQLITE3_TEXT);

        $stmt->bindParam(':Patient_Date_Of_Birth', $_POST['Patient_Date_Of_Birth'], SQLITE3_TEXT);
        $stmt->bindParam(':Patient_Age', $_POST['Patient_Age'], SQLITE3_TEXT);
        $stmt->bindParam(':Patient_Sex', $_POST['Patient_Sex'], SQLITE3_TEXT);
        $stmt->bindParam(':Patient_Address', $_POST['Patient_Address'], SQLITE3_TEXT);
        $stmt->bindParam(':Patient_Postcode', $_POST['Patient_Postcode'], SQLITE3_TEXT);
        $stmt->bindParam(':Patient_Contact_Information', $_POST['Patient_Contact_Information'], SQLITE3_TEXT);


        $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $Patient_Password = substr(str_shuffle($characters), 0, 7);


        $_SESSION["Patient_Password"] = $Patient_Password;
        $stmt->bindParam(':Patient_Password', $Patient_Password, SQLITE3_TEXT);

        $Patient_Messages = "Welcome to your new account";
        $stmt->bindParam(':Patient_Messages', $Patient_Messages, SQLITE3_TEXT);


        //execute the sql statement
    $stmt->execute();







 

    $created2 = true;
    if($created2 = true){
    $db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = 'INSERT INTO Patient_Medical_Diagnosis(Patient_ID, Patient_Medical_Diagnosis_ID, Patient_Medical_Diagnosis, Patient_Date_Of_Medical_Diagnosis) VALUES (:Patient_ID, :Patient_Medical_Diagnosis_ID, :Patient_Medical_Diagnosis, :Patient_Date_Of_Medical_Diagnosis)';
    $stmt = $db->prepare($sql); //prepare the sql statement

    $_SESSION["Patient_ID"] = $Patient_ID;
    $stmt->bindParam(':Patient_ID', $Patient_ID, SQLITE3_TEXT);
    $blank = "N/A";
    $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $Patient_Medical_Diagnosis_ID = substr(str_shuffle($characters), 0, 7);
    $_SESSION["Patient_Medical_Diagnosis_ID"] = $Patient_Medical_Diagnosis_ID;

    $stmt->bindParam(':Patient_Medical_Diagnosis_ID', $Patient_Medical_Diagnosis_ID, SQLITE3_TEXT);
    $stmt->bindParam(':Patient_Medical_Diagnosis', $blank, SQLITE3_TEXT);
    $stmt->bindParam(':Patient_Date_Of_Medical_Diagnosis', $blank, SQLITE3_TEXT);


    //execute the sql statement
    $stmt->execute();
    }



    $created3 = true;
    if($created3 = true){
    $db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = 'INSERT INTO Lab_Test(Patient_ID, Lab_Test_ID, Lab_Test_Diagnosis, Lab_Test_Name, Date_Of_Lab_Test_Diagnosis) VALUES (:Patient_ID, :Lab_Test_ID, :Lab_Test_Diagnosis, :Lab_Test_Name, :Date_Of_Lab_Test_Diagnosis)';
    $stmt = $db->prepare($sql); //prepare the sql statement

    $_SESSION["Patient_ID"] = $Patient_ID;
    $blank = "N/A";
    $stmt->bindParam(':Patient_ID', $Patient_ID, SQLITE3_TEXT);

    $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $Lab_Test_ID = substr(str_shuffle($characters), 0, 7);
    $_SESSION["Lab_Test_ID"] = $Lab_Test_ID;

    $stmt->bindParam(':Lab_Test_ID', $Lab_Test_ID, SQLITE3_TEXT);
    $stmt->bindParam(':Lab_Test_Diagnosis', $blank, SQLITE3_TEXT);
    $stmt->bindParam(':Lab_Test_Name', $blank, SQLITE3_TEXT);
    $stmt->bindParam(':Date_Of_Lab_Test_Diagnosis', $blank, SQLITE3_TEXT);
    //execute the sql statement
    $stmt->execute();
    }






















        //the logic
    if($stmt){
        $created = true;
    }

    return $created;
}