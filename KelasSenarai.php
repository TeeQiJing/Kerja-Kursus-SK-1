<?php
	// Start session
	session_start();
    error_reporting(E_ALL & ~E_NOTICE);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Senarai Kelas</title>
		<link href="Laporan.css" rel="stylesheet">
		<link href="header.css" rel="stylesheet">
        <style>
            table {
                margin-left: 50%;
                transform: translateX(-50%);
                width: 80%;
                margin-top: 130px;
                margin-bottom: 0px;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 15px 15px 6px rgba(106, 96, 96, 0.7);
            }
            #delete{
                border: 1px solid #070124;
                background-color: #8301da;
                color: white;
                padding: 10px 20px;
                border-radius: 10px;
                font-size: 16px;
                transition: .3s;
                font-weight: bold;
                margin: 10px 20px 10px 0;
                float: right;
            }
            #delete:hover {
                background-color: #8301da79;
                border: 1px solid #a306c2;
            }
            input[type=checkbox]{
                margin: 2px;
                padding: 0;
                width: 18px;
                height: 18px;
                border: none;
                background-color: #f85cf0; 
            }
        </style>
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