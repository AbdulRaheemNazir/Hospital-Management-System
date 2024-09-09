<?php require("PractionerNavBar.php");
include_once("Practionercreatelabtests.php");
$Lab_Test_Diagnosis_Error = $Lab_Test_Name_Error = $Date_Of_Lab_Test_Diagnosis_Error = "";
$allFields = "yes";
$Patient_ID = $_GET['Patient_ID'];
if (isset($_POST['submit'])){

    if ($_POST['Lab_Test_Diagnosis']==""){
        $Lab_Test_Diagnosis_Error = "Lab Test Diagnosis is mandatory";
        $allFields = "no";
    }
    if ($_POST['Lab_Test_Name']==null){
        $Lab_Test_Name_Error = "Lab Test Name is mandatory";
        $allFields = "no";
    }
    if ($_POST['Date_Of_Lab_Test_Diagnosis']==null){
        $Date_Of_Lab_Test_Diagnosis_Error = "Date of Lab Test Diagnosis is mandatory";
        $allFields = "no";
    }


    if($allFields == "yes")
    {
        $createlabtest = createlabtest();
        header('Location: MoreMedicalDetailsofPatients_Practioner.php?Patient_ID='.$Patient_ID );
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
            <h3>Add new Lab Test</h3>
            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder="Lab Test Diagnosis" name = "Lab_Test_Diagnosis">
                <span class="text-danger"><?php echo $Lab_Test_Diagnosis_Error; ?></span>
            </div>            
            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder="Lab Test Name" name = "Lab_Test_Name">
                <span class="text-danger"><?php echo $Lab_Test_Name_Error; ?></span>
            </div>      
            <div class="form-group col-md-6">
                <input class="box" type="date" placeholder= "Date of Lab Test Diagnosis" name = "Date_Of_Lab_Test_Diagnosis">
                <span class="text-danger"><?php echo $Date_Of_Lab_Test_Diagnosis_Error; ?></span>
            </div>           
           
            <input type="submit" value="Add Lab Test" class="btn" name ="submit">
        </form>        
    </div>
</section>
