<?php
	// Start session
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Log Masuk Murid</title>
		<link href="header.css" rel="stylesheet">
		<link href="LogMasukMurid.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("header.php");
		?>
		<div id="content">
			<div class="center">
				<h1>Log Masuk Murid</h1>
				<form action="LogMasukMurid.php" method="POST">
					<div class="txt_field">
						<input type="text" id="IdMurid" name="IdMurid" required>
						<span></span>
						<label>Id Murid</label>
					</div>
					<div class="txt_field">
						<input type="password" id="KatalaluanMurid" name="KatalaluanMurid" required>
						<span></span>
						<label>Katalaluan Murid</label>
					</div>
					<input type="submit" value="Log Masuk" name="LogMasukMurid" id="LogMasukMurid">
					<div class="signup_link">
						Belum Daftar?  <a href="DaftarMurid.php">Daftar Sini</a>
					</div>
				</form>
			</div>
			

		<?php
			
			//include database connection
			include("sambungan.php");

			//if user click login button...
			if(isset($_POST['LogMasukMurid'])){

				//Get the data inserted by user
				$IdMurid = $_POST['IdMurid'];
				$KatalaluanMurid = $_POST['KatalaluanMurid'];

				//if the data are not empty...
				if(!empty($IdMurid) AND !empty($KatalaluanMurid)){

					$sql = "SELECT * FROM murid WHERE IdMurid='$IdMurid' AND KatalaluanMurid='$KatalaluanMurid'";
					$result = mysqli_query($conn, $sql);

					//if can match IdMurid and KatalaluanMurid in database...
					if(mysqli_num_rows($result)==1){

						$Carisql = "SELECT * FROM murid WHERE IdMurid='$IdMurid'";
						$result2 = mysqli_query($conn, $Carisql);
						$row = mysqli_fetch_assoc($result2);

						//store $NamaMurid and $IdMurid in $_SESSION[] for other uses purposes
						$_SESSION["NamaMurid"] = $row["NamaMurid"];	
						$_SESSION["IdMurid"] = $row["IdMurid"];
						$_SESSION["Status"] = "Murid";

						//transfer user to laman utama
						header("location: http://localhost/Kerja%20Kursus%20SK%201/LamanUtama.php");

					}else{

						//if can't match IdMurid and KatalaluanMurid in database...
						echo"<script>alert('Id Murid atau Katalaluan Murid salah!!!')</script>";

					}
				}
			}
		?>

		</div>
		<?php
			include("footer.php");
		?>
	</body>
</html>