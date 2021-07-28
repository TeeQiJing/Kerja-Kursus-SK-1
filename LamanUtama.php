<?php
	// Start session
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Laman Utama</title>
		<link href="header.css" rel="stylesheet">
		<link href="LamanUtama.css" rel="stylesheet">
		<link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("header.php");
		?>
		<div id="content">
			<div class="slides" >
				<div id="slide1" class="mySlides fade">
					<h1><i>SELAMAT DATANG !!</i></h1>
					Aplikasi ini disediakan bagi pelajar terutamanya pelajar tingkatan 4 untuk menjawab soalan-soalan Sains Komputer Tingkatan 4.
					<br><br><br><br><br><br>
					Copyright 2021 &copy; by Master Jing
				</div>

				<div id="slide2" class="mySlides fade">
					<!-- <img src="slide1.png" alt="" width="100%" height="100%"> -->
					<h1><i>Sistem ini </i></h1>
					Aplikasi ini disediakan bagi pelajar terutamanya pelajar tingkatan 4 untuk menjawab soalan-soalan Sains Komputer Tingkatan 4.
					<br><br><br><br><br><br>
					Copyright 2021 &copy; by Master Jing 
				</div>

				<div id="slide3" class="mySlides fade">
					<!-- <img src="slide2.png" alt="" width="100%" height="100%"> -->
					<h1><i>Apa lanjiao?</i></h1>
					Aplikasi ini disediakan bagi pelajar terutamanya pelajar tingkatan 4 untuk menjawab soalan-soalan Sains Komputer Tingkatan 4.
					<br><br><br><br><br><br>
					Copyright 2021 &copy; by Master Jing
				</div>

				<div id="dots">
					<span class="dot active"></span>
					<span class="dot"></span>
					<span class="dot"></span>
				</div>
			</div>

			
		</div>
		<?php
			include("footer.php");
		?>
		<script>
			var slideIndex = 0;
			showSlides();

			function showSlides() {
  				var i;
 				var slides = document.getElementsByClassName("mySlides");
  				var dots = document.getElementsByClassName("dot");
  				for (i = 0; i < slides.length; i++) {
    				slides[i].style.display = "none";  
  				}
  				slideIndex++;
  				if (slideIndex > slides.length) {slideIndex = 1}    
  				for (i = 0; i < dots.length; i++) {
    				dots[i].className = dots[i].className.replace(" active", "");
  				}
  				slides[slideIndex-1].style.display = "block";  
  				dots[slideIndex-1].className += " active";
  				setTimeout(showSlides, 3000); // Change image every 2 seconds
			}
		</script>

		
	</body>
</html>