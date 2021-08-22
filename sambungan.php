<!--Create connection to database-->
<?php
    
    #nama host. localhost merupakan default
    $host = "localhost";
    #usename bagi SQL. root merupakan default
    $dbusername = "root";
    #password bagi SQL. masukkan password anda.
    $dbpassword = "";
    #nama pangkalan data yang anda telah bangunkan sebelum ini.
    $dbname = "kerja_kursus_sk";
    #membuka hubungan antara pangkalan data dan sistem.
    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);


    #menguji adakah hubungan berjaya dibuka
    if (!$conn){
        die("Sambungan Gagal");
    }else{
        #echo("Berjaya");
    }
    
?>
