<?php
	// Start session
	session_start();
    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Laporan Analisis</title>
		<link href="Laporan.css" rel="stylesheet">
		<link href="header.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("header.php");
            include("sambungan.php");
		?>


		<div id="content">
            <h2 id="laporanTitle">Laporan Analisis Murid</h2>
			
            <table id='tableMurid'>
                <tr>
                    <th>Id Murid</th>
                    <th>Nama Murid</th>
                    <th>Id Kelas</th>
                    <th>Nama Kelas</th>
                    <th>Keputusan</th>
                    <th>Peratus</th>
                    <th>Gred</th>
                </tr>
			
			<?php
                $sql1 = "SELECT * FROM murid";
                $result1 = mysqli_query($conn, $sql1);
                while($row1 = mysqli_fetch_array($result1)){

                    $sql2 = "SELECT * FROM kelas WHERE IdKelas = '$row1[IdKelas]'";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_array($result2);

                    $sql3 = "SELECT COUNT(IdKeputusan) AS 'SumKeputusan' FROM keputusan WHERE IdMurid = '$row1[IdMurid]'";
                    $result3 = mysqli_query($conn, $sql3);
                    $row3 = mysqli_fetch_array($result3);
                    $totalSoalan = $row3['SumKeputusan'];

                    $sql4 = "SELECT COUNT(Kebenaran) AS 'SumCorrect' FROM keputusan WHERE IdMurid='$row1[IdMurid]' AND Kebenaran='betul'";
                    $result4 = mysqli_query($conn, $sql4);
                    $row4 = mysqli_fetch_array($result4);
                    $betul = $row4['SumCorrect'];

                    if($totalSoalan!=0){

                        $peratus = round(($betul/$totalSoalan)*100 , 2);

                        //Calculate the grade based on the percentage
                        if($peratus>=0 AND $peratus<40){
                            $gred = "F";
                        }else if($peratus>=40 AND $peratus<50){
                            $gred = "E";
                        }else if($peratus>=50 AND $peratus<60){
                            $gred = "D";
                        }else if($peratus>=60 AND $peratus<70){
                            $gred = "C";
                        }else if($peratus>=70 AND $peratus<80){
                            $gred = "B";
                        }else if($peratus>=80 AND $peratus<=100){
                            $gred = "A";
                        }
    
                    }else{
    
                        //if the student does not answer any question and he/she wants to check percentage and grade
                        $peratus = "0";
                        $gred = "Tidak ada gred";
    
                    }
                    echo "<tr>";
                    echo "<td>" . $row1['IdMurid'] . "</td>";
                    echo "<td>" . $row1['NamaMurid'] . "</td>";
                    echo "<td>" . $row1['IdKelas'] . "</td>";
                    echo "<td>" . $row2['Kelas'] . "</td>";
                    echo "<td>" . $betul . " / " . $totalSoalan . "</td>";
                    echo "<td>" . $peratus . " %</td>";
                    echo "<td>" . $gred . "</td>";
                    echo "</tr>";
                }
                
                ?>
            </table>
		</div>
		<?php
			include("footer.php");
		?>
	</body>
</html>