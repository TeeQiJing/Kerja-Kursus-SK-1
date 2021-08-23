<?php
    include("sambungan.php");
    session_start();
    error_reporting(E_ALL & ~E_NOTICE);

    $IdMurid = $_SESSION['IdMurid'];
    if(isset($_POST['mula'])){
        $IdTopik = $_POST['IdTopik'];
        $sql = "SELECT * FROM keputusan JOIN soalan on keputusan.IdSoalan = soalan.IdSoalan
                where IdMurid = '$IdMurid' and soalan.IdTopik = '$IdTopik'";
        $data = mysqli_query($conn, $sql);

        //semak sama ada pelajar dah jawab atau belum
        if(mysqli_num_rows($data) > 0){
            header("Location: jawab_ulangkaji.php?IdTopik=$IdTopik");
        }else{
            header("Location: jawab_soalan.php?IdTopik=$IdTopik");
        }
    }
?>
<?php
    include("header.php");
?>
<link rel="stylesheet" href="header.css">
<link rel="stylesheet" href="Pilih.css">
<br><br><br><br>

<div id="StudentContent">
    <h1>SILA PILIH TOPIK</h1>
    <form action="jawab_mula.php" method="post" id="StudentForm">
        <div class='txt_field' id='IdTopikTextField'>
			<select name='IdTopik' id='IdTopik' required>";
            <?php
                $result = mysqli_query($conn, "SELECT * FROM topik ORDER BY IdTopik ASC");
                while($topik = mysqli_fetch_assoc($result)){
                    echo"<option value='$topik[IdTopik]'>$topik[IdTopik]  -  $topik[NamaTopik]</option>";
                }
			?>
			</select>
			<span></span>
			<label>Sila Pilih Topik</label>
		</div>
		<input type='submit' value='MULA' name="mula">
    </form>
</div>

<?php
    include("footer.php")
?>