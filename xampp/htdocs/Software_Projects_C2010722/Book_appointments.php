<?php require("receptionistNavBar.php");
include_once("receptionistbookPateint.php");

$db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
$Patient_ID = $_GET['Patient_ID'];
$sql = "SELECT * FROM Appointments WHERE Patient_ID='$Patient_ID'";
$stmt = $db->prepare($sql);
$stmt->bindParam(':Patient_ID', $_GET['Patient_ID'], SQLITE3_TEXT);
$result= $stmt->execute();

$arrayResult = [];
while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}

$Patient_ID_Error =$HOOA_ID_Error =  $Appointment_Date_Error = $Appointment_Start_Time_Error = $Appointment_End_Time_Error = "";
$allFields = "yes";
if (isset($_POST['submit'])){
    if ($_POST['Patient_ID']==""){
        $Patient_ID_Error = "Patient ID is mandatory";
        $allFields = "no";
    }
    if ($_POST['HOOA_ID']==""){
        $Patient_ID_Error = "HOOA ID is mandatory";
        $allFields = "no";
    }
    if ($_POST['Appointment_Date']==null){
        $Appointment_Date_Error = "Appointment Date is mandatory";
        $allFields = "no";
    }
    if ($_POST['Appointment_Start_Time']==null){
        $Appointment_Start_Time_Error = "Appointment Start Time is mandatory";
        $allFields = "no";
    }
    if ($_POST['Appointment_End_Time']==""){
        $Appointment_End_Time_Error = "Appointment End Time is mandatory";
        $allFields = "no";
    }
    if($allFields == "yes")
    {
        $bookappointment = bookappointment();
        header('Location: Receptionist_View_Patient.php?bookappointment='.$bookappointment);
    }
}
?>


<!-- booking section starts   -->

<section class="book" id="book">
    <div class="row">
        <div class="image">
            <img src="image/book-img.svg" alt="">
        </div>
        <form method="post">
            <h3>Book Appointment for Patient</h3>
            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][1]; ?>" name = "Patient_ID">
                <span class="text-danger"><?php echo $Patient_ID_Error; ?></span>
            </div>            
            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder="HOOA ID" name = "HOOA_ID">
                <span class="text-danger"><?php echo $HOOA_ID_Error; ?></span>
            </div>      
            <div class="form-group col-md-6">
                <input class="box" type="date" value= "<?php echo $arrayResult[0][3]; ?>" name = "Appointment_Date">
                <span class="text-danger"><?php echo $Appointment_Date_Error; ?></span>
            </div>           
            <div class="form-group col-md-6">
                <input class="box" type="time" placeholder="Appointment Start" name = "Appointment_Start_Time">
                <span class="text-danger"><?php echo $Appointment_Start_Time_Error; ?></span>
            </div>      
            <div class="form-group col-md-6">
                <input class="box" type="time" placeholder="Appointment End" name = "Appointment_End_Time">
                <span class="text-danger"><?php echo $Appointment_End_Time_Error; ?></span>
            </div>            


            <input type="submit" value="Book Appointment" class="btn" name ="submit">
                <h2><div class="form-group col-md-3"><a href="Receptionist_View_Patient.php">Back</a></div></h2>
        </form>        
    </div>
</section>

