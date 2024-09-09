<?php require("receptionistNavBar.php");
session_start();
include_once("HOOA_Messages.php");
$array_messages = HOOA_Messages();

$HOOA_ID = $_SESSION['HOOA_ID'];

?>
    <div class="container">
            <main role="main" class="pb-3"> 


<section class="home" id="home">

    <div class="content">
        <h3>Messages</h3>
<h2><?php echo $array_messages[0][9]?></h2>
    </div>
</section>

        </main>
    </div>
