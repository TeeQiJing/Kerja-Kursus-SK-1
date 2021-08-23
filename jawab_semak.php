<?php
    include('sambungan.php');
    session_start();
    $IdMurid = $_SESSION['IdMurid'];
    $IdTopik = $_POST['IdTopik'];
    $tarikh = date('Y-m-d');
    $sql = "SELECT * FROM soalan WHERE IdTopik='$IdTopik' ORDER BY IdSoalan ASC";
    $data = mysqli_query($conn, $sql);
    while($soalan = mysqli_fetch_array($data)){
        $IdSoalan = $soalan['IdSoalan'];
        $pilihan = $_POST[$IdSoalan];
        $jawapan = $soalan['Jawapan'];
        if($pilihan == $jawapan){
            $kebenaran = "betul";
        }else{
            $kebenaran = "salah";
        }
        // echo $ID_murid.$ID_kuiz.$pilihan.$jawapan.$kebenaran.$tarikh."<br>";
        $sql="INSERT INTO keputusan(IdMurid, IdSoalan, JawapanMurid, Kebenaran, Tarikh)
        VALUES('$IdMurid','$IdSoalan','$pilihan','$kebenaran','$tarikh')";
        $data_kuiz = mysqli_query($conn,$sql);
    }
    include('jawab_ulangkaji.php');
?>