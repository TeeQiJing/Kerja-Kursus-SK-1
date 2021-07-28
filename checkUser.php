<!--Check whether user is a student or teacher and print the name-->
<?php 
    if(empty($_SESSION['NamaMurid']) && empty($_SESSION['NamaGuru'])){
		echo"<p id='noAccount'>";
		echo("Sila Log Masuk<br>atau Daftar");
		echo"</p>";
	}elseif(!empty($_SESSION['NamaMurid'])){
		echo"<p id='msg'>";
		echo"<img src='Student-icon.png' id='icon'>";
		echo("Nama Murid : <br>".$_SESSION['NamaMurid']);
		echo"</p>";
	}elseif(!empty($_SESSION['NamaGuru'])){
		echo"<p id='msg'>";
		echo"<img src='Teacher-icon.png' id='icon'>";
		echo("Nama Guru : <br>".$_SESSION['NamaGuru']);
		echo"</p>";
	}
	echo "
	<style>
		#msg {
			position: absolute;
			width: 180px;
			z-index: 2;
			right: 0px;
			top: 0px;
			font-size: 18px;
			text-decoration: none;
			font-weight: bold;
			color: white;
			padding-left: 25px;
			line-height: 40px;
			font-family: Comic Sans MS, Comic Sans, cursive;
			height: 90px;
			background-color: #f831ff;
			margin: 0;
		}
		#noAccount {
			position: absolute;
			width: 180px;
			z-index: 2;
			right: 5px;
			top: 0px;
			font-size: 18px;
			text-decoration: none;
			font-weight: bold;
			color: white;
			font-family: Comic Sans MS, Comic Sans, cursive;
			line-height: 38px;
			height: 90px;
			background-color: #f831ff;
			margin: 0;
		}
		#icon {
			position: absolute;
			top: 20px;
			left: 10px;
			width: 45px;
			height: 45px;
		}
	
	</style>
	";
?>