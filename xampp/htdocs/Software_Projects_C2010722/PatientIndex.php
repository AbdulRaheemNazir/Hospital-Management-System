<?php require("patientnavbar.php");
session_start();
include_once("Patient_Messages.php");
$array_messages = Patient_Messages();

$Patient_ID = $_SESSION['Patient_ID'];

?>
	<div class="container">
        	<main role="main" class="pb-3">	


<section class="home" id="home">

    <div class="content">
        <h3>Messages</h3>
<h2><?php echo $array_messages[0][10]?></h2>
    </div>
</section>

		</main>
	</div>



	