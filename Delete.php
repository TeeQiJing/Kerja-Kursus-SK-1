<?php
	// Start session
	session_start();

	// Check
	include("../notTeacher.php")
?> 

<!DOCTYPE html>
<html>
	<head>
		<title>Hapus Keputusan</title>
		<link href="Delete.css" rel="stylesheet">
	</head>
	<body>
		<div id="title">
			<h1>APLIKASI PENILAIAN SAINS KOMPUTER T4</h1>
		</div>

		<!--Navigation Menu-->
		<div id="menu">

			<!--Check whether user is a student or teacher and print the name-->
			<?php 
				include("../checkUser.php");
			?>

			<!-- Navigation Options-->
			<a id="LamanUtama" href="http://localhost/Kerja%20Kursus%20SK/LamanUtama.php">Laman Utama</a>
			<a id="LogMasukDaftar" href="http://localhost/Kerja%20Kursus%20SK/LogMasuk&Daftar/LogMasuk&Daftar.php">Log masuk&Daftar</a>
			<a id="Kuiz" href="http://localhost/Kerja%20Kursus%20SK/Kuiz/Pilih.php">Kuiz</a>
			<a id="Laporan" href="http://localhost/Kerja%20Kursus%20SK/Laporan/Laporan.php">Laporan</a>
			<a id="Import" href="http://localhost/Kerja%20Kursus%20SK/Import/PilihanGuru.php">Import</a>
			<a href="http://localhost/Kerja%20Kursus%20SK/LogKeluar.php">Log Keluar</a>
			<br><br>

			<!--COPYRIGHT-->
			<div class="copy" style="background-color:#cc33cc;color:white;padding:1px;">
				<p style="font-size: 20px;">Copyright 2021 &copy; by</p>
				<p style="font-size: 25px;">MASTER JING</p>
			</div>

		</div>

		<!--Hapus Form-->
		<div id="form">

			<p id="deleteSoalan">Menghapuskan Keputusan Murid</p>

			<!--Main Form-->
			<form action="Delete.php" method="post"><br>

				Id Keputusan :
				<select name="keputusan" id="keputusan">

					<?php

						//Connection to database
						include("../sambungan.php");
						$sql1 = "SELECT * FROM keputusan ORDER BY IdKeputusan ASC";
						$result1 = mysqli_query($conn, $sql1);

						//Print out all IdKeputusan
						while($keputusan = mysqli_fetch_array($result1)){
                		    $IdKeputusan = $keputusan['IdKeputusan'];
                        	echo "<option value='$IdKeputusan'>$IdKeputusan</option>";	
                 		}

					?>

				</select><br><br><br><br><br><br>

				<!--Submit Button-->
				<input type="submit" id="hapus" name="hapus" value="Hapus">

			</form>

			<?php

				//if hapus button is clicked...
				if(isset($_POST['hapus'])){

					//Get the selected IdKeputusan
					$selectedKeputusan = $_POST['keputusan'];

					//Delete data from database
					$sql2 = "DELETE FROM keputusan WHERE IdKeputusan='$selectedKeputusan'";
					$result2 = mysqli_query($conn, $sql2);

					//Transfer user to laman PilihanGuru 
					header("location: http://localhost/Kerja%20Kursus%20SK/Import/PilihanGuru.php");
				}

			?>

		</div>
		
	</body>
</html>