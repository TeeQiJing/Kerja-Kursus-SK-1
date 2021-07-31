<?php
	// Start session
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Kemaskini Kelas</title>
		<link href="header.css" rel="stylesheet">
		<link href="KelasUpdate.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("header.php");
		?>

		<div id="content">
			<div class="center">
				<h1>Kemaskini Kelas</h1>
				
				<form action="KelasUpdate.php" method="POST">
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
						<input type="text" id="NamaKelas" name="NamaKelas" required>
						<span></span>
						<label>Nama Kelas</label>
					</div>

					<input type="submit" value="Kemaskini" name="UpdateKelas" id="UpdateKelas">

					
				</form>
			</div>

		<?php
			//include database connection
			include("sambungan.php");

			//if user click Update button...
			if(isset($_POST['UpdateKelas'])){

				//Get the data inserted by user
				$IdKelas = $_POST['IdKelas'];
				$NamaKelas = $_POST['NamaKelas'];
   
                //Update new name 
                $sql = "UPDATE kelas SET Kelas='$NamaKelas' WHERE IdKelas='$IdKelas'";
                
                //if data are updated successfully...
                if(mysqli_query($conn, $sql)){
                    echo "<script>alert('Berjaya kemaskini kelas');</script>";
                }else {
                    echo "<script>alert('Tidak berjaya kemaskini kelas');</script>";
                }
                echo "<script>window.location='KelasUpdate.php';</script>";
				
			}
		?>
		
		</div>
		<?php
			include("footer.php");
		?>
	</body>
</html>