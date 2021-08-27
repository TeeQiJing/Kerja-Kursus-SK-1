<?php
	// Start session
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Kemaskini Soalan</title>
		<link href="header.css" rel="stylesheet">
		<link href="SoalanUpdate.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("header.php");
		?>

		<div id="content">
			<div id="TeacherContent">
                <h1>Kemaskini Soalan</h1>
				
				<form action='SoalanUpdate.php' method='POST' autocomplete="off">
					<div class='txt_field'>
                        <select name='IdSoalan' id='IdSoalan' required>
                            <?php
								include('sambungan.php');
								$result = mysqli_query($conn, "SELECT * FROM soalan");

								while($soalan = mysqli_fetch_assoc($result)){

									echo"<option value='$soalan[IdSoalan]'>$soalan[IdSoalan]</option>";
								}
                            ?>
						</select>
						<span></span>
						<label>Sila Pilih Soalan</label>
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
                            <select name='IdGuru' id='IdGuru' required>
                                <?php
								    include('sambungan.php');
								    $result = mysqli_query($conn, "SELECT * FROM guru");

								    while($guru = mysqli_fetch_assoc($result)){
									    echo"<option value='$guru[IdGuru]'>$guru[IdGuru]</option>";
								    }
                                ?>
						    </select>
							<span></span>
							<label>Guru</label>
						</div>

						<div class='txt_field' id='IdTopikTextField'>
							<select name='IdTopik' id='IdTopik' required>
                                <?php
                                    include('sambungan.php');
                                    $result = mysqli_query($conn, "SELECT * FROM topik");

                                    while($topik = mysqli_fetch_assoc($result)){
                                        echo"<option value='$topik[IdTopik]'>$topik[IdTopik].$topik[NamaTopik]</option>";
                                    }
                                ?>
							</select>
							<span></span>
							<label>Sila Pilih Topik</label>
						</div>
		
						<input type="submit" value="Kemaskini" name="UpdateSoalan">
					</form>
			</div>

		<?php
			//include database connection
			include("sambungan.php");

			//if user click Update button...
			if(isset($_POST['UpdateSoalan'])){

				//Get the data inserted by user
				$IdSoalan = $_POST['IdSoalan'];
                $NamaSoalan = $_POST['NamaSoalan'];
                $PilihanA = $_POST['PilihanA'];
                $PilihanB = $_POST['PilihanB'];
                $PilihanC = $_POST['PilihanC'];
                $PilihanD = $_POST['PilihanD'];
                $Jawapan = $_POST['Jawapan'];
                $IdGuru = $_POST['IdGuru'];	
                $IdTopik = $_POST['IdTopik'];

				if(strlen($Jawapan) != 1){
					echo "
					<script>
						alert('Jawapan mesti 1 aksara sahaja!!!');
						window.location = 'SoalanUpdate.php';
					</script>";
				}else if($Jawapan == "A" || $Jawapan == "B" || $Jawapan == "C" || $Jawapan == "D"){

					//Update new data 
					$sql = "UPDATE soalan 
					SET NamaSoalan='$NamaSoalan', PilihanA='$PilihanA', PilihanB='$PilihanB', PilihanC='$PilihanC', PilihanD='$PilihanD', Jawapan='$Jawapan', IdGuru='$IdGuru', IdTopik='$IdTopik' 
					WHERE IdSoalan='$IdSoalan'";
					
					//if data are updated successfully...
					if(mysqli_query($conn, $sql)){
						echo "<script>alert('Berjaya kemaskini soalan');</script>";
					}else {
						echo "<script>alert('Tidak berjaya kemaskini soalan');</script>";
					}
					echo "<script>window.location='SoalanUpdate.php';</script>";
				}else {
					echo "
					<script>
						alert('Jawapan mesti huruf besar A, B, C atau D sahaja!!!');
						window.location = 'SoalanUpdate.php';
					</script>";
				}
				
			}
		?>
		
		</div>
		<?php
			include("footer.php");
		?>
	</body>
</html>