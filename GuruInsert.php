<?php
	// Start session
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Tambah Guru Baharu</title>
		<link href="borang.css" rel="stylesheet">
		<link href="header.css" rel="stylesheet">
		<style>
			input[type="submit"]{
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
				<h1>Tambah Guru Baharu</h1>
				
				<form action="GuruInsert.php" method="POST">
					<div class="txt_field">
						<input type="text" id="IdGuru" name="IdGuru" required>
						<span></span>
						<label>Id Guru</label>
					</div>

					<div class="txt_field">
						<input type="text" id="NamaGuru" name="NamaGuru" required>
						<span></span>
						<label>Nama Guru</label>
					</div>

					<div class="txt_field">
						<input type="password" id="KatalaluanGuru" name="KatalaluanGuru" required>
						<span></span>
						<label>Katalaluan Guru</label>
					</div>
				
					<input type="submit" value="Tambah" name="TambahGuru" id="TambahGuru">

					
				</form>
			</div>
			
		<?php
			//include database connection
			include("sambungan.php");

			//if user click tambah button...
			if(isset($_POST['TambahGuru'])){

				//Get the data inserted by user
				$IdGuru = $_POST['IdGuru'];
				$NamaGuru = $_POST['NamaGuru'];
				$KatalaluanGuru = $_POST['KatalaluanGuru'];
		
                $checksql = "SELECT * FROM guru WHERE IdGuru='$IdGuru'";	
                $result = mysqli_query($conn, $checksql);

                //if can find IdGuru in database... (Means that this IdGuru is exist and cannot insert as new)
                if(mysqli_num_rows($result)==1){
                    echo("<script>alert('Id Guru sudah ada, sila tambah Id Guru lain!!!')</script>");
                }else{

                    //if IdGuru is not found(Database does not has that IdGuru, user can insert it as new)
                    //Tambah(Insert data into database)
                    $sql = "INSERT INTO guru(IdGuru, NamaGuru, KatalaluanGuru) VALUES('$IdGuru', '$NamaGuru', '$KatalaluanGuru')";
                    
                    //if data are inserted successfully...
                    if(mysqli_query($conn, $sql)){
                        echo"New record is inserted sucessfully";
                        echo "<script>alert('Berjaya tambah guru baharu');</script>";
                    }else {
						echo "<script>alert('Tidak berjaya tambah guru baharu');</script>";
					}
					echo "<script>window.location='GuruInsert.php';</script>";
                }
				
			}
		?>

		</div>
		<?php
			include("footer.php");
		?>
	</body>
</html>