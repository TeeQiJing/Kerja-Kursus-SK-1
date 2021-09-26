<?php
	// Start session
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
	date_default_timezone_set("Asia/Kuala_Lumpur");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Daftar Guru</title>
		<link href="borang.css" rel="stylesheet">
		<link href="header.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("header.php");
		?>
		<div id="content">
			<div class="center">
				<h1>Daftar Guru</h1>
				<form action="DaftarGuru.php" method="POST" autocomplete="off">
					<div class="txt_field">
						<input type="text" id="IdGuru" name="IdGuru" placeholder=" " pattern="G[0-9]{3}" title="G followed by 3 int (E.g. G900)" required>
						<span></span>
						<label>Id Guru</label>
					</div>
					<div class="txt_field">
						<input type="text" id="NamaGuru" name="NamaGuru" placeholder=" " required>
						<span></span>
						<label>Nama Guru</label>
					</div>
					<div class="txt_field">
						<input type="password" id="KatalaluanGuru" placeholder=" " name="KatalaluanGuru" pattern="[A-Za-z0-9]{8}" title="8 Characters" required>
						<span></span>
						<label>Katalaluan Guru</label>
					</div>
					<input type="submit" value="Daftar" name="DaftarGuru" id="DaftarGuru">
					<div class="login_link">
						Sudah Ada Akaun?  <a href="LogMasukGuru.php">Log Masuk Sini</a>
					</div>
				</form>
			</div>
		<?php
			//include database connection
			include("sambungan.php");
			//if user click daftar button...
			if(isset($_POST['DaftarGuru'])){

				//Get the data inserted by user
				$IdGuru = $_POST['IdGuru'];
				$NamaGuru = $_POST['NamaGuru'];
				$KatalaluanGuru = $_POST['KatalaluanGuru'];
				
				$checksql = "SELECT * FROM guru WHERE IdGuru='$IdGuru'";	
				$result = mysqli_query($conn, $checksql);
				//if can find IdGuru in database... (Means that this IdGuru is exist and user need to login)
				if(mysqli_num_rows($result)==1){
					echo("<script>alert('Id Guru anda telah daftar, sila log masuk!!!')</script>");
				}else{
					//if IdGuru is not found(Database does not has that IdGuru, user can daftar)
					//Daftar(Insert data into database)
					$sql = "INSERT INTO guru(IdGuru, NamaGuru, KatalaluanGuru) VALUES('$IdGuru', '$NamaGuru', '$KatalaluanGuru')";					
					//if data are inserted successfully...
					if(mysqli_query($conn, $sql)){
						echo"New record is inserted sucessfully";
						//store $NamaGuru and $IdGuru in $_SESSION[] for other uses purposes
						$_SESSION["NamaGuru"] = $NamaGuru;
						$_SESSION["IdGuru"] = $IdGuru;
						$_SESSION["Status"] = "Guru";
						
						// Record in DaftarGuru.txt
						$date = date('d/m/y h:i:s a', time());
						$file = fopen("DaftarGuru.txt", "a");
						$txt = $IdGuru." - ".$NamaGuru." : ".$date.PHP_EOL;
						fwrite($file, $txt);
						fclose($file);

						//transfer user to laman utama
						echo "
						<script>
							alert('Berjaya daftar!');
							window.location.href='LamanUtama.php';
						</script>";
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