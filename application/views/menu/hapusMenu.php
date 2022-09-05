<?php
$namaControler = $menu['menu'];
unlink("F:\\xampp\\htdocs\\SIMAS\\application\\controllers\\".$namaControler.".php");		
unlink("F:\\xampp\\htdocs\\SIMAS\\application\\views\\".$namaControler."\\index.php");		
rmdir("F:\\xampp\\\htdocs\\SIMAS\\application\\views\\".$namaControler."\\");