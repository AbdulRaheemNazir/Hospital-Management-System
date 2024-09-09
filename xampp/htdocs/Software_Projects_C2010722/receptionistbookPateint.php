<?php

session_start();
function bookappointment(){
    $created = false;//this variable is used to indicate the creation is successfull or not
    $db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = 'INSERT INTO Appointments(Appointment_ID, Patient_ID, HOOA_ID, Appointment_Date, Appointment_Start_Time, Appointment_End_Time) VALUES (:Appointment_ID, :Patient_ID, :HOOA_ID, :Appointment_Date, :Appointment_Start_Time, :Appointment_End_Time)';
    $stmt = $db->prepare($sql); //prepare the sql statement

    function appointmentid() {
        $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $Appointment_ID = substr(str_shuffle($characters), 0, 7);
        return $Appointment_ID;
    }

    $Appointment_ID = appointmentid();
    $stmt->bindParam(':Appointment_ID', $Appointment_ID, SQLITE3_TEXT);



    $stmt->bindParam(':Patient_ID', $_POST['Patient_ID'], SQLITE3_TEXT);
    $stmt->bindParam(':Patient_Date_Of_Birth', $_POST['Patient_Date_Of_Birth'], SQLITE3_TEXT);
    $stmt->bindParam(':HOOA_ID', $_POST['HOOA_ID'], SQLITE3_TEXT);
    $stmt->bindParam(':Appointment_Date', $_POST['Appointment_Date'], SQLITE3_TEXT);
    $stmt->bindParam(':Appointment_Start_Time', $_POST['Appointment_Start_Time'], SQLITE3_TEXT);
    $stmt->bindParam(':Appointment_End_Time', $_POST['Appointment_End_Time'], SQLITE3_TEXT);




        //execute the sql statement
    $stmt->execute();

        //the logic
    if($stmt){
        $created = true;
    }

    return $created;
}