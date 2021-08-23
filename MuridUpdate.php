<?php
	// Start session
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Kemaskini Murid</title>
		<link href="header.css" rel="stylesheet">
		<link href="borang.css" rel="stylesheet">
		<style>
			input[type="submit"]{
				margin-bottom: 30px;
			}	
		</style>
	</head>
	<body>
		<?php
			include("header.php");
		?>

		<div id="content">
			<div class="center">
                <h1>Kemaskini Murid</h1>
				
				<form action="MuridUpdate.php" method="POST">
                    <div class="txt_field">
						<select name="IdMurid" id="IdMurid" required>
							
							<?php
								include("sambungan.php");
								$result = mysqli_query($conn, "SELECT * FROM murid");

								while($murid = mysqli_fetch_assoc($result)){
									echo"<option value='$murid[IdMurid]'>$murid[IdMurid]</option>";
								}
							?>
						</select>
						<span></span>
						<label id="SilaPilihKelas">Sila Pilih Murid</label>
					</div>
                    <div class="txt_field">
						<input type="text" name="NamaMurid" required>
						<span></span>
						<label>Nama Murid</label>
					</div>
                    <div class="txt_field" id="IdKelasTextField">
						<select name="IdKelas" id="IdKelas" required>
							
							<?php
								include("sambungan.php");
								$result = mysqli_query($conn, "SELECT * FROM kelas");

								while($kelas = mysqli_fetch_assoc($result)){
									echo"<option value='$kelas[IdKelas]'>$kelas[IdKelas]</option>";
								}
							?>
						</select>
						<span></span>
						<label id="SilaPilihKelas">Sila Pilih Kelas</label>
					</div>

					<div class="txt_field">
						<input type="text" id="KatalaluanMurid" name="KatalaluanMurid" required>
						<span></span>
						<label>KatalaluanMurid</label>
					</div>

					<input type="submit" value="Kemaskini" name="UpdateMurid" id="UpdateMurid">

					
				</form>
			</div>

		<?php
			//include database connection
			include("sambungan.php");

			//if user click Update button...
			if(isset($_POST['UpdateMurid'])){

				//Get the data inserted by user
				$IdMurid = $_POST['IdMurid'];
				$NamaMurid = $_POST['NamaMurid'];
                $KatalaluanMurid = $_POST['KatalaluanMurid'];
				$IdKelas = $_POST['IdKelas'];

				if(strlen($KatalaluanMurid) != 8){
					echo "
					<script>
						alert('Katalaluan Murid mesti 8 aksara!!!');
						window.location = 'MuridInsert.php';
					</script>";
				}else{
					//Update new data 
					$sql = "UPDATE murid SET NamaMurid='$NamaMurid', KatalaluanMurid='$KatalaluanMurid', IdKelas='$IdKelas' WHERE IdMurid='$IdMurid'";
					
					//if data are updated successfully...
					if(mysqli_query($conn, $sql)){
						echo "<script>alert('Berjaya kemaskini murid');</script>";
					}else {
						echo "<script>alert('Tidak berjaya kemaskini murid');</script>";
					}
					echo "<script>window.location='MuridUpdate.php';</script>";
				}
			}
		?>
		
		</div>
		<?php
			include("footer.php");
		?>
	</body>
</html>