<?php
	// Start session
	session_start();
	// Report all errors except E_NOTICE
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Laporan</title>
		<link href="Laporan.css" rel="stylesheet">
		<link href="header.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("header.php");
		?>		
		<!--Laporan Div-->
		<div id="content">
			<h2 id="laporanTitle">Laporan Keputusan Murid</h2>		
			<?php
				//include database connection
            	include("sambungan.php");
				//find Id and Nama and store in variable 
				$IdMuridNow = $_SESSION['IdMurid'];
				$IdGuruNow = $_SESSION['IdGuru'];
				$NamaMuridNow = $_SESSION['NamaMurid'];
				$NamaGuruNow = $_SESSION['NamaGuru'];
				//if IdMurid is not empty...(Means that the user is a student)
				if(!empty($IdMuridNow)){
					//Select all from table `keputusan` 
					$result2 = mysqli_query($conn, "SELECT * FROM keputusan WHERE IdMurid='$IdMuridNow'");
					//Print out table
            		echo "
            		<table id='tableMurid'>
                		<tr>
                    		<th>Id Keputusan</th>
                    		<th>Id Murid</th>
                    		<th>Nama Murid</th>
                    		<th>Id Soalan</th>
							<th>Jawapan Murid</th>
                    		<th>Kebenaran</th>
							<th>Tarikh</th>
                		</tr>";
                		while($row2 = mysqli_fetch_array($result2)){
                    		echo "<tr>";
							echo "<td>" . $row2['IdKeputusan'] . "</td>";
                    		echo "<td>" . $IdMuridNow . "</td>";
                   	 		echo "<td>" . $NamaMuridNow . "</td>";
                    		echo "<td>" . $row2['IdSoalan'] . "</td>";
                    		echo "<td>" . $row2['JawapanMurid'] . "</td>";
							echo "<td>" . $row2['Kebenaran'] . "</td>";
							echo "<td>" . $row2['Tarikh'] . "</td>";
                    		echo "</tr>";
                		}
						echo "<tr>";
					// Calculate total number of questions which are answered correctly by the specific student
					$result3 = mysqli_query($conn, "SELECT count(Kebenaran) AS 'betul' FROM keputusan 
					WHERE IdMurid='$IdMuridNow' AND Kebenaran='betul'");
					$row3 = mysqli_fetch_array($result3);
					$betul = $row3['betul'];
					// Calculate total number of questions which are answered by the specific student
					$result4 = mysqli_query($conn, "SELECT count(Kebenaran) AS 'totalSoalan' FROM keputusan 
					WHERE IdMurid='$IdMuridNow'");
					$row4 = mysqli_fetch_array($result4);
					$totalSoalan = $row4['totalSoalan'];
					// if total questions answered by the specific student is not 0... (if student has answered at least 1 question)
					if($totalSoalan!=0){
						//Calculate the percentage of questions which are answered correctly
						$peratusResult = round(($betul/$totalSoalan)*100, 2);
						//Calculate the grade based on the percentage
						if($peratusResult>=0 AND $peratusResult<40){
							$gred = "F";
						}else if($peratusResult>=40 AND $peratusResult<50){
							$gred = "E";
						}else if($peratusResult>=50 AND $peratusResult<60){
							$gred = "D";
						}else if($peratusResult>=60 AND $peratusResult<70){
							$gred = "C";
						}else if($peratusResult>=70 AND $peratusResult<80){
							$gred = "B";
						}else if($peratusResult>=80 AND $peratusResult<=100){
							$gred = "A";
						}
					}else{
						//if the student does not answer any question and he/she wants to check percentage and grade
						$peratusResult = "";
						$gred = "Tidak ada gred";
					}
					//Do a conclusion/analysis about the score
					echo "<td id='ConcluKeputusan' colspan='7'>";
					echo "<span id='goLeft'>Keputusan : ".$betul."/".$totalSoalan."</span>";
					echo "<span id='goMiddle'>Peratus : " .$peratusResult."%</span>";
					echo "<span id='goRight'>Gred anda : ".$gred."</span>";
					echo "</td></tr>";
					echo "<tr>
						<td colspan='7'><button id='print' onclick='window.print()' name='print'>Print</button></td>
					</tr>";
					echo "</table>";
				}
				//if IdGuru is not empty...(Means that the user is a teacher)
				if(!empty($IdGuruNow)){					
					// Sorting options
					echo "<div id='guruSelect'>";
					echo "<form action='#' method='post'>";
					echo "<select name='urutan'>";
					echo "<option selected value='IdKeputusanASC'>Id Keputusan ASC</option>";
					echo "<option value='IdKeputusanDESC'>Id Keputusan DESC</option>";
					echo "<option value='IdMuridASC'>Id Murid ASC</option>";
					echo "<option value='IdMuridDESC'>Id Murid DESC</option>";
					echo "<option value='TarikhASC'>Tarikh ASC</option>";
					echo "<option value='TarikhDESC'>Tarikh DESC</option>";
					echo "</select>";
					echo "<button id='susun' type='submit' name='susun' value='susun'>susun</button>";
					echo "<button id='laporanTable' type='submit' name='laporanTable'>Laporan Jadual</button>";
					echo "</form>";
					echo "</div>";
					//Select all from table `keputusan` 
					$sql = "SELECT * FROM keputusan ORDER BY IdKeputusan ASC";
					//if the susun button is clicked...
					if(isset($_POST['susun'])){
						//Check the sorting option selected and produce a sql depends on the sorting option
						if($_POST['urutan']=='IdKeputusanDESC'){
							$sql = "SELECT * FROM keputusan ORDER BY IdKeputusan DESC";
						}else if($_POST['urutan']=='IdMuridASC'){
							$sql = "SELECT * FROM keputusan ORDER BY IdMurid ASC";
						}else if($_POST['urutan']=='IdMuridDESC'){
							$sql = "SELECT * FROM keputusan ORDER BY IdMurid DESC";
						}else if($_POST['urutan']=='TarikhASC'){
							$sql = "SELECT * FROM keputusan ORDER BY Tarikh ASC";
						}else if($_POST['urutan']=='TarikhDESC'){
							$sql = "SELECT * FROM keputusan ORDER BY Tarikh DESC";
						}

					}
					//Get the result/data depends on the sql
					$result1 = mysqli_query($conn, $sql);
					//Create a table to print output
            		echo "<form action='#' method='POST'>
            		<table id='tableGuru'>
                		<tr>
                    		<th>Id Keputusan</th>
                    		<th>Id Murid</th>
                    		<th>Nama Murid</th>
                    		<th>Id Soalan</th>
							<th>Jawapan Murid</th>
                    		<th>Kebenaran</th>
							<th>Tarikh</th>
							<th><input type='checkbox' id='checkAll' value=''></th>
                		</tr>";
                		while($row = mysqli_fetch_array($result1)){
                    		echo "<tr>";
							echo "<td>" . $row['IdKeputusan'] . "</td>";
							$IdMurid = $row['IdMurid'];
                    		echo "<td>" . $IdMurid . "</td>";
							$result2 = mysqli_query($conn, "SELECT * FROM murid WHERE IdMurid = '$IdMurid'");
							$murid = mysqli_fetch_array($result2);
                   	 		echo "<td>" . $murid['NamaMurid'] . "</td>";
                    		echo "<td>" . $row['IdSoalan'] . "</td>";
                    		echo "<td>" . $row['JawapanMurid'] . "</td>";
							echo "<td>" . $row['Kebenaran'] . "</td>";
							echo "<td>" . $row['Tarikh'] . "</td>";
							echo "<td padding=0><input type='checkbox' name='checkBox[]' class='checkBox' value='$row[IdKeputusan]'></td>";
                    		echo "</tr>";							
                		}
            		echo "
					<tr>
						<td colspan='8'>
							<button id='print' onclick='window.print()' name='print'>Print</button>							
							<button id='analisis' name='analisis'>Analisis</button>					
							<button id='delete' name='delete'>Delete</button>
						</td>	
					</tr>
					</table>
				</form>";
				}
			?>
			<script>
				//CheckAll or UnCheckAll
				const allBtn = document.querySelector('#checkAll');
				allBtn.onclick = checkAll;
				function check(checked = true) {
    				const checkboxes = document.querySelectorAll("input[class='checkBox']");
    				checkboxes.forEach((cb) => {
        				cb.checked = checked;
    				});
				}
				function checkAll() {
    				check();
    				// reassign click event handler
    				this.onclick = uncheckAll;
				}
				function uncheckAll() {
    				check(false);
    				// reassign click event handler
    				this.onclick = checkAll;
				}	
			</script>
			<?php
				if(isset($_POST['laporanTable'])){
					echo"<script>window.location = 'LaporanTable.php'</script>";
				}
				if(isset($_POST['delete'])){
					if(!empty($_POST['checkBox'])) {    
						foreach($_POST['checkBox'] as $value){
							$deleteResult = mysqli_query($conn, "DELETE FROM keputusan WHERE IdKeputusan='$value'");
						}
					}
					echo"<script>window.location = 'Laporan.php'</script>";
				}
				if(isset($_POST['analisis'])){
					echo"<script>window.location = 'LaporanAnalisis.php'</script>";
				}	
			?>
		</div>
		<?php
			include("footer.php");
		?>
	</body>
</html>

