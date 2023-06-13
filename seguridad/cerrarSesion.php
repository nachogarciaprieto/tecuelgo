<?php

$_SESSION = array();
session_start();
session_destroy();
$cerrarSesion= "cerrada";
header('Location: ../index.php?cerrarSesion=$cerrarSesion');


?>