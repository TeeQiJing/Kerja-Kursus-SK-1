<?php
	// Start session
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);

?> 

<!DOCTYPE html>
<html>
	<head>
		<title>Import</title>
		<link href="Import.css" rel="stylesheet">
		<link href="header.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("header.php")
		?>
		<div id="content">
			<div class="center">
				<h1 id="importTitle">Import Data</h1>
				<form action="Import.php" method="POST" enctype="multipart/form-data">
					<div class="txt_field">
						<select name="namatable">
							<option value="keputusan">keputusan</option>
							<option value="kelas">kelas</option>
							<option value="murid">murid</option>
							<option value="soalan">soalan</option>
							<option value="guru">guru</option>
							<option value="topik">topik</option>
						</select>
						<span></span>
						<label>Pilih Jadual</label>
					</div>
					<div class="txt_field">
						 <input type="file" hidden="hidden" id="real-file" name="namafail" accept=".txt" required="required"> 
						<span id="custom-text">Tidak Ada Fail</span>
						<input type="button" value="Upload" id="custom-button">
						
						<span></span>
						<label>Pilih Fail</label>
						
					</div>
					
					<input type="submit" name="Import" value="Import">
					
					<script>
						const realFileBtn = document.getElementById("real-file")
						const customBtn = document.getElementById("custom-button")
						const customTxt = document.getElementById("custom-text")

						customBtn.addEventListener('click', function(){
							realFileBtn.click();
						})

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
		<?php
			if(isset($_POST['Import'])){
				include("sambungan.php");
				if($_FILES['namafail']['name']){
					$namaFail = $_FILES['namafail']['name'];
					$namaJadual = $_POST['namatable'];

					$fail = fopen($namaFail, 'r');
					while(!feof($fail)){
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
					if($berjaya)
						echo"<script>alert('Rekod berjaya diimport!')</script>";
					else
						echo"<script>alert('Rekod tidak berjaya diimport!')</script>";
				}else
				 	echo"<script>alert('Tidak Ada Fail!')</script>";
				
			}

		?>
		<?php
			include("footer.php");
		?>
		
	</body>
</html>