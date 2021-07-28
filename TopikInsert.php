<?php
	// Start session
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Tambah Topik Baharu</title>
		<link href="header.css" rel="stylesheet">
		<link href="TopikInsert.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("header.php");
		?>

		<div id="content">
			<div class="center">
				<h1>Tambah Topik Baharu</h1>
				
				<form action="TopikInsert.php" method="POST">
					<div class="txt_field">
						<input type="text" id="IdTopik" name="IdTopik" required>
						<span></span>
						<label>Id Topik</label>
					</div>

					<div class="txt_field">
						<input type="text" id="NamaTopik" name="NamaTopik" required>
						<span></span>
						<label>Nama Topik</label>
					</div>

					<input type="submit" value="Tambah" name="TambahTopik" id="TambahTopik">

					
				</form>
			</div>

		<?php
			//include database connection
			include("sambungan.php");

			//if user click tambah button...
			if(isset($_POST['TambahTopik'])){

				//Get the data inserted by user
				$IdTopik = $_POST['IdTopik'];
				$NamaTopik = $_POST['NamaTopik'];
					
                $checksql = "SELECT * FROM topik WHERE IdTopik='$IdTopik'";			
                $result = mysqli_query($conn, $checksql);

                //if can find IdTopik in database... (Means that this IdTopik is exist and cannot insert as new)
                if(mysqli_num_rows($result)==1){
                    echo("<script>alert('Id Topik sudah ada, sila tambah Id Topik lain!!!')</script>");
                }else{
                    //if IdTopik is not found(Database does not has that IdTopik, user can insert as new)
                    //Tambah(Insert data into database)
                    $sql = "INSERT INTO topik(IdTopik, NamaTopik) VALUES('$IdTopik', '$NamaTopik')";
                    
                    //if data are inserted successfully...
                    if(mysqli_query($conn, $sql)){
                        echo"New record is inserted sucessfully";
                        echo "
                        <script>
                            if(confirm('Berjaya tambah topik baharu')){
                                window.location.href='TopikInsert.php';
                            }
                        </script>";
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