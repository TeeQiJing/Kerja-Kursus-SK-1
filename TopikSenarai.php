<?php
	// Start session
	session_start();
    error_reporting(E_ALL & ~E_NOTICE);
    include("notUser.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Senarai Topik</title>
		<link href="TopikSenarai.css" rel="stylesheet">
		<link href="header.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("header.php");
            include("sambungan.php");
		?>


		<div id="content">
            <form action="TopikSenarai.php" method="POST">
            <table id="tableTopik">
                <tr>
                    <th colspan="100%" class="jadualTitle">Senarai Topik</th>
                </tr>
                <tr>
                    <th>Id Topik</th>
                    <th>Nama Topik</th>
                    <th><input type='checkbox' id='checkAll' value=''></th>
                </tr>

                <?php
                    $result3 = mysqli_query($conn, "SELECT * FROM topik");
                    while($row3 = mysqli_fetch_array($result3)){
                        echo "<tr>";
                        echo "<td>" . $row3['IdTopik'] . "</td>";
                        echo "<td>" . $row3['NamaTopik'] . "</td>";
                        echo "<td padding=0><input type='checkbox' name='checkBox[]' class='checkBox' value='$row3[IdTopik]'></td>";
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
                        $deleteResult = mysqli_query($conn, "DELETE FROM topik WHERE IdTopik='$value'");
                    }
                }
                echo "<script>window.location='TopikSenarai.php'</script>";
            }
            
        ?>
	</body>
</html>