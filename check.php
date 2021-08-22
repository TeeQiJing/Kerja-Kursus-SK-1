<?php 
    session_start();

    //The IdTopik from Pilih.php
    $IdTopikPilih = $_SESSION["IdTopikPilih"];
    $IdMurid = $_SESSION['IdMurid'];
    
    //Connection to database
    include("sambungan.php");
    $sql1 = "SELECT * FROM soalan WHERE IdTopik='$IdTopikPilih' ORDER BY IdSoalan ASC";
    $result1 = mysqli_query($conn, $sql1);


	$betul = 0;
	while($soalan = mysqli_fetch_array($result1)){

        //Collect all data inserted when in Kuiz.php
        $tarikh = date('Y-m-d');
		$IdSoalan = $soalan["IdSoalan"];
		$pilihan = $_POST[$IdSoalan];
		$jawapan = $soalan["Jawapan"];

        //Determine the kebenaran 
		if($pilihan == $jawapan){
            $kebenaran = "betul";
			$betul+=1;
		}else{
            $kebenaran = "salah";
        }
        
        //Insert result into table `keputusan`
        $sql2 = "INSERT INTO keputusan(IdMurid, IdSoalan, JawapanMurid, Kebenaran, Tarikh)
         VALUES('$IdMurid', '$IdSoalan', '$pilihan', '$kebenaran', '$tarikh')";
        $result2 = mysqli_query($conn, $sql2);

	}

    //Transfer user to Pilih.php after all results are inserted into table `keputusan`
    echo"
    <script>
        alert('Keputusan anda telah direkod!');
        window.location='Pilih.php';
    </script>";
	

?>