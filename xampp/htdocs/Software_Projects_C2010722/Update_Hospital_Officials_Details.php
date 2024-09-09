<?php include("AdminNavBar.php");

$db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
$HOOA_ID = $_GET['HOOA_ID'];
$sql = "SELECT * FROM Hospital_Officers_Or_Administrators WHERE HOOA_ID='$HOOA_ID'";
$stmt = $db->prepare($sql);
$stmt->bindParam(':HOOA_ID', $_GET['HOOA_ID'], SQLITE3_TEXT);
$result= $stmt->execute();

$arrayResult = [];
while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}


    $db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $HOOA_ID = $_GET['HOOA_ID'];
    $sql = "SELECT * FROM Authentication WHERE HOOA_ID='$HOOA_ID'";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':HOOA_ID', $_GET['HOOA_ID'], SQLITE3_TEXT);
    $result2= $stmt->execute();

    $arrayResult2 = [];
    while($row2=$result2->fetchArray(SQLITE3_NUM)){
        $arrayResult2 [] = $row2;
    }




if (isset($_POST['submit'])){
    $db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = "UPDATE Hospital_Officers_Or_Administrators SET HOOA_First_Name = :HOOA_First_Name, HOOA_Last_Name = :HOOA_Last_Name, HOOA_Role = :HOOA_Role, HOOA_Age = :HOOA_Age, HOOA_Home_Address = :HOOA_Home_Address, HOOA_Contact = :HOOA_Contact, HOOA_Status = :HOOA_Status, HOOA_PostCode = :HOOA_PostCode, HOOA_Messages = :HOOA_Messages WHERE HOOA_ID = '$HOOA_ID'";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':HOOA_First_Name',$_POST['HOOA_First_Name'], SQLITE3_TEXT);
    $stmt->bindParam(':HOOA_Last_Name',$_POST['HOOA_Last_Name'], SQLITE3_TEXT); //discuss this!
    $stmt->bindParam(':HOOA_Role',$_POST['HOOA_Role'], SQLITE3_TEXT);
    $stmt->bindParam(':HOOA_Age',$_POST['HOOA_Age'], SQLITE3_TEXT);
    $stmt->bindParam(':HOOA_Home_Address',$_POST['HOOA_Home_Address'], SQLITE3_TEXT);
    $stmt->bindParam(':HOOA_Contact',$_POST['HOOA_Contact'], SQLITE3_TEXT);
    $stmt->bindParam(':HOOA_Status',$_POST['HOOA_Status'], SQLITE3_TEXT);
    $stmt->bindParam(':HOOA_PostCode',$_POST['HOOA_PostCode'], SQLITE3_TEXT);
    $stmt->bindParam(':HOOA_Messages',$_POST['HOOA_Messages'], SQLITE3_TEXT);
    $stmt->execute();


    $db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = "UPDATE Authentication SET HOOA_ID = :HOOA_ID, HOOA_Password = :HOOA_Password WHERE HOOA_ID = '$HOOA_ID'";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':HOOA_ID',$_GET['HOOA_ID'], SQLITE3_TEXT);    
    $stmt->bindParam(':HOOA_Password',$_POST['HOOA_Password'], SQLITE3_TEXT);
    $stmt->execute();    

    header('Location: Admin_View_Hospital_Officials.php');
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
            <h3>Update Hospital Official Details</h3>
            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][1]; ?>" name = "HOOA_First_Name">
            </div>            
            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][2]; ?>" name = "HOOA_Last_Name">
            </div>      
            <div class="form-group col-md-6">
                <input class="box" type="text" value= "<?php echo $arrayResult[0][3]; ?>" name = "HOOA_Role">
            </div>           
            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][4]; ?>" name = "HOOA_Age">
            </div>      
            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][5]; ?>" name = "HOOA_Home_Address">
            </div>            
            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][6]; ?>" name = "HOOA_Contact">
            </div>      

            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][7]; ?>" name = "HOOA_Status">
            </div>      

            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][8]; ?>" name = "HOOA_PostCode">
            </div>      

            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][9]; ?>" name = "HOOA_Messages">
            </div>      

            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult2[0][1]; ?>" name = "HOOA_Password">
            </div>      


            <input type="submit" value="Update" class="btn" name ="submit">
        <h2><div class="form-group col-md-3"><a href="Admin_View_Hospital_Officials.php">Back</a></div></h2>            
        </form>        

    </div>
</section>