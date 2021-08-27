<?php
	// Start session
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Daftar Murid</title>
		<link href="header.css" rel="stylesheet">
		<link href="borang.css" rel="stylesheet">
	</head>
	<body onclick="click()">
		<?php
			include("header.php");
		?>

		<div id="content">
			<div class="center">
				<h1>Daftar Murid</h1>
				
				<form action="DaftarMurid.php" method="POST" autocomplete="off">
					<div class="txt_field">
						<input type="text" id="IdMurid" name="IdMurid" onfocusin="focusIdMurid()" onfocusout="clearIdMurid()" required>
						<span></span>
						<label>Id Murid</label>
						
					</div>

					<div class="txt_field">
						<input type="text" id="NamaMurid" name="NamaMurid" required>
						<span></span>
						<label>Nama Murid</label>
					</div>

					<div class="txt_field">
						<input type="password" id="KatalaluanMurid" name="KatalaluanMurid" onfocusin="focusPassMurid()" 
						onfocusout="clearPassMurid()" required>
						<span></span>
						<label>Katalaluan Murid</label>
					</div>

					<div class="txt_field" id="IdKelasTextField">
						<select name="IdKelas" id="IdKelas" required>
							
							<?php
								include("sambungan.php");
								$result = mysqli_query($conn, "SELECT * FROM kelas");

								while($kelas = mysqli_fetch_assoc($result)){
									echo"<option value='$kelas[IdKelas]'>$kelas[Kelas]</option>";
								}
							?>
						</select>
						<span></span>
						<label id="SilaPilihKelas">Sila Pilih Kelas</label>
					</div>
				
					<input type="submit" value="Daftar" name="DaftarMurid" id="DaftarMurid">

					<div class="login_link">
						Sudah Ada Akaun?  <a href="LogMasukMurid.php">Log Masuk Sini</a>
					</div>
				</form>
			</div>

		<?php
			//include database connection
			include("sambungan.php");

			//if user click daftar button...
			if(isset($_POST['DaftarMurid'])){

				//Get the data inserted by user
				$IdMurid = $_POST['IdMurid'];
				$NamaMurid = $_POST['NamaMurid'];
				$KatalaluanMurid = $_POST['KatalaluanMurid'];
				$IdKelas = $_POST['IdKelas'];

				if(strlen($IdMurid) != 4 || $IdMurid[0] != 'M'){
					echo "
					<script>
						alert('Id Murid mesti mula dari huruf M dan mesti 4 aksara dan mematuhi format Mxxx!!!');
						window.location = 'DaftarMurid.php';
					</script>";
				}else if(strlen($KatalaluanMurid) != 8){
					echo "
					<script>
						alert('Katalaluan Murid mesti 8 aksara!!!');
						window.location = 'DaftarMurid.php';
					</script>";
				}else{
					$checksql = "SELECT * FROM murid WHERE IdMurid='$IdMurid'";			
					$result = mysqli_query($conn, $checksql);

					//if can find IdMurid in database... (Means that this IdMurid is exist and user need to login)
					if(mysqli_num_rows($result)==1){
						echo "
						<script>
							alert('Id Murid anda telah daftar, sila log masuk!!!');
							window.location = 'LogMasukMurid.php';
						</script>";
					}else{
						//if IdMurid is not found(Database does not has that IdMurid, user can daftar)
						//Daftar(Insert data into database)
						$sql = "INSERT INTO murid(IdMurid, NamaMurid, KatalaluanMurid, IdKelas) 
						VALUES('$IdMurid', '$NamaMurid', '$KatalaluanMurid', '$IdKelas')";
						
						//if data are inserted successfully...
						if(mysqli_query($conn, $sql)){
							echo"New record is inserted sucessfully";

							//store $NamaMurid and $IdMurid in $_SESSION[] for other uses purposes
							$_SESSION["NamaMurid"] = $NamaMurid;
							$_SESSION["IdMurid"] = $IdMurid;
							$_SESSION["Status"] = "Murid";

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
			
			function focusIdMurid(){
				document.getElementById("IdMurid").placeholder = "M001 4 char"
			}
			function focusPassMurid(){
				document.getElementById("KatalaluanMurid").placeholder = "12345678 8 char"
			}
			function clearIdMurid(){
				document.getElementById("IdMurid").placeholder = ""
			}
			function clearPassMurid(){
				document.getElementById("KatalaluanMurid").placeholder = ""
			}
		</script>
	</body>
</html>