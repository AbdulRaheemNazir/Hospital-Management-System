<?php require("receptionistNavBar.php");
include_once("receptionistcreatePateint.php");
$Patient_First_Name_Error = $Patient_Last_Name_Error = $Patient_Date_Of_Birth_Error = $Patient_Age_Error = $Patient_Sex_Error = $Patient_Address_Error = $Patient_Postcode_Error = $Patient_Contact_Information_Error = "";
$allFields = "yes";

if (isset($_POST['submit'])){

    if ($_POST['Patient_First_Name']==""){
        $Patient_First_Name_Error = "First name is mandatory";
        $allFields = "no";
    }
    if ($_POST['Patient_Last_Name']==null){
        $Patient_Last_Name_Error = "Last name is mandatory";
        $allFields = "no";
    }
    if ($_POST['Patient_Date_Of_Birth']==null){
        $Patient_Date_Of_Birth_Error = "Date of Birth is mandatory";
        $allFields = "no";
    }
    if ($_POST['Patient_Age']==""){
        $Patient_Age_Error = "Age is mandatory";
        $allFields = "no";
    }
    if ($_POST['Patient_Sex']==""){
        $Patient_Sex_Error = "Sex is mandatory";
        $allFields = "no";
    }
    if ($_POST['Patient_Address']==""){
        $Patient_Address_Error = "Address is mandatory";
        $allFields = "no";
    }
    if ($_POST['Patient_Postcode']==""){
        $Patient_Postcode_Error = "Post Code is mandatory";
        $allFields = "no";
    }
    if ($_POST['Patient_Contact_Information']==""){
        $Patient_Contact_Information_Error = "Contact Information is mandatory";
        $allFields = "no";
    }

    if($allFields == "yes")
    {
        $createpatient = createpatient();
        header('Location: receptionistcreatePateintsummary.php?createpatient='.$createpatient);
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
            <h3>Add new Patient</h3>
            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder="Patients First Name" name = "Patient_First_Name">
                <span class="text-danger"><?php echo $Patient_First_Name_Error; ?></span>
            </div>            
            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder="Patients Last Name" name = "Patient_Last_Name">
                <span class="text-danger"><?php echo $Patient_Last_Name_Error; ?></span>
            </div>      
            <div class="form-group col-md-6">
                <input class="box" type="date" placeholder= "Date of Birth (DD/MM/YYYY)" name = "Patient_Date_Of_Birth">
                <span class="text-danger"><?php echo $Patient_Date_Of_Birth_Error; ?></span>
            </div>           
            <div class="form-group col-md-6">
                <input class="box" type="number" placeholder="Patients Age" name = "Patient_Age">
                <span class="text-danger"><?php echo $Patient_Age_Error; ?></span>
            </div>      
            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder="Patients Sex" name = "Patient_Sex">
                <span class="text-danger"><?php echo $Patient_Sex_Error; ?></span>
            </div>            
            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder="Patients Home Address" name = "Patient_Address">
                <span class="text-danger"><?php echo $Patient_Address_Error; ?></span>
            </div>      

            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder="Patients Postcode" name = "Patient_Postcode">
                <span class="text-danger"><?php echo $Patient_Postcode_Error; ?></span>
            </div>     

            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder="Patient Contact Information" name = "Patient_Contact_Information">
                <span class="text-danger"><?php echo $Patient_Contact_Information_Error; ?></span>
            </div>     

            <input type="submit" value="Add Patient" class="btn" name ="submit">
        </form>        
    </div>
</section>