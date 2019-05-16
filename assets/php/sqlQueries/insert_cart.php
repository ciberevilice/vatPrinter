<?php

include '../DataBase.php';

	$kod_c = $_POST['kod_c'];
	$poz = $_POST['proz'];
	$har = $_POST['har'];
	$DPZ = $_POST['DPZ'];
        $DZ = $_POST['DZ'];
        $cause = $_POST['cause'];
        $sov = $_POST['sov'];

$pre_q = "insert into cart values ('$kod_c', '$poz', '$har', '$DPZ', '$DZ','$cause','$sov')"; 

$q = mysqli_query($link,$pre_q);

 echo '<script>document.location.href = "../../../../PA.php";</script>';
