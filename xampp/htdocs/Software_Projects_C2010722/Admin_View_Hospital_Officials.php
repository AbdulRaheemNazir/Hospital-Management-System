<?php require("AdminNavBar.php");
include_once("viewHospitalOfficials_SQL.php");
$user = getUsers ();
$getPassword = getPassword ();
?>


<div class="container">
    <main role="main" class="pb-3"> 
        <section class="home" id="home">
        <div class="content">
        <h3>View Hospital Officials</h3>
        </div>
        </section>
    </main>
</div>
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


                   <div class="row">

<div class="content">
    <div class="row">
        <div class="table-container">
            <div class="search-wrapper">
                <input type="text" id="myInput2" placeholder="Search" onkeyup="myFunction2()">
            </div>
            <table id="myTable2" class="responsive-table">
                <thead>
                    <tr>  
                                    <th>HOOA ID</th>
                                    <th>HOOA First Name</th>
                                    <th>HOOA Last Name</th>
                                    <th>HOOA Role</th>
                                    <th>HOOA Age</th>
                                    <th>HOOA Home Address</th>
                                    <th>HOOA Contact</th>
                                    <th>HOOA Status</th>
                                    <th>HOOA PostCode</th>
                                    <th>HOOA Password</th>                                    
                                    <th>Update</th>
                                    <th>Delete</th>
                    </tr>                                        
                </thead>
                <tbody>
                                <?php
                                    for ($i=0; $i<count($user); $i++):
                                ?>
                                <tbody>
                                <tr>
                                    <td><?php echo $user[$i]['HOOA_ID']?></td>
                                    <td><?php echo $user[$i]['HOOA_First_Name']?></td>
                                    <td><?php echo $user[$i]['HOOA_Last_Name']?></td>
                                    <td><?php echo $user[$i]['HOOA_Role']?></td>
                                    <td><?php echo $user[$i]['HOOA_Age']?></td>
                                    <td><?php echo $user[$i]['HOOA_Home_Address']?></td>
                                    <td><?php echo $user[$i]['HOOA_Contact']?></td>
                                    <td><?php echo $user[$i]['HOOA_Status']?></td>                                    
                                    <td><?php echo $user[$i]['HOOA_PostCode']?></td>                                    
                                    <td><?php echo $getPassword[$i]['HOOA_Password']?></td>
                                    <td><a href="Update_Hospital_Officials_Details.php?HOOA_ID=<?php echo $user[$i]['HOOA_ID']; ?>">Update</a></td>
                                    <td><a href="DeleteHospitalOfficial.php?HOOA_ID=<?php echo $user[$i]['HOOA_ID']; ?>">Delete</a></td>
                                </tr>
                                <?php endfor;?>
                                    </tbody>
                            </table>    
                        </div>
                     </div>
                </div>
        </main>
    </div>
