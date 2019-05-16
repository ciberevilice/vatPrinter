<?php
session_start();
include '../DataBase.php';

	$login = $_SESSION['username'];
	$kod = $_POST['id-print'];
	$date = $_POST['datecause'];
	$cause = $_POST['cause'];
        $ref = $_POST['refinement'];

        
        
$pre_q1 = "SELECT Код_Принтера FROM printers";
$q1 = mysqli_query($link,$pre_q1);
$res = mysqli_fetch_all($q1,MYSQLI_ASSOC);

$exists = (array_search($kod, array_column($res, "Код_Принтера")) !== false);

if ($exists == 0) {
    echo '<script> alert("Такого принтера нет в базе!");document.location.href = "../../../../app.php";</script>';
}


$pre_q = "insert into applications(Логин,Код_Принтера,Дата_Сдачи,Причина,Закрыта,Уточнение) values ('$login', '$kod', '$date', '$cause', '0', '$ref')"; 

$q = mysqli_query($link,$pre_q);

if($q == true){
    echo '<script>document.location.href = "../../../../app.php";</script>';
    
} else {
    echo '<script> alert("Ошибка жизни! Повторите попытку снова!");document.location.href = "../../../app.php";</script>';
}

