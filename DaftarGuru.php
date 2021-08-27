<?php
	// Start session
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
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
						<input type="text" id="IdGuru" name="IdGuru" onfocusin="focusIdGuru()" onfocusout="clearIdGuru()" required>
						<span></span>
						<label>Id Guru</label>
					</div>

					<div class="txt_field">
						<input type="text" id="NamaGuru" name="NamaGuru" required>
						<span></span>
						<label>Nama Guru</label>
					</div>

					<div class="txt_field">
						<input type="password" id="KatalaluanGuru" name="KatalaluanGuru" onfocusin="focusPassGuru()" 
						onfocusout="clearPassGuru()" required>
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

				if(strlen($IdGuru) != 4 || $IdGuru[0] != 'G'){
					echo "
					<script>
						alert('Id Guru mesti mula dari huruf G dan mesti 4 aksara dan mematuhi format Gxxx!!!');
						window.location = 'DaftarGuru.php';
					</script>";
				}else if(strlen($KatalaluanGuru) != 8){
					echo "
					<script>
						alert('Katalaluan Guru mesti 8 aksara!!!');
						window.location = 'DaftarGuru.php';
					</script>";
				}else{
					
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

							//transfer user to laman utama
							echo "
							<script>
								alert('Berjaya daftar!');
								window.location.href='LamanUtama.php';
							</script>";
						}
					}
				}			
			}
		?>

		</div>
		<?php
			include("footer.php");
		?>
		<script>
			
			function focusIdGuru(){
				document.getElementById("IdGuru").placeholder = "G001 4 char"
			}
			function focusPassGuru(){
				document.getElementById("KatalaluanGuru").placeholder = "12345678 8 char"
			}
			function clearIdGuru(){
				document.getElementById("IdGuru").placeholder = ""
			}
			function clearPassGuru(){
				document.getElementById("KatalaluanGuru").placeholder = ""
			}
		</script>
	</body>
</html>