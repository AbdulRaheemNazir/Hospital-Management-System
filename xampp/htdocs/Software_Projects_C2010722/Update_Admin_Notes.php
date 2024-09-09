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

if (isset($_POST['submit'])){
    $db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
    $sql = "UPDATE Hospital_Officers_Or_Administrators SET HOOA_Messages = :HOOA_Messages WHERE HOOA_ID = '$HOOA_ID'";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':HOOA_Messages',$_POST['HOOA_Messages'], SQLITE3_TEXT);


    $stmt->execute();
    header('Location: adminindex.php');
}
 ?>

<!-- booking section starts   -->

<section class="book" id="book">
    <div class="row">
        <div class="image">
            <img src="image/book-img.svg" alt="">
        </div>
        <form method="post">
            <h3>Update Notes</h3>
            <div class="form-group col-md-6">
                <input class="box" type="text" value="<?php echo $arrayResult[0][9]; ?>" name = "HOOA_Messages">
            </div>              
            <input type="submit" value="Update" class="btn" name ="submit">
            <h2><div class="form-group col-md-3"><a href="adminindex.php">Back</a></div></h2>
        </form>        
    </div>
</section>

<!-- booking section ends -->