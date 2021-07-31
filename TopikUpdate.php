<?php
	// Start session
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Kemaskini Topik</title>
		<link href="header.css" rel="stylesheet">
		<link href="TopikUpdate.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("header.php");
		?>

		<div id="content">
			<div class="center">
                <h1>Kemaskini Topik</h1>
				
				<form action="TopikUpdate.php" method="POST">
                    <div class="txt_field">
						<select name="IdTopik" id="IdTopik" required>
							
							<?php
								include("sambungan.php");
								$result = mysqli_query($conn, "SELECT * FROM topik");

								while($topik = mysqli_fetch_assoc($result)){
									echo"<option value='$topik[IdTopik]'>$topik[IdTopik]</option>";
								}
							?>
						</select>
						<span></span>
						<label id="SilaPilihKelas">Sila Pilih Topik</label>
					</div>
                    <div class="txt_field">
						<input type="text" name="NamaTopik" required>
						<span></span>
						<label>Nama Topik</label>
					</div>

					<input type="submit" value="Kemaskini" name="UpdateTopik" id="UpdateTopik">

					
				</form>
			</div>

		<?php
			//include database connection
			include("sambungan.php");

			//if user click Update button...
			if(isset($_POST['UpdateTopik'])){

				//Get the data inserted by user
				$IdTopik = $_POST['IdTopik'];
				$NamaTopik = $_POST['NamaTopik'];
   
                //Update new data 
                $sql = "UPDATE topik SET NamaTopik='$NamaTopik' WHERE IdTopik='$IdTopik'";
                
                //if data are updated successfully...
                if(mysqli_query($conn, $sql)){
                    echo "<script>alert('Berjaya kemaskini topik');</script>";
                }else {
                    echo "<script>alert('Tidak berjaya kemaskini topik');</script>";
                }
                echo "<script>window.location='TopikUpdate.php';</script>";
				
			}
		?>
		
		</div>
		<?php
			include("footer.php");
		?>
	</body>
</html>