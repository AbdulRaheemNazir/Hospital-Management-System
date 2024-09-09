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
    $sql = "UPDATE Patients SET Patient_First_Name = :Patient_First_Name, Patient_Last_Name = :Patient_Last_Name, Patient_Age = :Patient_Age, Patient_Date_Of_Birth = :Patient_Date_Of_Birth, Patient_Sex = :Patient_Sex, Patient_Postcode = :Patient_Postcode, Patient_Contact_Information = :Patient_Contact_Information, Patient_Address = :Patient_Address, Patient_Password = :Patient_Password, Patient_Messages = :Patient_Messages WHERE Patient_ID = '$Patient_ID'";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':Patient_First_Name',$_POST['Patient_First_Name'], SQLITE3_TEXT);
    $stmt->bindParam(':Patient_Last_Name',$_POST['Patient_Last_Name'], SQLITE3_TEXT); //discuss this!
    $stmt->bindParam(':Patient_Age',$_POST['Patient_Age'], SQLITE3_TEXT);
    $stmt->bindParam(':Patient_Date_Of_Birth',$_POST['Patient_Date_Of_Birth'], SQLITE3_TEXT);
    $stmt->bindParam(':Patient_Sex',$_POST['Patient_Sex'], SQLITE3_TEXT);
    $stmt->bindParam(':Patient_Postcode',$_POST['Patient_Postcode'], SQLITE3_TEXT);
    $stmt->bindParam(':Patient_Contact_Information',$_POST['Patient_Contact_Information'], SQLITE3_TEXT);
    $stmt->bindParam(':Patient_Address',$_POST['Patient_Address'], SQLITE3_TEXT);
    $stmt->bindParam(':Patient_Password',$_POST['Patient_Password'], SQLITE3_TEXT);


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
            <h3>Update Patient Details</h3>
            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][1]; ?>" name = "Patient_First_Name">
            </div>            
            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][2]; ?>" name = "Patient_Last_Name">
            </div>      
            <div class="form-group col-md-6">
                <input class="box" type="text" value= "<?php echo $arrayResult[0][3]; ?>" name = "Patient_Age">
            </div>           
            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][4]; ?>" name = "Patient_Date_Of_Birth">
            </div>      
            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][5]; ?>" name = "Patient_Sex">
            </div>            
            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][6]; ?>" name = "Patient_Postcode">
            </div>      

            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][7]; ?>" name = "Patient_Contact_Information">
            </div>      

            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][8]; ?>" name = "Patient_Address">
            </div>      

            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][9]; ?>" name = "Patient_Password">
            </div>      

            <input type="submit" value="Update" class="btn" name ="submit">
        <h2><div class="form-group col-md-3"><a href="Receptionist_View_Patient.php">Back</a></div></h2>            
        </form>        

    </div>
</section>

