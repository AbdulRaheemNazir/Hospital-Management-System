<?php require("receptionistNavBar.php");
include_once("viewPatientsSQL.php");
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
        <h3>View Patients</h3>
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

                                    <th>Patient ID</th>
                                    <th>Patient First Name</th>
                                    <th>Patient Last Name</th>
                                    <th>Patient Age</th>
                                    <th>Patient Date Of Birth</th>
                                    <th>Patient Sex</th>
                                    <th>Patient Postcode</th>
                                    <th>Patient Contact Information</th>
                                    <th>Patient Address</th>
                                    <th>Patient Password</th>
                                    <th>Book Appointment</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                <tr>                                        
                                </thead>
                                <?php
                                    for ($i=0; $i<count($user); $i++):
                                ?>
                                <tbody>
                                <tr>
                                    <td><?php echo $user[$i]['Patient_ID']?></td>
                                    <td><?php echo $user[$i]['Patient_First_Name']?></td>
                                    <td><?php echo $user[$i]['Patient_Last_Name']?></td>
                                    <td><?php echo $user[$i]['Patient_Age']?></td>
                                    <td><?php echo $user[$i]['Patient_Date_Of_Birth']?></td>
                                    <td><?php echo $user[$i]['Patient_Sex']?></td>
                                    <td><?php echo $user[$i]['Patient_Postcode']?></td>
                                    <td><?php echo $user[$i]['Patient_Contact_Information']?></td>                                    
                                    <td><?php echo $user[$i]['Patient_Address']?></td>
                                    <td><?php echo $user[$i]['Patient_Password']?></td>
                                    <td><a href="Book_appointments.php?Patient_ID=<?php echo $user[$i]['Patient_ID']; ?>">Book</a></td>
                                    <td><a href="Update_Pateint_Details.php?Patient_ID=<?php echo $user[$i]['Patient_ID']; ?>">Update Patient Details</a> ||

                                           <a href="Update_Pateint_Messages.php?Patient_ID=<?php echo $user[$i]['Patient_ID']; ?>">Update Messages</a>
                                    </td>
                                    <td><a href="DeletePatient.php?Patient_ID=<?php echo $user[$i]['Patient_ID']; ?>">Delete</a></td>
                                </tr>
                                <?php endfor;?>
                                    </tbody>
                            </table>    
                        </div>
                     </div>
                </div>
        </main>
        
    </div>
