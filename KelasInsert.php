<?php
	// Start session
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Tambah Kelas Baharu</title>
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
				<h1>Tambah Kelas Baharu</h1>
				
				<form action="KelasInsert.php" method="POST" autocomplete="off">
					<div class="txt_field">
						<input type="text" id="IdKelas" name="IdKelas" placeholder=" " pattern="[0-9]{1}[A-Z]{1}" title="1 Int followed by 1 Capital letter"required>
						<span></span>
						<label>Id Kelas</label>
					</div>

					<div class="txt_field">
						<input type="text" id="NamaKelas" name="NamaKelas" placeholder=" "required>
						<span></span>
						<label>Nama Kelas</label>
					</div>

					<input type="submit" value="Tambah" name="TambahKelas" id="TambahKelas">

					
				</form>
			</div>

		<?php
			//include database connection
			include("sambungan.php");

			//if user click tambah button...
			if(isset($_POST['TambahKelas'])){

				//Get the data inserted by user
				$IdKelas = $_POST['IdKelas'];
				$NamaKelas = $_POST['NamaKelas'];
					
                $checksql = "SELECT * FROM kelas WHERE IdKelas='$IdKelas'";			
                $result = mysqli_query($conn, $checksql);

                //if can find IdKelas in database... (Means that this IdKelas is exist and cannot insert as new)
                if(mysqli_num_rows($result)==1){
                    echo("<script>alert('Id Kelas sudah ada, sila tambah Id Kelas lain!!!')</script>");
                }else{
                    //if IdKelas is not found(Database does not has that IdKelas, user can insert as new)
                    //Tambah(Insert data into database)
                    $sql = "INSERT INTO kelas(IdKelas, Kelas) VALUES('$IdKelas', '$NamaKelas')";
                    
                    //if data are inserted successfully...
                    if(mysqli_query($conn, $sql)){
                        echo"New record is inserted sucessfully";
                        echo "<script>alert('Berjaya tambah kelas baharu');</script>";
                    }else {
						echo "<script>alert('Tidak berjaya kelas guru baharu');</script>";
					}
					echo "<script>window.location='KelasInsert.php';</script>";
                }
				
			}
		?>
		
		</div>
		<?php
			include("footer.php");
		?>
	</body>
</html>