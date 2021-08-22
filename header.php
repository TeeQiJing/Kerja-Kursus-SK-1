<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
    echo'
    <div id="title">
		<h1>APLIKASI PENILAIAN SAINS KOMPUTER T4</h1>
		<div id="list-div">
			<img src="img/Bulleted-List-icon.png" alt="menu" id="menu-btn" onclick="openNav()">
		</div>';
		
		include("checkUser.php");
	echo'
	</div>

	<!--Navigation Menu-->
	<div id="menu">';
	if(empty($_SESSION["Status"])){
		echo'
		<div id="menu-sidenav" class="sidenav">
			<a href="javascript: void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<img src="img/authorName.png" alt="author-name" id="authorName" width=200px height=80px>
			<ul>
				<li>
					<a id="LamanUtama" href="LamanUtama.php">Laman Utama</a>
				</li>
				<li>
					<a id="LogMasuk" href="">Log masuk</a>
					<ul>
						
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="LogMasuk-option1" href="LogMasukMurid.php">Murid</a>
						</li>
						
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="LogMasuk-option2" href="LogMasukGuru.php">Guru</a>
						</li>
					</ul>
				</li>
				<li>
					<a id="Daftar" href="">Daftar</a>
					<ul>
						
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Daftar-option1" href="DaftarMurid.php">Murid</a>
						</li>
						
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Daftar-option2" href="DaftarGuru.php">Guru</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>';
	}
	else if($_SESSION["Status"] == "Guru"){
		echo'
		<div id="menu-sidenav" class="sidenav">
			<a href="javascript: void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<img src="img/authorName.png" alt="author-name" id="authorName" width=200px height=70px>
			<ul>
				<li>
					<a id="LamanUtama" href="LamanUtama.php">Laman Utama</a>
				</li>

				<li>
					<a id="Laporan" href="Laporan.php">Laporan</a>
				</li>

				<li>
					<a id="Import" href="Import.php">Import</a>
				</li>

				<li>
					<a id="Guru" href="">Guru</a>
					<ul>
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Guru-option1" href="GuruSenarai.php">Senarai</a>
						</li>
						
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Guru-option2" href="GuruInsert.php">Tambah</a>
						</li>
						
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Guru-option4" href="GuruUpdate.php">Kemaskini</a>
						</li>
					</ul>
				</li>

				<li>
					<a id="Murid" href="">Murid</a>
					<ul>
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Murid-option1" href="MuridSenarai.php">Senarai</a>
						</li>
						
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Murid-option2" href="MuridInsert.php">Tambah</a>
						</li>
						
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Murid-option4" href="MuridUpdate.php">Kemaskini</a>
						</li>
					</ul>
				</li>

				<li>
					<a id="Topik" href="">Topik</a>
					<ul>
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Topik-option1" href="TopikSenarai.php">Senarai</a>
						</li>
						
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Topik-option2" href="TopikInsert.php">Tambah</a>
						</li>
			
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Topik-option4" href="TopikUpdate.php">Kemaskini</a>
						</li>
					</ul>
				</li>

				<li>
					<a id="Kelas" href="">Kelas</a>
					<ul>
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Kelas-option1" href="KelasSenarai.php">Senarai</a>
						</li>
						
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Kelas-option2" href="KelasInsert.php">Tambah</a>
						</li>
						
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Kelas-option4" href="KelasUpdate.php">Kemaskini</a>
						</li>
					</ul>
				</li>

				<li>
					<a id="Soalan" href="">Soalan</a>
					<ul>
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Soalan-option1" href="SoalanSenarai.php">Senarai</a>
						</li>
						
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Soalan-option2" href="Pilih.php">Tambah</a>
						</li>
						
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Soalan-option4" href="SoalanUpdate.php">Kemaskini</a>
						</li>
					</ul>
				</li>
				
	
				<li>
					<a id="LogOut" href="LogKeluar.php">Log Keluar</a>
				</li> 
			</ul>
		</div>
	</div>';
	}else if($_SESSION["Status"] == "Murid"){
		echo'
		<div id="menu-sidenav" class="sidenav">
			<a href="javascript: void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<img src="img/authorName.png" alt="author-name" id="authorName" width=200px height=80px>
			<ul>
				<li>
					<a id="LamanUtama" href="LamanUtama.php">Laman Utama</a>
				</li>

				<li>
					<a id="Kuiz" href="Pilih.php">Kuiz</a>
				</li>

				<li>
					<a id="Laporan" href="Laporan.php">Laporan</a>
				</li>

				<li>
					<a id="LogOut" href="LogKeluar.php">Log Keluar</a>
				</li> 
			</ul>
		</div>';
	}


?>