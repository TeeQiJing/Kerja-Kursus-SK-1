<!--If NamaMurid and NamaGuru both are empty(haven't login), cannot access specific file-->
<!--The user is transfered to laman logMasuk&Daftar to login or sign up-->
<?php
    if(empty($_SESSION['NamaMurid']) && empty($_SESSION['NamaGuru'])){
		echo"<script>
			if(confirm('Sila log masuk atau daftar!')){
				window.location= 'LamanUtama.php';
			}
			
			</script>";
		
	}
?>