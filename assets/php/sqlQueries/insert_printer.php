<?php

include '../DataBase.php';

	$kod_p = $_POST['kod_p'];
        $proz = $_POST['proz'];
        $model = $_POST['model'];
        $har = $_POST['har'];
        $kod_c = $_POST['kod_c'];
        $room = $_POST['room'];

$pre_q = "insert into printers values('$kod_p', '$proz', '$model', '$har', '$kod_c', '$room')"; 

$q = mysqli_query($link,$pre_q);

 echo '<script>document.location.href = "../../../../PA.php";</script>';
