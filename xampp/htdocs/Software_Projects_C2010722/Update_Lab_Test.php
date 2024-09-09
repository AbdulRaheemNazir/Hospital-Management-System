<?php include("PractionerNavBar.php");

$db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
$Patient_ID = $_GET['Patient_ID'];
$Lab_Test_ID = $_GET['Lab_Test_ID'];
$sql = "SELECT * FROM Lab_Test WHERE Patient_ID='$Patient_ID'";
$stmt = $db->prepare($sql);
$stmt->bindParam(':Patient_ID', $_GET['Patient_ID'], SQLITE3_TEXT);
$result= $stmt->execute();

$arrayResult = [];
while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}

if (isset($_POST['submit'])){
    $db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = "UPDATE Lab_Test SET Lab_Test_Diagnosis = :Lab_Test_Diagnosis, Lab_Test_Name = :Lab_Test_Name, Date_Of_Lab_Test_Diagnosis = :Date_Of_Lab_Test_Diagnosis WHERE Patient_ID = '$Patient_ID' AND Lab_Test_ID = '$Lab_Test_ID'";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':Lab_Test_Name',$_POST['Lab_Test_Name'], SQLITE3_TEXT);
    $stmt->bindParam(':Lab_Test_Diagnosis',$_POST['Lab_Test_Diagnosis'], SQLITE3_TEXT); //discuss this!
    $stmt->bindParam(':Date_Of_Lab_Test_Diagnosis',$_POST['Date_Of_Lab_Test_Diagnosis'], SQLITE3_TEXT);


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
            <h3>Update Lab Tests</h3>

            <div class="form-group col-md-6">
                <h2>Lab Test Name</h2>
                <input class="box" type="text" value="<?php echo $arrayResult[0][3]; ?>" name = "Lab_Test_Name">
            </div>              
            <div class="form-group col-md-6">
                <h2>Lab Test Diagnosis</h2>
                <input class="box" type="text" value="<?php echo $arrayResult[0][2]; ?>" name = "Lab_Test_Diagnosis">
            </div>    
            <div class="form-group col-md-6">
                <h2>Date of Lab Test Diagnosis</h2>
                <input class="box" type="date" value="<?php echo $arrayResult[0][4]; ?>" name = "Date_Of_Lab_Test_Diagnosis">
            </div>    


            <input type="submit" value="Update" class="btn" name ="submit">
            <h2><div class="form-group col-md-3"><a href="MoreMedicalDetailsofPatients_Practioner.php?Patient_ID=<?php echo $arrayResult[0][0] ?> ">Back</a></div></h2>
        </form>        
    </div>
</section>
