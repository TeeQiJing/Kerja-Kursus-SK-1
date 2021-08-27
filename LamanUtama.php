<?php
	// Start session
	session_start();

	// Report all error except notice
	error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Laman Utama</title>

		<!-- Link to css files -->
		<link href="header.css" rel="stylesheet">
		<link href="LamanUtama.css" rel="stylesheet">
	</head>
	<body>
		<?php
			// header.php is a php file to set banner and side menu
			include("header.php");
		?>
		<div id="content">

			<!-- All slides -->
			<div class="slides" >

				<!-- Slide 1 -->
				<div id="slide1" class="mySlides fade">
					<h1><i>SELAMAT DATANG !!</i></h1>
					Aplikasi ini disediakan bagi pelajar terutamanya pelajar tingkatan 4 untuk menjawab soalan-soalan Sains Komputer Tingkatan 4.
					<br><br><br><br><br><br>
					Copyright 2021 &copy; by Master Jing
				</div>

				<!-- Slide 2 -->
				<div id="slide2" class="mySlides fade">
					<h1><i>MATLAMAT SISTEM</i></h1>
					Aplikasi ini disediakan supaya pelajar dapat membuat latihan dan mengenali kesilapan sendiri dalam mata pelajaran Sains Komputer Tingkatan 4.
					<br><br><br><br><br><br>
					Copyright 2021 &copy; by Master Jing 
				</div>

				<!-- Slide 3 -->
				<div id="slide3" class="mySlides fade">
					<h1><i>CIRI-CIRI SISTEM</i></h1>
					Aplikasi ini dibangunkan dengan menggunakan pelbagai bahasa pengaturcaraan(<i>Programming languages</i>) termasuklah <i>HTML</i>, 
					<i>PHP</i>, <i>CSS</i>, <i>SQL</i> dan <i>JavaScript</i>.
					<br><br><br><br><br><br>
					Copyright 2021 &copy; by Master Jing
				</div>

				<!-- Design the dots below the slides -->
				<div id="dots">
					<span class="dot active"></span>
					<span class="dot"></span>
					<span class="dot"></span>
				</div>
				
			</div>

		</div>
		<?php
			// footer.php is a file to add side menu sliding function
			include("footer.php");
		?>
		<script>
			var slideIndex = 0;

			// Call the function and it will run infinitely
			showSlides();

			// Change slides function
			function showSlides() {
  				var i;
				// Get all slides and dots
 				var slides = document.getElementsByClassName("mySlides");
  				var dots = document.getElementsByClassName("dot");

				// Loop through every slides and set its display = 'none'
  				for (i = 0; i < slides.length; i++) {
    				slides[i].style.display = "none";  
  				}
				
				// Increase slideIndex every time, return its to 1 if exceed slides.length
  				slideIndex++;
  				if (slideIndex > slides.length) {slideIndex = 1}    
  				for (i = 0; i < dots.length; i++) {
    				dots[i].className = dots[i].className.replace(" active", "");
  				}

				// For each turn of slides, show the 
				//slides(display = block) and dots(+ class name active)
  				slides[slideIndex-1].style.display = "block";  
  				dots[slideIndex-1].className += " active";
				
				// Auto change slide every 3 seconds (infinitely)
  				setTimeout(showSlides, 3000);
			}
		</script>

	</body>
</html>