<?php
	// Start session
	session_start();

	// Report all error except notice
	error_reporting(E_ALL & ~E_NOTICE);
?> 

<!DOCTYPE html>
<html>
	<head>
		<title>Import</title>

		<!-- Link to css files -->
		<link href="Import.css" rel="stylesheet">
		<link href="header.css" rel="stylesheet">
	</head>
	<body>
		<?php
			// header.php is a php file to set banner and side menu
			include("header.php")
		?>
		<div id="content">
			<div class="center">

				<!-- Import Title -->
				<h1 id="importTitle">Import Data</h1>

				<!-- Import form -->
				<form action="Import.php" method="POST" enctype="multipart/form-data">

					<!-- Select table to import data -->
					<div class="txt_field">
						<select name="namatable">

							<!-- Table options -->
							<option value="keputusan">keputusan</option>
							<option value="kelas">kelas</option>
							<option value="murid">murid</option>
							<option value="soalan">soalan</option>
							<option value="guru">guru</option>
							<option value="topik">topik</option>

						</select>

						<!-- Label and span -->
						<span></span>
						<label>Pilih Jadual</label>

					</div>

					<!-- Select file to import data -->
					<div class="txt_field">

						<!-- Hide the real import file button -->
						<input type="file" hidden="hidden" id="real-file" name="namafail" accept=".txt" required="required"> 
						
						<!-- Custom text to replace the real text -->
						<span id="custom-text">Tidak Ada Fail</span>

						<!-- Add custom button to replace the real import file button -->
						<input type="button" value="Upload" id="custom-button">
						
						<!-- Label and span -->
						<span></span>
						<label>Pilih Fail</label>
						
					</div>
					
					<!-- Submit button (Import) -->
					<input type="submit" name="Import" value="Import">
					
					<script>
						// Use js to modify the import button

						// Real import button
						const realFileBtn = document.getElementById("real-file")
						
						// Custom button (show to user)
						const customBtn = document.getElementById("custom-button")
						
						// Custom text (show to user)
						const customTxt = document.getElementById("custom-text")
						
						// When custom button is clicked, click the real import button
						customBtn.addEventListener('click', function(){
							realFileBtn.click();
						})

						// When there is change in the real text, change the custom text also
						// When user select file, e.g. dataKuiz.txt
						// The custom text will show dataKuiz.txt also
						realFileBtn.addEventListener("change", function(){
							if(realFileBtn.value){
								customTxt.innerHTML = realFileBtn.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1]
							}else{
								customTxt.innerHTML = "Tidak Ada Fail"
							}

						})

					</script>
				</form>
			</div>
		</div>

		<!-- PHP Validation -->
		<?php

			// if user click the submit button (input name = 'Import')
			if(isset($_POST['Import'])){

				// Include sambungan.php to build database connection
				include("sambungan.php");

				// if isset file
				if($_FILES['namafail']['name']){

					// Get the selected table and .txt file
					$namaFail = $_FILES['namafail']['name'];
					$namaJadual = $_POST['namatable'];

					// Open .txt file to read
					$fail = fopen($namaFail, 'r');

					// while the "end-of-file" (EOF) has not been reached
					while(!feof($fail)){

						// If selected table is murid
						if($namaJadual == "murid"){
							$medan = explode(',' ,fgets($fail));
							$IdMurid = $medan[0];
							$NamaMurid = $medan[1];
							$KatalaluanMurid = $medan[2];
							$IdKelas = trim($medan[3]);
							$sql = "INSERT INTO `murid` VALUES('$IdMurid','$NamaMurid','$KatalaluanMurid','$IdKelas')";
							$result = mysqli_query($conn, $sql);						
							if($result == true){
								$berjaya = true;
							}else{
								$berjaya = false;
							}		
						}

						// If selected table is topik
						if($namaJadual === "topik"){
							$medan = explode(',' ,fgets($fail));
							$IdTopik = $medan[0];
							$NamaTopik = trim($medan[1]);
							$sql = "INSERT INTO `topik`(`IdTopik`, `NamaTopik`) VALUES ('$IdTopik','$NamaTopik')";
							$result = mysqli_query($conn, $sql);
							if($result){
								$berjaya = true;
							}else{
								$berjaya = false;
							}	
						}

						// If selected table is kelas
						if($namaJadual === "kelas"){
							$medan = explode(',' ,fgets($fail));
							$IdKelas = $medan[0];
							$NamaKelas = trim($medan[1]);
							$sql = "INSERT INTO `kelas`(`IdKelas`, `Kelas`) VALUES ('$IdKelas','$NamaKelas')";
							$result = mysqli_query($conn, $sql);
							if($result){
								$berjaya = true;
							}else{
								$berjaya = false;
							}			
						}

						// If selected table is soalan
						if($namaJadual === "soalan"){
							$medan = explode(',' ,fgets($fail));
							$IdSoalan = $medan[0];
							$NamaSoalan = $medan[1];
							$pilihanA = $medan[2];
							$pilihanB = $medan[3];
							$pilihanC = $medan[4];
							$pilihanD = $medan[5];
							$Jawapan = $medan[6];
							$IdGuru = $medan[7];
							$IdTopik = trim($medan[8]);
							$sql = "INSERT INTO `soalan` 
							VALUES ('$IdSoalan','$NamaSoalan', '$pilihanA', '$pilihanB', '$pilihanC', '$pilihanD', '$Jawapan', '$IdGuru', '$IdTopik')";
							$result = mysqli_query($conn, $sql);	
							if($result){
								$berjaya = true;
							}else{
								$berjaya = false;
							}		
						}
						
						// If selected table is guru
						if($namaJadual === "guru"){
							$medan = explode(',' ,fgets($fail));
							$IdGuru = $medan[0];
							$NamaGuru = $medan[1];
							$KatalaluanGuru = trim($medan[2]);
							$sql = "INSERT INTO `guru` 
							VALUES ('$IdGuru','$NamaGuru', '$KatalaluanGuru')";
							$result = mysqli_query($conn, $sql);
							if($result){
								$berjaya = true;
							}else{
								$berjaya = false;
							}		
						}
						
						// If selected table is keputusan
						if($namaJadual === "keputusan"){
							$medan = explode(',' ,fgets($fail));
							$IdKeputusan = $medan[0];
							$IdMurid = $medan[1];
							$IdSoalan = $medan[2];
							$JawapanMurid = $medan[3];
							$Kebenaran = $medan[4];
							$Tarikh = trim($medan[5]);
							$sql = "INSERT INTO `keputusan` 
							VALUES ('$IdKeputusan','$IdMurid', '$IdSoalan', '$JawapanMurid', '$Kebenaran', '$Tarikh')";
							$result = mysqli_query($conn, $sql);
							
							if($result){
								$berjaya = true;
							}else{
								$berjaya = false;
							}	
			
						}	
					}

					// If berjaya import
					if($berjaya)
						echo"<script>alert('Rekod berjaya diimport!')</script>";
					
					// If not berjaya import
					else
						echo"<script>alert('Rekod tidak berjaya diimport!')</script>";
				
				// If user click the submit button without selecting the .txt file
				}else
				 	echo"<script>alert('Tidak Ada Fail!')</script>";	
			}
		?>

		<?php
			// footer.php is a file to add side menu sliding function
			include("footer.php");
		?>
		
	</body>
</html>