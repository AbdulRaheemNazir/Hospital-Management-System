<?php require("PractionerNavBar.php");
$Patient_ID = $_GET['Patient_ID'];
$db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
$sql = "SELECT * FROM Patients WHERE Patient_ID = '$Patient_ID'";
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
        <h3>Patients Details</h3>
        </div>
        </section>
    </main>
</div>




                   <div class="row">
                        <div class="col-12">
    <div class="content">
               <div class="row">
                    <div class="table-container">
                        <table id="myTable2" class="responsive-table">
                                <thead>
                                        <tr>  
                                    <th>Patient ID</th>
                                    <th>Patient First Name</th>
                                    <th>Patient Last Name</th>
                                    <th>Patient Age</th>
                                    <th>Patient Date Of Birth</th>
                                    <th>Patient Sex</th>
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

                                </tr>
                                    </tbody>
                            </table>    
                        </div>
                     </div>
                </div>
        </main>
        
    </div>
