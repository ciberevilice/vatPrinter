<?php

include '../DataBase.php';

	$kod_p = $_POST['kod_p'];

$pre_q = "delete FROM printers Where Код_Принтера = '$kod_p'"; 

$q = mysqli_query($link,$pre_q);

 echo '<script>document.location.href = "../../../../PA.php";</script>';