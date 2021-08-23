<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
?>
	<!-- Top title banner -->
    <div id="title">
		<h1>APLIKASI PENILAIAN SAINS KOMPUTER T4</h1>
		<!-- Top left list icon (clickable) -->
		<div id="list-div">
			<img src="img/Bulleted-List-icon.png" alt="menu" id="menu-btn" onclick="openNav()">
		</div>

	<!-- Include checkuser function and print name at Top Right of Screen -->
	<?php
		include("checkUser.php");
	?>
	
	</div>

	<!-- Side navigation menu -->
	<div id="menu">
	<?php
	// If status is empty(No user login yet)
	if(empty($_SESSION["Status"])){
	?>
		<div id="menu-sidenav" class="sidenav">

			<!-- Close button(X) -->
			<a href="javascript: void(0)" class="closebtn" onclick="closeNav()">&times;</a>

			<!-- Master Jing Image -->
			<img src="img/authorName.png" alt="author-name" id="authorName" width=200px height=80px>
			
			<!-- Menu options -->
			<ul>

				<!-- Option1 : Laman Utama -->
				<li>
					<a id="LamanUtama" href="LamanUtama.php">Laman Utama</a>
				</li>

				<!-- Option2 : Log Masuk -->
				<li>
					<a id="LogMasuk" href="">Log masuk</a>
					<ul>
						
						<!-- SubOption1 : Log Masuk Murid -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="LogMasuk-option1" href="LogMasukMurid.php">Murid</a>
						</li>
						
						<!-- SubOption2 : Log Masuk Guru -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="LogMasuk-option2" href="LogMasukGuru.php">Guru</a>
						</li>

					</ul>
				</li>

				<!-- Option3 : Daftar -->
				<li>
					<a id="Daftar" href="">Daftar</a>
					<ul>

						<!-- SubOption1 : Daftar Murid -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Daftar-option1" href="DaftarMurid.php">Murid</a>
						</li>
						
						<!-- SubOption2 : Daftar Guru -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Daftar-option2" href="DaftarGuru.php">Guru</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	<?php
	}
	// If status is guru(guru already login)
	else if($_SESSION["Status"] == "Guru"){?>
		
		<div id="menu-sidenav" class="sidenav">

			<!-- Close button(X) -->
			<a href="javascript: void(0)" class="closebtn" onclick="closeNav()">&times;</a>

			<!-- Master Jing Image -->
			<img src="img/authorName.png" alt="author-name" id="authorName" width=200px height=70px>
			
			
			<ul>

				<!-- Option1 : Laman Utama -->
				<li>
					<a id="LamanUtama" href="LamanUtama.php">Laman Utama</a>
				</li>

				<!-- Option2 : Laporan -->
				<li>
					<a id="Laporan" href="Laporan.php">Laporan</a>
				</li>

				<!-- Option3 : Import -->
				<li>
					<a id="Import" href="Import.php">Import</a>
				</li>

				<!-- Option4 : Guru -->
				<li>
					<a id="Guru" href="">Guru</a>
					<ul>

						<!-- SubOption1 : Senarai Guru -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Guru-option1" href="GuruSenarai.php">Senarai</a>
						</li>
						
						<!-- SubOption2 : Tambah Guru -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Guru-option2" href="GuruInsert.php">Tambah</a>
						</li>
						
						<!-- SubOption3 : Kemaskini Guru -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Guru-option4" href="GuruUpdate.php">Kemaskini</a>
						</li>
					</ul>
				</li>

				<!-- Option5 : Murid -->
				<li>
					<a id="Murid" href="">Murid</a>
					<ul>

						<!-- SubOption1 : Senarai Murid -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Murid-option1" href="MuridSenarai.php">Senarai</a>
						</li>
						
						<!-- SubOption2 : Tambah Murid -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Murid-option2" href="MuridInsert.php">Tambah</a>
						</li>
						
						<!-- SubOption3 : Kemaskini Murid -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Murid-option4" href="MuridUpdate.php">Kemaskini</a>
						</li>
					</ul>
				</li>

				<!-- Option6 : Topik -->
				<li>
					<a id="Topik" href="">Topik</a>
					<ul>

						<!-- SubOption1 : Senarai Murid -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Topik-option1" href="TopikSenarai.php">Senarai</a>
						</li>
						
						<!-- SubOption2 : Tambah Murid -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Topik-option2" href="TopikInsert.php">Tambah</a>
						</li>
			
						<!-- SubOption3 : Kemaskini Murid -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Topik-option4" href="TopikUpdate.php">Kemaskini</a>
						</li>
					</ul>
				</li>

				<!-- Option7 : Kelas -->
				<li>
					<a id="Kelas" href="">Kelas</a>
					<ul>

						<!-- SubOption1 : Senarai Kelas -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Kelas-option1" href="KelasSenarai.php">Senarai</a>
						</li>
						
						<!-- SubOption2 : Tambah Kelas -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Kelas-option2" href="KelasInsert.php">Tambah</a>
						</li>
						
						<!-- SubOption3 : Kemaskini Kelas -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Kelas-option4" href="KelasUpdate.php">Kemaskini</a>
						</li>
					</ul>
				</li>

				<!-- Option8 : Soalan -->
				<li>
					<a id="Soalan" href="">Soalan</a>
					<ul>

						<!-- SubOption1 : Senarai Soalan -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Soalan-option1" href="SoalanSenarai.php">Senarai</a>
						</li>
						
						<!-- SubOption2 : Tambah Soalan -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Soalan-option2" href="Pilih.php">Tambah</a>
						</li>
						
						<!-- SubOption3 : Kemaskini Soalan -->
						<li>
							<img src="img/right-arrow-icon.png" id="rightArrow">
							<a id="Soalan-option4" href="SoalanUpdate.php">Kemaskini</a>
						</li>
					</ul>
				</li>
				
				<!-- Option9 : Log Out -->
				<li>
					<a id="LogOut" href="LogKeluar.php">Log Keluar</a>
				</li> 
			</ul>
		</div>
	</div>
	<?php
	// If status is murid(murid already login)
	}else if($_SESSION["Status"] == "Murid"){?>
		
		<div id="menu-sidenav" class="sidenav">

			<!-- Close button(X) -->
			<a href="javascript: void(0)" class="closebtn" onclick="closeNav()">&times;</a>

			<!-- Master Jing Image -->
			<img src="img/authorName.png" alt="author-name" id="authorName" width=200px height=80px>
			
			<!-- Menu Options -->
			<ul>

				<!-- Option1 : Laman Utama -->
				<li>
					<a id="LamanUtama" href="LamanUtama.php">Laman Utama</a>
				</li>

				<!-- Option2 : Kuiz -->
				<li>
					<a id="Kuiz" href="jawab_mula.php">Kuiz</a>
				</li>

				<!-- Option3 : Laporan -->
				<li>
					<a id="Laporan" href="Laporan.php">Laporan</a>
				</li>

				<!-- Option4 : Log Out -->
				<li>
					<a id="LogOut" href="LogKeluar.php">Log Keluar</a>
				</li> 
			</ul>

		</div>
<?php
	}
?>