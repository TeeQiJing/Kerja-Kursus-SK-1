<?php
	// Start session
	session_start();
    error_reporting(E_ALL & ~E_NOTICE);
    include("notUser.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Senarai Kelas</title>
		<link href="KelasSenarai.css" rel="stylesheet">
		<link href="header.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("header.php");
            include("sambungan.php");
		?>


		<div id="content">
            <form action="KelasSenarai.php" method="POST">
            <table id="tableKelas">
                <tr>
                    <th colspan="100%" class="jadualTitle">Senarai Kelas</th>
                </tr>
                <tr>
                    <th>Id Kelas</th>
                    <th>Nama Kelas</th>
                    <th><input type='checkbox' id='checkAll' value=''></th>
                </tr>
                <span id="jadualKelas"></span>
                <?php
                    $result5 = mysqli_query($conn, "SELECT * FROM kelas");
                    while($row5 = mysqli_fetch_array($result5)){
                        echo "<tr>";
                        echo "<td>" . $row5['IdKelas'] . "</td>";
                        echo "<td>" . $row5['Kelas'] . "</td>";
                        echo "<td padding=0><input type='checkbox' name='checkBox[]' class='checkBox' value='$row5[IdKelas]'></td>";
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
                        $deleteResult = mysqli_query($conn, "DELETE FROM kelas WHERE IdKelas='$value'");
                    }
                }
                echo "<script>window.location='KelasSenarai.php'</script>";
            }
            
        ?>
	</body>
</html>