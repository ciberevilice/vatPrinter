<?php

include '../DataBase.php';

	$login = $_POST['login'];

$pre_q = "delete FROM users Where Логин = '$login'"; 

$q = mysqli_query($link,$pre_q);

 echo '<script>document.location.href = "../../../../PA.php";</script>';

