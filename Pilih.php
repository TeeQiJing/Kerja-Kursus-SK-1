<?php
	// Start session
	session_start();
	

	//Check
	include("notUser.php");

	// Report all errors except E_NOTICE
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
?> 

<!DOCTYPE html>
<html>
	<head>
		<title>Pilih Topik</title>
		<link href="header.css" rel="stylesheet">
		<link href="Pilih.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("header.php");
		?>
		
		<?php
			//include database connection
			include("sambungan.php");
			$IdMuridNow = $_SESSION['IdMurid'];
			$IdGuruNow = $_SESSION['IdGuru'];
			$NamaMuridNow = $_SESSION['NamaMurid'];
			$NamaGuruNow = $_SESSION['NamaGuru'];

			echo"
			<div id='content'>";

			//if IdMurid is not empty...(Means that the user is a student)
			if(!empty($_SESSION['IdMurid'])){
			echo"
			<div id='StudentContent'>
				<h1>SILA PILIH TOPIK</h1>

				<form action='Kuiz.php' method='post' id='StudentForm'>
					<div class='txt_field' id='IdTopikTextField'>
						<select name='IdTopikSelect' id='IdTopik' required>";
							$result = mysqli_query($conn, "SELECT * FROM topik ORDER BY IdTopik ASC");
							while($topik = mysqli_fetch_assoc($result)){
								echo"<option value='$topik[IdTopik]'>$topik[IdTopik].$topik[NamaTopik]</option>";
							}
			echo"
						</select>
						<span></span>
						<label>Sila Pilih Topik</label>
					</div>
					<input type='submit' value='MULA'>
				</form>
			</div>";
				
			}else if(!empty($_SESSION['IdGuru'])){
				echo"
				<div id='TeacherContent'>
					<h1>Tambah Soalan Baharu</h1>
				
					<form action='Pilih.php' method='POST'>
						<div class='txt_field'>
							<input type='text' id='IdSoalan' name='IdSoalan' required>
							<span></span>
							<label>Id Soalan</label>
						</div>

						<div class='txt_field'>
							<input type='text' id='NamaSoalan' name='NamaSoalan' required>
							<span></span>
							<label>Nama Soalan</label>
						</div>

						<div class='txt_field'>
							<input type='text' id='PilihanA' name='PilihanA' required>
							<span></span>
							<label>Pilihan A</label>
						</div>
						<div class='txt_field'>
							<input type='text' id='PilihanB' name='PilihanB' required>
							<span></span>
							<label>Pilihan B</label>
						</div>

						<div class='txt_field'>
							<input type='text' id='PilihanC' name='PilihanC' required>
							<span></span>
							<label>Pilihan C</label>
						</div>

						<div class='txt_field'>
							<input type='text' id='PilihanD' name='PilihanD' required>
							<span></span>
							<label>Pilihan D</label>
						</div>

						<div class='txt_field'>
							<input type='text' id='Jawapan' name='Jawapan' required>
							<span></span>
							<label>Jawapan</label>
						</div>

						<div class='txt_field-special'>
							<input type='text' id='IdGuru' name='IdGuru' value=\"$IdGuruNow - $NamaGuruNow\" readonly>
							<span></span>
							<label>Guru</label>
						</div>

						<div class='txt_field' id='IdTopikTextField'>
							<select name='IdTopik' id='IdTopik' required>
				";
								include('sambungan.php');
								$result = mysqli_query($conn, "SELECT * FROM topik");

								while($topik = mysqli_fetch_assoc($result)){

									echo"<option value='$topik[IdTopik]'>$topik[IdTopik].$topik[NamaTopik]</option>";
								}
				echo'
							</select>
							<span></span>
							<label>Sila Pilih Topik</label>
						</div>
		
						<input type="submit" value="Tambah" name="tambah">
					</form>
				</div>
				';
				if(isset($_POST['tambah'])){

					//Get the data inserted by user
					$IdSoalan = $_POST['IdSoalan'];
					$NamaSoalan = $_POST['NamaSoalan'];
					$PilihanA = $_POST['PilihanA'];
					$PilihanB = $_POST['PilihanB'];
					$PilihanC = $_POST['PilihanC'];
					$PilihanD = $_POST['PilihanD'];
					$Jawapan = $_POST['Jawapan'];
					$IdGuru = $_SESSION['IdGuru'];	
					$IdTopik = $_POST['IdTopik'];
					
					//if the data are not empty
					if(!empty($IdSoalan) AND !empty($NamaSoalan) AND !empty($PilihanA) AND !empty($PilihanB) AND !empty($PilihanC) AND !empty($PilihanD) AND !empty($Jawapan) AND !empty($IdGuru) AND !empty($IdTopik)){
						
						//Check whether the IdSoalan is exist in database
						$checksql = "SELECT * FROM soalan WHERE IdSoalan = '$IdSoalan'";
						$checkResult = mysqli_query($conn, $checksql);
						
						//if the IdSoalan is exist in database...
						if(mysqli_num_rows($checkResult)==1){

							//alert message
							echo("<script>alert('Id Soalan telah import, sila import Id Soalan lain!!!')</script>");

						}else{

							//if the IdSoalan is not exist in database, then can import soalan
							$sql2 = "INSERT INTO soalan(IdSoalan, NamaSoalan, PilihanA, PilihanB, PilihanC, PilihanD, Jawapan, IdGuru, IdTopik) 
							VALUES('$IdSoalan', '$NamaSoalan', '$PilihanA', '$PilihanB', '$PilihanC', '$PilihanD', '$Jawapan', '$IdGuru', '$IdTopik')";
							$result2 = mysqli_query($conn, $sql2);
							
							echo"<script>alert('Berjaya Tambah Soalan')</script>";
						}
					}else{

						//if the data are empty
						echo"<script>alert('Sila masukkan Semua Maklumat!!!')</script>";

					}
				}
			

				echo"</div>";
			}
			echo "</div>"
		?>
		<?php
			include("footer.php");
			
		?>
	</body>
</html>