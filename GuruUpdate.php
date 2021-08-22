<?php
	// Start session
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Kemaskini Guru</title>
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
                <h1>Kemaskini Guru</h1>
				
				<form action="GuruUpdate.php" method="POST">
                    <div class="txt_field">
						<select name="IdGuru" id="IdGuru" required>
							
							<?php
								include("sambungan.php");
								$result = mysqli_query($conn, "SELECT * FROM guru");

								while($guru = mysqli_fetch_assoc($result)){
									echo"<option value='$guru[IdGuru]'>$guru[IdGuru]</option>";
								}
							?>
						</select>
						<span></span>
						<label id="SilaPilihKelas">Sila Pilih IdGuru</label>
					</div>
                    <div class="txt_field">
						<input type="text" name="NamaGuru" required>
						<span></span>
						<label>Nama Guru</label>
					</div>
					<div class="txt_field">
						<input type="text" id="KatalaluanGuru" name="KatalaluanGuru" required>
						<span></span>
						<label>KatalaluanGuru</label>
					</div>

					<input type="submit" value="Kemaskini" name="UpdateGuru" id="UpdateGuru">

					
				</form>
			</div>

		<?php
			//include database connection
			include("sambungan.php");

			//if user click Update button...
			if(isset($_POST['UpdateGuru'])){

				//Get the data inserted by user
				$IdGuru = $_POST['IdGuru'];
				$NamaGuru = $_POST['NamaGuru'];
                $KatalaluanGuru = $_POST['KatalaluanGuru'];
   
                //Update new data 
                $sql = "UPDATE guru SET NamaGuru='$NamaGuru', KatalaluanGuru='$KatalaluanGuru' WHERE IdGuru='$IdGuru'";
                
                //if data are updated successfully...
                if(mysqli_query($conn, $sql)){
                    echo "<script>alert('Berjaya kemaskini guru');</script>";
                }else {
                    echo "<script>alert('Tidak berjaya kemaskini guru');</script>";
                }
                echo "<script>window.location='GuruUpdate.php';</script>";
				
			}
		?>
		
		</div>
		<?php
			include("footer.php");
		?>
	</body>
</html>