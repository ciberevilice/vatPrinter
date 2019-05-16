<?php

include '../DataBase.php';

	$login = $_POST['login'];
	$pas = $_POST['pas'];
	$surname = $_POST['surname'];
	$room = $_POST['room'];

$pre_q = "insert into users values ('$login', '$pas', '$surname', '$room')"; 

$q = mysqli_query($link,$pre_q);

 echo '<script>document.location.href = "../../../../PA.php";</script>';
