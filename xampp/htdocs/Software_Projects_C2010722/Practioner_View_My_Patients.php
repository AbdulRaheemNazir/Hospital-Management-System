<?php require("PractionerNavBar.php");
session_start();
$HOOA_ID = $_SESSION['HOOA_ID'];
$db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
$sql = "SELECT * FROM Appointments WHERE HOOA_ID = '$HOOA_ID'";
$stmt = $db->prepare($sql);
$result= $stmt->execute();

$arrayResult = [];
while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}
?>
<script>
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<div class="container">
    <main role="main" class="pb-3"> 
        <section class="home" id="home">
        <div class="content">
        <h3>View Your Patients</h3>
        </div>
        </section>
    </main>
</div>


                   <div class="row">
                        <div class="col-12">
                <input type="text" id="myInput2" placeholder="Search" onkeyup="myFunction2()">
    <div class="content">
               <div class="row">
                    <div class="table-container">
                        <table id="myTable2" class="responsive-table">
                                <thead>
                                        <tr>  
                                    <th>Appointment ID</th>
                                    <th>Patient ID</th>                                    
                                    <th>Appointment Date</th>
                                    <th>Appointment Start Time</th>
                                    <th>Appointment End Time</th>
                                    <th>Patient Details</th>                                    
                                    <th>Patient Medical Details</th>
                                <tr>                                        
                                </thead>
                                <?php
                                    for ($i=0; $i<count($arrayResult); $i++):
                                ?>
                                <tbody>
                                <tr>
                                    <td><?php echo $arrayResult[$i][0]?></td>
                                    <td><?php echo $arrayResult[$i][1]?></td>
                                    <td><?php echo $arrayResult[$i][3]?></td>
                                    <td><?php echo $arrayResult[$i][4]?></td>
                                    <td><?php echo $arrayResult[$i][5]?></td>
                                    <td><a href="MoreDetailsofPatients_Practioner.php?Patient_ID=<?php echo $arrayResult[$i][1]; ?>">Patient Details</a></td>      
                                    <td><a href="MoreMedicalDetailsofPatients_Practioner.php?Patient_ID=<?php echo $arrayResult[$i][1] ?>">Patient Medical Details</a></td>
                                    <?php 
                                    $_SESSION['Patient_ID'] = $arrayResult[$i][1];
                                    ?>
                                </tr>
                                <?php endfor;?>
                                    </tbody>
                            </table>    
                        </div>
                     </div>
                </div>
        </main>
        
    </div>