<?php require("AdminNavBar.php");

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
<h2><a href="Update_Admin_Notes.php?HOOA_ID=<?php echo $HOOA_ID; ?>">Update Notes</a></h2>
    </div>
</section>

        </main>
    </div>
