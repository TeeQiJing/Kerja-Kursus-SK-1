<?php
    echo'
    <script>
        function openNav() {
            document.getElementById("menu-sidenav").style.width = "230px";
            document.getElementById("content").style.marginLeft = "230px";
            document.getElementById("content").style.opacity = 0.1;
            document.getElementById("title").style.opacity = 0.5;
        }

        function closeNav() {
            document.getElementById("menu-sidenav").style.width = "0";
            document.getElementById("content").style.marginLeft= "0";
            document.getElementById("content").style.opacity = 1;
            document.getElementById("title").style.opacity = 1;
        }
        
    </script>
    ';
?>
