<?php
	// Start session
	session_start();
    error_reporting(E_ALL & ~E_NOTICE);
    include("notUser.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Senarai Guru</title>
		<link href="GuruSenarai.css" rel="stylesheet">
		<link href="header.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("header.php");
            include("sambungan.php");
		?>


		<div id="content">
            
            <form action="GuruSenarai.php" method="POST">
            <table id="tableGuru">
                <tr>
                    <th colspan="100%" class="jadualTitle">Senarai Guru</th>
                </tr>
                <tr>
                    <th>Id Guru</th>
                    <th>Nama Guru</th>
                    <th>Katalaluan Guru</th>
                    <th><input type='checkbox' id='checkAll' value=''></th>
                </tr>
                
                <?php
                    $result2 = mysqli_query($conn, "SELECT * FROM guru");
                    while($row2 = mysqli_fetch_array($result2)){
                        echo "<tr>";
                        echo "<td>" . $row2['IdGuru'] . "</td>";
                        echo "<td>" . $row2['NamaGuru'] . "</td>";
                        echo "<td>" . $row2['KatalaluanGuru'] . "</td>";
                        echo "<td padding=0><input type='checkbox' name='checkBox[]' class='checkBox' value='$row2[IdGuru]'></td>";
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
                        $deleteResult = mysqli_query($conn, "DELETE FROM guru WHERE IdGuru='$value'");
                    }
                }
                header("Refresh: 1");
            }
            
        ?>
	</body>
</html>