<?php
	// Start session
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
?> 
<!DOCTYPE html>
<html>
	<head>
		<title>Kuiz</title>
		<link href="Kuiz.css" rel="stylesheet">
		<link href="header.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("header.php");
		?>
		<?php
			$IdTopikPilih = $_POST["IdTopikSelect"];
			$_SESSION["IdTopikPilih"] = $IdTopikPilih;
			//Connection to database
			include("sambungan.php");
			$sql1 = "SELECT NamaTopik FROM topik WHERE IdTopik='$IdTopikPilih'";
			$result1 = mysqli_query($conn, $sql1);
			$topik = mysqli_fetch_array($result1);
		?>
		<!--Kuiz Div-->
		<div id="content">
			<!--Print the $IdTopikPilih (the IdTopik which is chosen in Pilih.php)-->
			<h2 id="topikTitle">Topik : <?php echo $IdTopikPilih." ".$topik["NamaTopik"];?></h2>
			<!--Main Form-->
			<form action="check.php" method="post" id="quizForm">
				<!--Print all the questions depend on the chosen IdTopik-->
				<table>
					<tr>
						<th style="width: 50px;">Bil</th>
						<th style="width: 800px;">Soalan</th>
					</tr>
					<?php
						//Get all questions with the IdTopik
						$sql2 = "SELECT * FROM soalan WHERE IdTopik='$IdTopikPilih' ORDER BY IdSoalan ASC";	
						$result2 = mysqli_query($conn, $sql2);
						$bil = 1;
						//While loop(loop every item)
						while($soalan = mysqli_fetch_array($result2)){	

					?>
					<tr>
						<td class="bil" style="text-align: center;"><?php echo $bil;?></td>
						<td class="soalan">
							<?php echo $soalan["NamaSoalan"];?><br>
							<input type="radio" name="<?php echo $soalan["IdSoalan"];?>" value="A">
							<?php echo "A. ".$soalan["PilihanA"];?><br>
							<input type="radio" name="<?php echo $soalan["IdSoalan"];?>" value="B">
							<?php echo "B. ".$soalan["PilihanB"];?><br>
							<input type="radio" name="<?php echo $soalan["IdSoalan"];?>" value="C">
							<?php echo "C. ".$soalan["PilihanC"];?><br>
							<input type="radio" name="<?php echo $soalan["IdSoalan"];?>" value="D">
							<?php echo "D. ".$soalan["PilihanD"];?><br>
						</td>
					</tr>
					<?php 
						$bil+=1;
						}
					?>
					<tr>
						<td colspan="2" height="60px" id="semakRow">
							<!--Semak Button-->
							<button class="semak" type="submit">SEMAK</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<?php include("footer.php");?>
	</body>
</html>