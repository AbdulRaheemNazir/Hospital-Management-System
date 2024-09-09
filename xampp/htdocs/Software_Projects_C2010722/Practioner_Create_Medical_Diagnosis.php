<?php require("PractionerNavBar.php");
include_once("Practionercreatemedicaldiagnosis.php");
$Patient_Medical_Diagnosis_Error = $Patient_Date_Of_Medical_Diagnosis_Error = "";
$allFields = "yes";
$Patient_ID = $_GET['Patient_ID'];
if (isset($_POST['submit'])){

    if ($_POST['Patient_Medical_Diagnosis']==""){
        $Patient_Medical_Diagnosis_Error = "Lab Test Diagnosis is mandatory";
        $allFields = "no";
    }
    if ($_POST['Patient_Date_Of_Medical_Diagnosis']==null){
        $Patient_Date_Of_Medical_Diagnosis_Error = "Lab Test Name is mandatory";
        $allFields = "no";
    }

    if($allFields == "yes")
    {
        $createmedicaldiagnosis = createmedicaldiagnosis();
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
            <h3>Add new Medical Diagnosis</h3>
            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder="Patient Medical Diagnosis" name = "Patient_Medical_Diagnosis">
                <span class="text-danger"><?php echo $Patient_Medical_Diagnosis_Error; ?></span>
            </div>            
            <div class="form-group col-md-6">
                <input class="box" type="date" placeholder= "Patient Date of Medical Diagnosis" name = "Patient_Date_Of_Medical_Diagnosis">
                <span class="text-danger"><?php echo $Patient_Date_Of_Medical_Diagnosis_Error; ?></span>
            </div>           
           
            <input type="submit" value="Add Medical Diagnosis" class="btn" name ="submit">
        </form>        
    </div>
</section>
