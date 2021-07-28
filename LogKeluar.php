<!--Destroy session to log out-->
<?php
    session_start();
    session_destroy();

    // After log out, user is transfered to login & sign up page
    header("location: LamanUtama.php");
?>