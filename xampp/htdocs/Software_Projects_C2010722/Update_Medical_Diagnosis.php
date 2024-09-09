<?php include("PractionerNavBar.php");

$db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
$Patient_ID = $_GET['Patient_ID'];
$Patient_Medical_Diagnosis_ID = $_GET['Patient_Medical_Diagnosis_ID'];
$sql = "SELECT * FROM Patient_Medical_Diagnosis WHERE Patient_ID='$Patient_ID'";
$stmt = $db->prepare($sql);
$stmt->bindParam(':Patient_ID', $_GET['Patient_ID'], SQLITE3_TEXT);
$result= $stmt->execute();

$arrayResult = [];
while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}

if (isset($_POST['submit'])){
    $db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = "UPDATE Patient_Medical_Diagnosis SET Patient_Medical_Diagnosis = :Patient_Medical_Diagnosis, Patient_Date_Of_Medical_Diagnosis = :Patient_Date_Of_Medical_Diagnosis WHERE Patient_ID = '$Patient_ID' AND Patient_Medical_Diagnosis_ID = '$Patient_Medical_Diagnosis_ID'";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':Patient_Medical_Diagnosis',$_POST['Patient_Medical_Diagnosis'], SQLITE3_TEXT);
    $stmt->bindParam(':Patient_Date_Of_Medical_Diagnosis',$_POST['Patient_Date_Of_Medical_Diagnosis'], SQLITE3_TEXT);


    $stmt->execute();
header('Location: MoreMedicalDetailsofPatients_Practioner.php?Patient_ID='.$arrayResult[0][0]);

    exit;
}

 ?>


<!-- booking section starts   -->

<section class="book" id="book">
    <div class="row">
        <div class="image">
            <img src="image/book-img.svg" alt="">
        </div>
        <form method="post">
            <h3>Update Medical Diagnosis</h3>

            <div class="form-group col-md-6">
                <h2>Medical Diagnosis</h2>
                <input class="box" type="text" value="<?php echo $arrayResult[0][3]; ?>" name = "Patient_Medical_Diagnosis">
            </div>              
            <div class="form-group col-md-6">
                <h2>Date of Medical Diagnosis</h2>
                <input class="box" type="date" value="<?php echo $arrayResult[0][2]; ?>" name = "Patient_Date_Of_Medical_Diagnosis">
            </div>    


            <input type="submit" value="Update" class="btn" name ="submit">
            <h2><div class="form-group col-md-3"><a href="MoreMedicalDetailsofPatients_Practioner.php?Patient_ID=<?php echo $arrayResult[0][0] ?> ">Back</a></div></h2>
        </form>        
    </div>
</section>
