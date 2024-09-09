<?php require("receptionistNavBar.php");
include_once("viewAppointmentsSQL.php");
$user = getUsers ();
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
        <h3>View Appointments</h3>
        </div>
        </section>
    </main>
</div>



<div class="content">
    <div class="row">
        <div class="table-container">
            <div class="search-wrapper">
                <input type="text" id="myInput2" placeholder="Search" onkeyup="myFunction2()">
            </div>
            <table id="myTable2" class="responsive-table">
                <thead>
                    <tr>  
                                    <th>Appointment ID</th>
                                    <th>Patient ID</th>                                    
                                    <th>HOOA ID</th>
                                    <th>Appointment Date</th>
                                    <th>Appointment Start Time</th>
                                    <th>Appointment End Time</th>
                                    <th>Delete</th>   
                    </tr>                                        
                </thead>
                <tbody>
                                <?php
                                    for ($i=0; $i<count($user); $i++):
                                ?>
                                <tr>
                                    <td><?php echo $user[$i]['Appointment_ID']?></td>
                                    <td><?php echo $user[$i]['Patient_ID']?></td>                                    
                                    <td><?php echo $user[$i]['HOOA_ID']?></td>
                                    <td><?php echo $user[$i]['Appointment_Date']?></td>
                                    <td><?php echo $user[$i]['Appointment_Start_Time']?></td>
                                    <td><?php echo $user[$i]['Appointment_End_Time']?></td>
                                    <td><a href="DeleteAppointment.php?Appointment_ID=<?php echo $user[$i]['Appointment_ID']; ?>">Delete</a></td>
                                </tr>
                            <?php endfor;?>
                </tbody>
            </table>                                  
        </div>
    </div>