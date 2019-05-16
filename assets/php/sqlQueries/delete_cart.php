<?php

include '../DataBase.php';

	$kod_c = $_POST['kod_c'];

$pre_q = "delete FROM cart Where Код_Картриджа = '$kod_c'"; 

$q = mysqli_query($link,$pre_q);

 echo '<script>document.location.href = "../../../../PA.php";</script>';
