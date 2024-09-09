<?php require("receptionistNavBar.php");

$db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
$Patient_ID = $_GET['Patient_ID'];
$sql = "SELECT * FROM Patients WHERE Patient_ID='$Patient_ID'";
$stmt = $db->prepare($sql);
$stmt->bindParam(':Patient_ID', $_GET['Patient_ID'], SQLITE3_TEXT);
$result= $stmt->execute();

$arrayResult = [];
while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}

if (isset($_POST['delete'])){
	$db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
	$stmt = "DELETE FROM Patients WHERE Patient_ID = '$Patient_ID'";
	$sql = $db->prepare($stmt);
	$sql->bindParam(':Patient_ID', $_GET['Patient_ID'], SQLITE3_TEXT);
	$sql->execute();

	$created = false;
	if($created == false){
		$db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
		$stmt = "DELETE FROM Appointments WHERE Patient_ID = '$Patient_ID'";
		$sql = $db->prepare($stmt);
		$sql->bindParam(':Patient_ID', $_GET['Patient_ID'], SQLITE3_TEXT);
		$sql->execute();
	}
	header("Location:Receptionist_View_All_Appointments.php?deleted=true");


	}		
?>



<section class="book" id="book">
    <div class="row">
        <div class="image">
            <img src="image/book-img.svg" alt="">
        </div>
        <form method="post">
            <h3>Delete Patient <?php echo $Patient_ID?></h3>
<h2 style="color: red;">Are you sure want to delete this Patient?</h2><br>
<div class="row">





<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">Patient ID</label>
</div>

<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][0] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">Patient First Name</label>
</div>

<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][1] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">Patient Last Name</label>
</div>

<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][2] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">Patient Age</label>
</div>

<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][3] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">Patient Date Of Birth</label>
</div>

<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][4] ?></label>
</div>
</div>



<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">Patient Sex</label>
</div>

<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][5] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">Patient Postcode</label>
</div>

<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][6] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">Patient Contact Information</label>
</div>

<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][7] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">Patient Address</label>
</div>

<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][8] ?></label>
</div>
</div>






<div class="row">
<div class="col-5">
<form method="post">
<input type="hidden" name="Patient_ID" value = "<?php echo $_GET['Patient_ID'] ?>"><br>
<input type="submit" value="Delete" class="btn btn-danger" name="delete"><a href="Receptionist_View_Patient.php" style="font-weight: bold; padding-left: 30px;">Back</a>
</form>
</div>
</div>
		</main>
	</div>