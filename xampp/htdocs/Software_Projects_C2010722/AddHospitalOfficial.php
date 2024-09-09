<?php require("AdminNavBar.php");
include_once("admincreateHospitalOfficial.php");
$HOOA_First_Name_Error = $HOOA_Last_Name_Error = $HOOA_Role_Error = $HOOA_Age_Error = $HOOA_Home_Address_Error = $HOOA_Contact_Error = $HOOA_PostCode_Error = "";
$allFields = "yes";

if (isset($_POST['submit'])){

    if ($_POST['HOOA_First_Name']==""){
        $HOOA_First_Name_Error = "First name is mandatory";
        $allFields = "no";
    }
    if ($_POST['HOOA_Last_Name']==null){
        $HOOA_Last_Name_Error = "Last name is mandatory";
        $allFields = "no";
    }
    if ($_POST['HOOA_Role']==null){
        $HOOA_Role_Error = "Role is mandatory";
        $allFields = "no";
    }
    if ($_POST['HOOA_Age']==""){
        $HOOA_Age_Error = "Age is mandatory";
        $allFields = "no";
    }
    if ($_POST['HOOA_Home_Address']==""){
        $HOOA_Home_Address_Error = "Address is mandatory";
        $allFields = "no";
    }
    if ($_POST['HOOA_Contact']==""){
        $HOOA_Contact_Error = "HOOA Contact is mandatory";
        $allFields = "no";
    }
    if ($_POST['HOOA_PostCode']==""){
        $HOOA_PostCode_Error = "HOOA PostCode is mandatory";
        $allFields = "no";
    }

    if($allFields == "yes")
    {
        $createHospitalOfficial = createHospitalOfficial();
        header('Location: admincreateHospitalOfficialsummary.php?createHospitalOfficial='.$createHospitalOfficial);
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
            <h3>Add new Hospital Official</h3>
            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder="HOOA First Name" name = "HOOA_First_Name">
                <span class="text-danger"><?php echo $HOOA_First_Name_Error; ?></span>
            </div>            
            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder="HOOA Last Name" name = "HOOA_Last_Name">
                <span class="text-danger"><?php echo $HOOA_Last_Name_Error; ?></span>
            </div>      
            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder= "HOOA Role" name = "HOOA_Role">
                <span class="text-danger"><?php echo $HOOA_Role_Error; ?></span>
            </div>           
            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder="HOOA Age" name = "HOOA_Age">
                <span class="text-danger"><?php echo $HOOA_Age_Error; ?></span>
            </div>      
            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder="HOOA Home Address" name = "HOOA_Home_Address">
                <span class="text-danger"><?php echo $HOOA_Home_Address_Error; ?></span>
            </div>            
            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder="HOOA Contact" name = "HOOA_Contact">
                <span class="text-danger"><?php echo $HOOA_Contact_Error; ?></span>
            </div>      

            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder="HOOA Postcode" name = "HOOA_PostCode">
                <span class="text-danger"><?php echo $HOOA_PostCode_Error; ?></span>
            </div>      
            <input type="submit" value="Add Hospital Official" class="btn" name ="submit">
        </form>        
    </div>
</section>