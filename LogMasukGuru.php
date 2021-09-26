<?php
	// Start session
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
	date_default_timezone_set("Asia/Kuala_Lumpur");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Log Masuk Guru</title>
		<link href="header.css" rel="stylesheet">
		<link href="borang.css" rel="stylesheet">	
	</head>
	<body>
		<?php
			include("header.php");
		?>
		<div id="content">
			<div class="center" id="center">
				<h1>Log Masuk Guru</h1>
				<form action="LogMasukGuru.php" method="POST" autocomplete="off">
					<div class="txt_field">
						<input type="text" id="IdGuru" name="IdGuru" placeholder=" " required>
						<span></span>
						<label>Id Guru</label>
					</div>
					<div class="txt_field">
						<input type="password" id="KatalaluanGuru" placeholder=" " name="KatalaluanGuru" required>
						<span></span>
						<label>Katalaluan Guru</label>
					</div>
					<input type="submit" value="Log Masuk" name="LogMasukGuru" id="LogMasukGuru">
					<div class="signup_link">
						Belum Daftar?  <a href="DaftarGuru.php">Daftar Sini</a>
					</div>
				</form>
			</div>
			<?php
			//include database connection
			include("sambungan.php");
			//if user click login button...
			if(isset($_POST['LogMasukGuru'])){
				//Get the data inserted by user
				$IdGuru = $_POST['IdGuru'];
				$KatalaluanGuru = $_POST['KatalaluanGuru'];
				//if the data are not empty...
				if(!empty($IdGuru) AND !empty($KatalaluanGuru)){
					$sql = "SELECT * FROM guru WHERE IdGuru='$IdGuru' AND KatalaluanGuru='$KatalaluanGuru'";
					$result = mysqli_query($conn, $sql);
					//if can match IdGuru and KatalaluanGuru in database...
					if(mysqli_num_rows($result)==1){
						$Carisql = "SELECT * FROM guru WHERE IdGuru='$IdGuru'";
						$result2 = mysqli_query($conn, $Carisql);
						$row = mysqli_fetch_assoc($result2);
						//store $NamaGuru and $IdGuru in $_SESSION[] for other uses purposes
						$_SESSION["NamaGuru"] = $row["NamaGuru"];	
						$_SESSION["IdGuru"] = $row["IdGuru"];	
						$_SESSION["Status"] = "Guru";
						
						// Record in LogMasukGuru.txt
						$date = date('d/m/y h:i:s a', time());
						$file = fopen("LogMasukGuru.txt", "a");
						$NamaGuru = $row["NamaGuru"];	
						$txt = $IdGuru." - ".$NamaGuru." : ".$date.PHP_EOL;
						fwrite($file, $txt);
						fclose($file);

						//transfer user to laman utama
						header("location: LamanUtama.php");
					}else{
						//if can't match IdGuru and KatalaluanGuru in database...
						echo"<script>alert('Id Guru atau Katalaluan Guru salah!!')</script>";
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