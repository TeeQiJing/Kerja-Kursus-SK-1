<?php
	// Start session
	session_start();
    error_reporting(E_ALL & ~E_NOTICE);
    include("notUser.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Senarai Soalan</title>
		<link href="SoalanSenarai.css" rel="stylesheet">
		<link href="header.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("header.php");
            include("sambungan.php");
		?>


		<div id="content">
            <form action="SoalanSenarai.php" method="POST">
            <table id="tableSoalan">
                <tr>
                    <th colspan="100%" class="jadualTitle">Senarai Soalan</th>
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
                    <th><input type='checkbox' id='checkAll' value=''></th>
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
                        echo "<td padding=0><input type='checkbox' name='checkBox[]' class='checkBox' value='$row4[IdSoalan]'></td>";
                        echo "</tr>";
                    }
                    echo"
                    <tr>
						<td colspan='100%'>
							<button id='delete' name='delete'>Delete</button>
						</td>	
					</tr>";
                ?>
            </table>
            </form>
		</div>
		<?php
			include("footer.php");
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
            if(isset($_POST['delete'])){
                if(!empty($_POST['checkBox'])) {    
                    foreach($_POST['checkBox'] as $value){
                        $deleteResult = mysqli_query($conn, "DELETE FROM soalan WHERE IdSoalan='$value'");
                    }
                }
                header("Refresh: 1");
            }
            
        ?>
	</body>
</html>