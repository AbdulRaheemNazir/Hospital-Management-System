<?php require("NavBar.php");
include_once("checkPatientLogin.php");
$Patient_ID_Error = $Patient_Password_Error = $invalidMesg = "";
$allField = True;

if (isset($_POST['submit'])) {
    if ($_POST["Patient_ID"]=="") {
        $Patient_ID_Error = "Patient ID is required";
        $allField = FALSE;
    } 
      
    if ($_POST["Patient_Password"]==null) {
        $Patient_Password_Error = "Password is required";
        $allField = FALSE;
    }
    if($allField == True)
    {
        $array_patient = verifyUsers();
        if (!empty($array_patient)){      
            if ($array_patient[0])
            {
                $Patient_ID = $array_patient[0][0];
                $Patient_Password = $array_patient[0][6];
                header("Location: PatientIndex.php"); 
                exit();
            }
        }
        else{
            $invalidMesg = "Invalid Patient ID and Password!";
        }
        
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
            <h3>Sign In as Patient</h3>
            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder="Patient ID" name = "Patient_ID">
                <span class="text-danger"><h2><?php echo $Patient_ID_Error; ?></h2></span>
            </div>            
            <div class="form-group col-md-6">
                <input class="box" type="password" placeholder="Patient Password" name = "Patient_Password">
                <span class="text-danger"><h2><?php echo $Patient_Password_Error; ?></h2></span>
            </div>     
            <span class="text-danger"><h2><?php echo $invalidMesg; ?></h2></span>     
            <input type="submit" value="Log In" class="btn" name ="submit">
        </form>        
    </div>
</section>

<!-- booking section ends -->