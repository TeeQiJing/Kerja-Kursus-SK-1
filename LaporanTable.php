<?php
	// Start session
	session_start();
    error_reporting(E_ALL & ~E_NOTICE);
    include("notUser.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Laporan Jadual</title>
		<link href="LaporanTable.css" rel="stylesheet">
		<link href="header.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("header.php");
            include("sambungan.php");
		?>


		<div id="content">
            <div id="quickSearch">
                <h2>Kandungan</h2>
                <ul>
                    <li><a href="#jadualMurid">Jadual Murid</a></li>
                    <li><a href="#jadualGuru">Jadual Guru</a></li>
                    <li><a href="#jadualTopik">Jadual Topik</a></li>
                    <li><a href="#jadualSoalan">Jadual Soalan</a></li>
                    <li><a href="#jadualKelas">Jadual Kelas</a></li>
                </ul>
            </div>
            <table id="tableMurid">
                <tr>
                    <th colspan="100%" class="jadualTitle">Jadual Murid</th>
                </tr>
                <tr>
                    <th>Id Murid</th>
                    <th>Nama Murid</th>
                    <th>Katalaluan Murid</th>
                    <th>Id Kelas</th>
                </tr>
                <span id="jadualMurid"></span>
                <?php
                    $result1 = mysqli_query($conn, "SELECT * FROM murid");
                    while($row1 = mysqli_fetch_array($result1)){
                        echo "<tr>";
                        echo "<td>" . $row1['IdMurid'] . "</td>";
                        echo "<td>" . $row1['NamaMurid'] . "</td>";
                        echo "<td>" . $row1['KatalaluanMurid'] . "</td>";
                        echo "<td>" . $row1['IdKelas'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <table id="tableGuru">
                <tr>
                    <th colspan="100%" class="jadualTitle">Jadual Guru</th>
                </tr>
                <tr>
                    <th>Id Guru</th>
                    <th>Nama Guru</th>
                    <th>Katalaluan Guru</th>
                </tr>
                <span id="jadualGuru"></span>
                <?php
                    $result2 = mysqli_query($conn, "SELECT * FROM guru");
                    while($row2 = mysqli_fetch_array($result2)){
                        echo "<tr>";
                        echo "<td>" . $row2['IdGuru'] . "</td>";
                        echo "<td>" . $row2['NamaGuru'] . "</td>";
                        echo "<td>" . $row2['KatalaluanGuru'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <table id="tableTopik">
                <tr>
                    <th colspan="100%" class="jadualTitle">Jadual Topik</th>
                </tr>
                <tr>
                    <th>Id Topik</th>
                    <th>Nama Topik</th>
                </tr>
                <span id="jadualTopik"></span>
                <?php
                    $result3 = mysqli_query($conn, "SELECT * FROM topik");
                    while($row3 = mysqli_fetch_array($result3)){
                        echo "<tr>";
                        echo "<td>" . $row3['IdTopik'] . "</td>";
                        echo "<td>" . $row3['NamaTopik'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <table id="tableSoalan">
                <tr>
                    <th colspan="100%" class="jadualTitle">Jadual Soalan</th>
                </tr>
                <tr>
                    <th>Id Soalan</th>
                    <th>Nama Soalan</th>
                    <th>Pilihan A</th>
                    <th>Pilihan B</th>
                    <th>Pilihan C</th>
                    <th>Pilihan D</th>
                    <th>Jawapan</th>
                    <th>Id Guru</th>
                    <th>Id Topik</th>
                </tr>
                <span id="jadualSoalan"></span>
                <?php
                    $result4 = mysqli_query($conn, "SELECT * FROM soalan");
                    while($row4 = mysqli_fetch_array($result4)){
                        echo "<tr>";
                        echo "<td>" . $row4['IdSoalan'] . "</td>";
                        echo "<td>" . $row4['NamaSoalan'] . "</td>";
                        echo "<td>" . $row4['PilihanA'] . "</td>";
                        echo "<td>" . $row4['PilihanB'] . "</td>";
                        echo "<td>" . $row4['PilihanC'] . "</td>";
                        echo "<td>" . $row4['PilihanD'] . "</td>";
                        echo "<td>" . $row4['Jawapan'] . "</td>";
                        echo "<td>" . $row4['IdGuru'] . "</td>";
                        echo "<td>" . $row4['IdTopik'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <table id="tableKelas">
                <tr>
                    <th colspan="100%" class="jadualTitle">Jadual Kelas</th>
                </tr>
                <tr>
                    <th>Id Kelas</th>
                    <th>Nama Kelas</th>
                </tr>
                <span id="jadualKelas"></span>
                <?php
                    $result5 = mysqli_query($conn, "SELECT * FROM kelas");
                    while($row5 = mysqli_fetch_array($result5)){
                        echo "<tr>";
                        echo "<td>" . $row5['IdKelas'] . "</td>";
                        echo "<td>" . $row5['Kelas'] . "</td>";
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