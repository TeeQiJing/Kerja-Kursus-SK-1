<!--If NamaMurid is empty(haven't login), cannot access specific file-->
<!--The user is transfered to laman logMasuk&Daftar to login or sign up-->
<?php
    if(empty($_SESSION['NamaMurid'])){
		header("location: http://localhost/Kerja%20Kursus%20SK/LogMasuk&Daftar/LogMasuk&Daftar.php");
	}
?>