<?php
	// Start session
	session_start();
    error_reporting(E_ALL & ~E_NOTICE);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Senarai Murid</title>
		<link href="Laporan.css" rel="stylesheet">
		<link href="header.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <style>
            table {
                margin-left: 50%;
                transform: translateX(-50%);
                width: 80%;
                margin-top: 200px;
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
            <form action="MuridSenarai.php" method="POST">
                <div class="wrapper">
                    <input type="text" class="input" name="IdMurid" placeholder="Cari Id Murid, type 'all' to show all" required>
                    <div id="searchbtn" class="searchbtn"><i class="fas fa-search"></i></div>
                </div>
                <input type="submit" id="cari" value="Cari" name="cari" style="display: hidden;">
            </form>
            <script>
                var fakebtn = document.getElementById("searchbtn");
                fakebtn.onclick = function(){
                    document.getElementById("cari").click();
                }
            </script>
            <?php
            if(isset($_POST['cari'])){
                $IdMurid = $_POST['IdMurid'];
                if($IdMurid == "all"){
                    $sql = "SELECT * FROM murid ORDER BY IdMurid";
                }else{
                    $sql = "SELECT * FROM murid WHERE IdMurid='$IdMurid'";
                }
                echo'
                <form action="MuridSenarai.php" method="POST">
                    <table id="tableMurid">
                        <tr>
                            <th colspan="100%" class="jadualTitle">Senarai Murid</th>
                        </tr>
                        <tr>
                            <th>Id Murid</th>
                            <th>Nama Murid</th>
                            <th>Katalaluan Murid</th>
                            <th>Id Kelas</th>
                            <th><input type="checkbox" id="checkAll" value=""></th>
                        </tr>';?>
                        
                        <?php
                            $result1 = mysqli_query($conn, $sql);
                            while($row1 = mysqli_fetch_array($result1)){
                                echo "<tr>";
                                echo "<td>" . $row1['IdMurid'] . "</td>";
                                echo "<td>" . $row1['NamaMurid'] . "</td>";
                                echo "<td>" . $row1['KatalaluanMurid'] . "</td>";
                                echo "<td>" . $row1['IdKelas'] . "</td>";
                                echo "<td padding=0><input type='checkbox' name='checkBox[]' class='checkBox' value='$row1[IdMurid]'></td>";
                                echo "</tr>";
                            }
                            echo'
                            <tr>
                                <td colspan="100%">
                                    <button id="delete" name="delete">Delete</button>
                                </td>	
                            </tr>
                    </table>
                </form>';
                

            }else{
                echo'
                <form action="MuridSenarai.php" method="POST">
                    <table id="tableMurid">
                        <tr>
                            <th colspan="100%" class="jadualTitle">Senarai Murid</th>
                        </tr>
                        <tr>
                            <th>Id Murid</th>
                            <th>Nama Murid</th>
                            <th>Katalaluan Murid</th>
                            <th>Id Kelas</th>
                            <th><input type="checkbox" id="checkAll" value=""></th>
                        </tr>';?>
                        
                        <?php
                            $result1 = mysqli_query($conn, "SELECT * FROM murid");
                            while($row1 = mysqli_fetch_array($result1)){
                                echo "<tr>";
                                echo "<td>" . $row1['IdMurid'] . "</td>";
                                echo "<td>" . $row1['NamaMurid'] . "</td>";
                                echo "<td>" . $row1['KatalaluanMurid'] . "</td>";
                                echo "<td>" . $row1['IdKelas'] . "</td>";
                                echo "<td padding=0><input type='checkbox' name='checkBox[]' class='checkBox' value='$row1[IdMurid]'></td>";
                                echo "</tr>";
                            }
                            echo'
                            <tr>
                                <td colspan="100%">
                                    <button id="delete" name="delete">Delete</button>
                                </td>	
                            </tr>
                    </table>
                </form>';
            }
        ?>
       
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
                        $deleteResult = mysqli_query($conn, "DELETE FROM murid WHERE IdMurid='$value'");
                    }
                }
                echo "<script>window.location='MuridSenarai.php'</script>";
            }
            
        ?>
	</body>
</html>