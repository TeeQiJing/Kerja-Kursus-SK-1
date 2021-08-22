<?php
	// Start session
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Tambah Murid Baharu</title>
		<link href="header.css" rel="stylesheet">
		<link href="borang.css" rel="stylesheet">
		<style>
			input[type="submit"]{
				width: 100%;
				height: 50px;
				border: 1px solid;
				background: #2691d9;
				border-radius: 25px;
				font-size: 19px;
				color: #e9f4fb;
				font-weight: 700;
				cursor: pointer;
				outline: none;
				margin-bottom: 30px;
			}	
		</style>
	</head>
	<body>
		<?php
			include("header.php");
		?>

		<div id="content">
			<div class="center">
				<h1>Tambah Murid Baharu</h1>
				
				<form action="MuridInsert.php" method="POST">
					<div class="txt_field">
						<input type="text" id="IdMurid" name="IdMurid" required>
						<span></span>
						<label>Id Murid</label>
					</div>

					<div class="txt_field">
						<input type="text" id="NamaMurid" name="NamaMurid" required>
						<span></span>
						<label>Nama Murid</label>
					</div>

					<div class="txt_field">
						<input type="password" id="KatalaluanMurid" name="KatalaluanMurid" required>
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
				
					<input type="submit" value="Tambah" name="TambahMurid" id="TambahMurid">

					
				</form>
			</div>

		<?php
			//include database connection
			include("sambungan.php");

			//if user click tambah button...
			if(isset($_POST['TambahMurid'])){

				//Get the data inserted by user
				$IdMurid = $_POST['IdMurid'];
				$NamaMurid = $_POST['NamaMurid'];
				$KatalaluanMurid = $_POST['KatalaluanMurid'];
				$IdKelas = $_POST['IdKelas'];
					
                $checksql = "SELECT * FROM murid WHERE IdMurid='$IdMurid'";			
                $result = mysqli_query($conn, $checksql);

                //if can find IdMurid in database... (Means that this IdMurid is exist and can insert as new)
                if(mysqli_num_rows($result)==1){
                    echo("<script>alert('Id Murid sudah ada, sila tambah Id Murid lain!!!')</script>");
                }else{
                    //if IdMurid is not found(Database does not has that IdMurid, user can insert it as new)
                    //Tambah(Insert data into database)
                    $sql = "INSERT INTO murid(IdMurid, NamaMurid, KatalaluanMurid, IdKelas) VALUES('$IdMurid', '$NamaMurid', '$KatalaluanMurid', '$IdKelas')";
                    
                    //if data are inserted successfully...
                    if(mysqli_query($conn, $sql)){
                        echo"New record is inserted sucessfully";
                        echo "<script>alert('Berjaya tambah murid baharu');</script>";
                    }else {
						echo "<script>alert('Tidak berjaya tambah murid baharu');</script>";
					}
					echo "<script>window.location='MuridInsert.php';</script>";
                }
				
			}
		?>
		
		</div>
		<?php
			include("footer.php");
		?>
	</body>
</html>