<?php   
$vidhansabha = 'data:image/' . pathinfo('vidhansabha.png', PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents('vidhansabha.png')); 


echo $vidhansabha;
 