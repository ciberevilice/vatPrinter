<?php

include "..\DataBase.php";

$date = $_POST['date'];
$nprint = $_POST['nprint'];

$pre_q = "UPDATE cart SET Дата_Замены = '$date' WHERE (SELECT Код_Картриджа FROM printers WHERE Код_Принтера = '$nprint') = cart.Код_Картриджа";

$q = mysqli_query($link,$pre_q);

if ($q == true) {
    
    unset($date);
    unset($nprint);
    echo '<script>alert("Дата изменена!");document.location.href = "../../../main.php";</script>';
    
} else {
    echo '<script> alert("Ошибка, попробуйте снова!");document.location.href = "../../../main.php";</script>';
}



