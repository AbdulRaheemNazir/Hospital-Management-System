<?php require("AdminNavBar.php");

$db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
$HOOA_ID = $_GET['HOOA_ID'];
$sql = "SELECT * FROM Hospital_Officers_Or_Administrators WHERE HOOA_ID='$HOOA_ID'";
$stmt = $db->prepare($sql);
$stmt->bindParam(':HOOA_ID', $_GET['HOOA_ID'], SQLITE3_TEXT);
$result= $stmt->execute();

$arrayResult = [];
while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}

if (isset($_POST['delete'])){
$db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
$stmt = "DELETE FROM Hospital_Officers_Or_Administrators WHERE HOOA_ID = '$HOOA_ID'";
$sql = $db->prepare($stmt);
$sql->bindParam(':HOOA_ID', $_GET['HOOA_ID'], SQLITE3_TEXT);
$sql->execute();
header("Location:Admin_View_Hospital_Officials.php?deleted=true");
}
?>

<section class="book" id="book">
    <div class="row">
        <div class="image">
            <img src="image/book-img.svg" alt="">
        </div>
        <form method="post">
            <h3>Delete Hospital Official <?php echo $HOOA_ID?></h3>
<h2 style="color: red;">Are you sure want to delete this Hospital Official?</h2><br>
<div class="row">

<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">HOOA ID</label>
</div>
<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][0] ?></label>
</div>
</div>



<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">HOOA First Name</label>
</div>
<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][1] ?></label>
</div>
</div>








<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">HOOA Last Name</label>
</div>

<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][2] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">HOOA Role</label>
</div>

<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][3] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">HOOA Age</label>
</div>

<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][4] ?></label>
</div>
</div>



<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">HOOA Home Address</label>
</div>

<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][5] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">HOOA Contact</label>
</div>

<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][6] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">HOOA Status</label>
</div>

<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][7] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-2">
<label style="font-size: 20px; color:turquoise; font-weight: bold;">HOOA PostCode</label>
</div>

<div class="col-md-6">
<label style="font-size: 20px;"><?php echo $arrayResult[0][8] ?></label>
</div>
</div>





<div class="row">
<div class="col-5">
<form method="post">
<input type="hidden" name="HOOA_ID" value = "<?php echo $_GET['HOOA_ID'] ?>"><br>
<input type="submit" value="Delete" class="btn btn-danger" name="delete"><a href="Admin_View_Hospital_Officials.php" style="font-weight: bold; padding-left: 30px;">Back</a>
</form>
</div>
</div>
		</main>
	</div>