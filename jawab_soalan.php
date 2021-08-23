<?php
    include("sambungan.php");
    $IdTopik = $_GET['IdTopik'];
    error_reporting(E_ALL & ~E_NOTICE);
?>
<html>
<link rel="stylesheet" href="header.css">
<link rel="stylesheet" href="Laporan.css">
<style>
    #content {
        width: 100%;
        height: 100%;
        position: relative;
    }
    #main {
        position: absolute;
        top: 100px;
        left: 50%;
        transform: translateX(-50%); 
        width: 82%;
        font-family: Comic Sans MS, Comic Sans, cursive;
    }
    table {
        width: 100%;
        border-radius: 20px;
    }
    td, th {
        padding: 10px;
        font-size: 16px;
    }
    #LaporanTitle {
        margin-top: 0px;
    }
</style>
<body>
    <?php
        include("header.php");
    ?>
    <div id="content">
        <div id="main">
            <form action="jawab_semak.php" method="post">
                <table>
                    <h2 id="LaporanTitle">SOALAN KUIZ SAINS KOMPUTER</h2>
                    <tr>
                        <th>Bil</th>
                        <th>Soalan</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM soalan WHERE IdTopik='$IdTopik' ORDER BY IdSoalan ASC";
                        $data = mysqli_query($conn, $sql);
                        $bil = 1;
                        while($soalan = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td class="bil"><?php echo $bil;?></td>
                        <td class="soalan" style="text-align: left;">
                            <?php echo $soalan['NamaSoalan'];?><br>

                            <input type="radio" name="<?php echo $soalan['IdSoalan'];?>" value="A">
                            <?php echo "A. ".$soalan['PilihanA'];?><br>

                            <input type="radio" name="<?php echo $soalan['IdSoalan'];?>" value="B">
                            <?php echo "B. ".$soalan['PilihanB'];?><br>
                            
                            <input type="radio" name="<?php echo $soalan['IdSoalan'];?>" value="C">
                            <?php echo "C. ".$soalan['PilihanC'];?><br>

                            <input type="radio" name="<?php echo $soalan['IdSoalan'];?>" value="D">
                            <?php echo "D. ".$soalan['PilihanD'];?><br>

                            <input type="hidden" name="IdTopik" value="<?php echo $IdTopik;?>">
                        </td>
                    </tr>
                    <?php $bil++;}?>
                </table>
                <button id="semak" type="submit">Semak</button>
            </form>
        </div>
    </div>
    <?php
        include("footer.php");
    ?>
</body>
</html>
