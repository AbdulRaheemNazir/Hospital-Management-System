<?php require("PractionerNavBar.php");
session_start();
include_once("Patient_Medical_Diagnosis.php");
$array_medicaldiagnosis = Patient_Medicaldiagnosis();

$Patient_ID = $_GET['Patient_ID'];
$db = new SQLite3('C:\xampp\Software_Projects_C2010722_Database\Hospital_Database.db');
$sql = "SELECT * FROM Lab_Test WHERE Patient_ID = '$Patient_ID'";
$stmt = $db->prepare($sql);
$result= $stmt->execute();

$arrayResult = [];
while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}

?>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
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

function myFunction3() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable3");
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
        <h3>Lab Test - Records</h3>
<a href="Practioner_Create_Lab_Test.php?Patient_ID=<?php echo $array_medicaldiagnosis[0][0] ?>"><h1>Create Lab Test</h1></a>
        </div>
        </section>
    </main>
</div>

<div class="content">
    <div class="row">
        <div class="table-container">
            <div class="search-wrapper">
                <input type="text" id="myInput" placeholder="Search" onkeyup="myFunction()">
            </div>
            <table id="myTable" class="responsive-table">
                <thead>
                    <tr>  
                        <th>Lab Test ID</th>
                        <th>Lab Test Diagnosis</th>
                        <th>Lab Test Name</th>
                        <th>Date Of Lab Test Diagnosis</th>
                        <th>Update Lab Test</th>                        
                    </tr>                                        
                </thead>
                <tbody>
                    <?php for ($i=0; $i<count($arrayResult); $i++): ?>
                    <tr>
                        <td><?php echo $arrayResult[$i][1]?></td>
                        <td><?php echo $arrayResult[$i][2]?></td>
                        <td><?php echo $arrayResult[$i][3]?></td>
                        <td><?php echo $arrayResult[$i][4]?></td>
                        <td><a href="Update_Lab_Test.php?Patient_ID=<?php echo $arrayResult[$i][0] ?>&Lab_Test_ID=<?php echo $arrayResult[$i][1] ?>">Update</a></td>


                    </tr>
                    <?php endfor;?>
                </tbody>
            </table>                                  
        </div>
    </div>





<div class="container">
    <main role="main" class="pb-3"> 
        <section class="home" id="home">
        <div class="content">
        <h3>Medical Diagnosis - Records</h3>
<a href="Practioner_Create_Medical_Diagnosis.php?Patient_ID=<?php echo $array_medicaldiagnosis[0][0] ?>"><h2>Create Medical Diagnosis</h2></a>   
        </div>
        </section>
    </main>
</div>




    <div class="content">
               <div class="row">
                    <div class="table-container">
                    <div class="search-wrapper">
                      <input type="text" id="myInput3" placeholder="Search" onkeyup="myFunction3()">
                    </div>
                    <table id="myTable3" class="responsive-table">
                                <thead>
                                <tr>  
                                    <th>Patient Medical Diagnosis ID</th>
                                    <th>Patient Medical Diagnosis</th>
                                    <th>Patient Date Of Medical Diagnosis</th>
                                    <th>Update Medical Diagnosis</th>                                    
                                <tr>                                        
                                </thead>
                                <?php
                                    for ($i=0; $i<count($array_medicaldiagnosis); $i++):
                                ?>
                                <tbody>
                                <tr>
                                    <td><?php echo $array_medicaldiagnosis[$i][1]?></td>
                                    <td><?php echo $array_medicaldiagnosis[$i][2]?></td>
                                    <td><?php echo $array_medicaldiagnosis[$i][3]?></td>    
                                    <td><a href="Update_Medical_Diagnosis.php?Patient_ID=<?php echo $array_medicaldiagnosis[$i][0]?>&Patient_Medical_Diagnosis_ID=<?php echo $array_medicaldiagnosis[$i][1]?>">Update</a></td>
                        
                                </tr>
                    <?php endfor;?>
                </tbody>
            </table>                                  
        </div>
    </div>
</div>
