<?php include("receptionistNavBar.php");

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

if (isset($_POST['submit'])){
    $db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = "UPDATE Patients SET Patient_Messages = :Patient_Messages WHERE Patient_ID = '$Patient_ID'";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':Patient_Messages',$_POST['Patient_Messages'], SQLITE3_TEXT);

    $stmt->execute();
    header('Location: Receptionist_View_Patient.php');
}
 ?>
    <div class="container">
            <main role="main" class="pb-3"> 
            <h2>  </h2>
            <h4>  </h4>
                   <div class="row">
                        <div class="col-12">

                        </div>
                     </div>
        </main>
    </div>

<section class="book" id="book">
    <div class="row">
        <div class="image">
            <img src="image/book-img.svg" alt="">
        </div>
        <form method="post">
            <h3>Update Patient Messages</h3>
            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][10]; ?>" name = "Patient_Messages">
            </div>            

            <input type="submit" value="Update" class="btn" name ="submit">
        <h2><div class="form-group col-md-3"><a href="Receptionist_View_Patient.php">Back</a></div>   </h2>         
        </form>        

    </div>
</section>

