<?php require("receptionistNavBar.php");
session_start();
$HOOA_ID = $_SESSION['HOOA_ID'];
$db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
$sql = "SELECT * FROM Hospital_Officers_Or_Administrators WHERE HOOA_ID = '$HOOA_ID'";
$stmt = $db->prepare($sql);
$result= $stmt->execute();

$arrayResult = [];
while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}
?>
<div class="container">
    <main role="main" class="pb-3"> 
        <section class="home" id="home">
        <div class="content">
        <h3>Your Details</h3>
        </div>
        </section>
    </main>
</div>

    <div class="content">
               <div class="row">
                    <div class="table-container">
                        <table class="responsive-table">
                                <thead>
                                <tr>    
                                    <th>HOOA ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Role</th>                                   
                                    <th>Age</th>
                                    <th>Address</th>              
                                    <th>Contact</th>                                                          
                                    <th>Postcode</th>
                                <tr>                                        
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?php echo $arrayResult[0][0]?></td>
                                    <td><?php echo $arrayResult[0][1]?></td>
                                    <td><?php echo $arrayResult[0][2]?></td>
                                    <td><?php echo $arrayResult[0][3]?></td>
                                    <td><?php echo $arrayResult[0][4]?></td>
                                    <td><?php echo $arrayResult[0][5]?></td>
                                    <td><?php echo $arrayResult[0][6]?></td>
                                    <td><?php echo $arrayResult[0][8]?></td>
                                </tr>
                                    </tbody>
                            </table>    
                        </div>
                     </div>
                </div>
        </main>
    </div>


