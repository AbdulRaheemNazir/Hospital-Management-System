<?php
session_start();
function createHospitalOfficial(){
    $created = false;//this variable is used to indicate the creation is successfull or not
    $db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = 'INSERT INTO Hospital_Officers_Or_Administrators(HOOA_ID, HOOA_First_Name, HOOA_Last_Name, HOOA_Role, HOOA_Age, HOOA_Home_Address, HOOA_Contact, HOOA_Status, HOOA_PostCode, HOOA_Messages) VALUES (:HOOA_ID, :HOOA_First_Name, :HOOA_Last_Name, :HOOA_Role, :HOOA_Age, :HOOA_Home_Address, :HOOA_Contact, :HOOA_Status, :HOOA_PostCode, :HOOA_Messages)';
    $stmt = $db->prepare($sql); //prepare the sql statement
        $stmt->bindParam(':HOOA_First_Name', $_POST['HOOA_First_Name'], SQLITE3_TEXT);
        $stmt->bindParam(':HOOA_Last_Name', $_POST['HOOA_Last_Name'], SQLITE3_TEXT);



        $fname = $_POST['HOOA_First_Name'];
        $lname = $_POST['HOOA_Last_Name'];
        $random = mt_rand(100,999); 

        $x = "";
        $x = $fname[0];
        $b = "";
        $b = $fname[1];
        $c = "";
        $c = $fname[2];
        $q = substr($lname,-2);
        $HOOA_ID = $x.$b.$c.$q.$random;
        $_SESSION["HOOA_ID"] = $HOOA_ID;
        $stmt->bindParam(':HOOA_ID', $HOOA_ID, SQLITE3_TEXT);


        $stmt->bindParam(':HOOA_First_Name', $_POST['HOOA_First_Name'], SQLITE3_TEXT);
        $stmt->bindParam(':HOOA_Last_Name', $_POST['HOOA_Last_Name'], SQLITE3_TEXT);
        $stmt->bindParam(':HOOA_Role', $_POST['HOOA_Role'], SQLITE3_TEXT);
        $stmt->bindParam(':HOOA_Age', $_POST['HOOA_Age'], SQLITE3_TEXT);
        $stmt->bindParam(':HOOA_Home_Address', $_POST['HOOA_Home_Address'], SQLITE3_TEXT);
        $stmt->bindParam(':HOOA_Contact', $_POST['HOOA_Contact'], SQLITE3_TEXT);

        $HOOA_Status = 'active';
        $stmt->bindParam(':HOOA_Status', $HOOA_Status, SQLITE3_TEXT);

        $stmt->bindParam(':HOOA_PostCode', $_POST['HOOA_PostCode'], SQLITE3_TEXT);


        $HOOA_Messages = "Welcome to your new account";
        $stmt->bindParam(':HOOA_Messages', $HOOA_Messages, SQLITE3_TEXT);

        $stmt->execute();

        $db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
        $sql = 'INSERT INTO Authentication(HOOA_ID, HOOA_Password) VALUES (:HOOA_ID, :HOOA_Password)';
        $stmt = $db->prepare($sql); //prepare the sql statement
        $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $HOOA_Password = substr(str_shuffle($characters), 0, 7);

        $stmt->bindParam(':HOOA_ID', $HOOA_ID, SQLITE3_TEXT);
        $_SESSION["HOOA_Password"] = $HOOA_Password;
        $stmt->bindParam(':HOOA_Password', $HOOA_Password, SQLITE3_TEXT);

        $stmt->execute();

            //the logic
        if($stmt){
            $created = true;
        }

        return $created;
}