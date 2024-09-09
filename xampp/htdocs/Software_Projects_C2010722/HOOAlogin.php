<?php require("NavBar.php");
include_once("checkHOOALogin.php");
$HOOA_ID_Error = $HOOA_Password_Error = $invalidMesg = "";
$allField = True;

if (isset($_POST['submit'])) {
    if ($_POST["HOOA_ID"]=="") {
        $HOOA_ID_Error = "HOOA ID is required";
        $allField = FALSE;
    } 
    if ($_POST["HOOA_Password"]==null) {
        $HOOA_Password_Error = "HOOA Password is required";
        $allField = FALSE;
    }
    if($allField == True)
    {
        $array_auth = verifyUsers(); //calling this function from checkstaffLogin.php. The function returns an array
        $array_status = verifystatus(); //calling this function from checkstaffLogin.php. The function returns an array    //change this to staff
        if (!empty($array_auth)){
            $HOOA_ID = $array_auth[0][0];
            $HOOA_Password = $array_auth[0][1];
            $HOOA_Status = $array_status[0][7];
            $HOOA_Role = $array_status[0][3];

            if($HOOA_Status != "active"){
                echo "Invalid Acount has been blocked";
                header("Location: HOOALogin.php?HOOA_ID=".$array_auth[0][0]);            
            }
            else{
                if($HOOA_Role == "Receptionist"){
                    header("Location: receptionistindex.php?HOOA_ID=".$array_auth[0][0]); 
                }
                elseif($HOOA_Role == "Practioner"){
                    header("Location: practionerindex.php?HOOA_ID=".$array_auth[0][0]); 
                }
                else{
                    header("Location: adminindex.php?HOOA_ID=".$array_auth[0][0]);  
                }
            }
        }
            else{
            $invalidMesg = "Invalid HOOA ID and Password";

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
            <h3>Sign In as HOOA</h3>
            <div class="form-group col-md-6">
                <input class="box" type="text" placeholder="HOOA ID" name = "HOOA_ID">
                <span class="text-danger"><h2><?php echo $HOOA_ID_Error; ?></h2></span>
            </div>            
            <div class="form-group col-md-6">
                <input class="box" type="password" placeholder="HOOA Password" name = "HOOA_Password">
                <span class="text-danger"><h2><?php echo $HOOA_Password_Error; ?></h2></span>
            </div>      
            <span class="text-danger"><h2><?php echo $invalidMesg; ?></h2></span> 
            <input type="submit" value="Log In" class="btn" name ="submit">
        </form>        
    </div>
</section>

<!-- booking section ends -->