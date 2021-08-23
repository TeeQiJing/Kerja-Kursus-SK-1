<?php
    include('sambungan.php');
    error_reporting(E_ALL & ~E_NOTICE);
    if(session_status() == PHP_SESSION_NONE){
        session_start();
        $IdTopik = $_GET['IdTopik'];
    }
?>
<link rel= "stylesheet" href="header.css">
<link rel= "stylesheet" href="Laporan.css">
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
    }
    td, th {
        padding: 10px;
        font-size: 18px;
        font-family: ;
    }
    #LaporanTitle {
        margin-top: 0px;
    }
</style>

<?php
    include("header.php");
?>
<div id="content">
    <div id="main">
        <table>
            <h2 id="LaporanTitle">SKEMA DAN KEPUTUSAN TOPIK <?php echo $IdTopik;?></h2>
            <tr>
                <th>Bil</th>
                <th>Soalan</th>
                <th>Skema</th>
            </tr>
            <?php
                $jumlah = 0;
                $betul = 0;
                $IdMurid = $_SESSION['IdMurid'];
                $sql = "SELECT * FROM keputusan JOIN soalan on keputusan.IdSoalan = soalan.IdSoalan WHERE 
                IdMurid='$IdMurid' and soalan.IdTopik='$IdTopik'";
                $data = mysqli_query($conn,$sql);
                $bil = 1;
                while($keputusan = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td class=""><?php echo $bil;?></td>
                <td class="">

                <?php
                echo $keputusan['NamaSoalan']."<br>";
                echo "A.".$keputusan['PilihanA']."<br>";
                echo "B.".$keputusan['PilihanB']."<br>";
                echo "C.".$keputusan['PilihanC']."<br>";
                echo "D.".$keputusan['PilihanD']."<br>";
                ?>
                </td>
                <td class="" style="text-align: left;">
                <?php
                    echo"Jawapannya :".$keputusan['Jawapan']."<br>";
                    echo"Anda pilih ".$keputusan['JawapanMurid']."<br>";
                    if($keputusan['JawapanMurid'] == $keputusan['Jawapan']){
                        echo"<img src='img/betul.png' class='betul'>";                    
                        $betul=$betul+1;   
                    }
                    else{
                        echo"<img src='img/salah.png' class='salah'>";
                    }
                ?>
                </td>
            </tr>
            <?php              
                $bil++;
                $jumlah++;    
            }
            ?>        
        </table>

        <?php
            $peratus = $betul / $jumlah * 100;
            $salah = $jumlah - $betul;
            
        ?>
        <br><br><br>
        <table>
            <h2 id="LaporanTitle">KEPUTUSAN PRESTASI BERDASRKAN TOPIK</h2>
            <tr>
                <th>Topik</th>
                <th><?php echo $IdTopik; ?></th>
            </tr>
            <tr>
                <td class="keputusan">Bilangan yang betul</td>
                <td class="keputusan"><?php echo $betul; ?></td>
            </tr>
            <tr>
                <td class="keputusan">Bilangan yang salah</td>
                <td class="keputusan"><?php echo $salah; ?></td>
            </tr>
            <tr>
                <td class="keputusan">Jumlah soalan</td>
                <td class="keputusan"><?php echo $jumlah; ?></td>
            </tr>
            <tr>
                <td class="keputusan">Keputusan</td>
                <td class="keputusan"><?php echo number_format($peratus,0) ?> % </td>
            </tr>
        </table>
    </div>
</div>



<?php
    include("footer.php");
?>