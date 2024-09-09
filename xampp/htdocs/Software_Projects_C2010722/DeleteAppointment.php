<?php require("receptionistNavBar.php");

$db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
$Appointment_ID = $_GET['Appointment_ID'];
$sql = "SELECT * FROM Appointments WHERE Appointment_ID='$Appointment_ID'";
$stmt = $db->prepare($sql);
$stmt->bindParam(':Appointment_ID', $_GET['Appointment_ID'], SQLITE3_TEXT);
$result= $stmt->execute();

$arrayResult = [];
while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}


if (isset($_POST['delete'])){
$db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
$stmt = "DELETE FROM Appointments WHERE Appointment_ID = '$Appointment_ID'";
$sql = $db->prepare($stmt);
$sql->bindParam(':Appointment_ID', $_GET['Appointment_ID'], SQLITE3_TEXT);
$sql->execute();
header("Location:Receptionist_View_All_Appointments.php?deleted=true");
}
?>






























<section class="book" id="book">
    <div class="row">
        <div class="image">
            <img src="image/book-img.svg" alt="">
        </div>
        <form method="post">
            <h3>Delete Appointment <?php echo $Appointment_ID?></h3>
<h2 style="color: red;">Are you sure want to delete this Appointment?</h2><br>
<div class="row">

<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">Patient ID</label>
</div>
<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][1] ?></label>
</div>
</div>



<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">HOOA ID</label>
</div>
<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][2] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">Appointment Date</label>
</div>
<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][3] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">Appointment Start Time</label>
</div>
<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][4] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">Appointment End Time</label>
</div>
<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][5] ?></label>
</div>
</div>


<div class="row">
<div class="col-5">
<form method="post">
<input type="hidden" name="Appointment_ID" value = "<?php echo $_GET['Appointment_ID'] ?>"><br>
<input type="submit" value="Delete" class="btn btn-danger" name="delete"><a href="Receptionist_View_All_Appointments.php" style="font-weight: bold; padding-left: 30px;">Back</a>
</form>
</div>
</div>
		</main>
	</div>

