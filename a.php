<?php
$cadena = "00000100";
$cadena = preg_replace('/^0+/', '', $cadena);
echo $cadena;
?> 