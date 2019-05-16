<?php
 include '../DataBase.php';

 $now = date("y-m-d");
 $lastweek = date("y-m-d",mktime(0, 0, 0, date("m"), date("d")-7, date("Y")));
 $lastmonth = date("y-m-d",mktime(0, 0, 0, date("m")-1, date("d"), date("Y")));
 $lastyear = date("y-m-d",mktime(0, 0, 0, date("m"), date("d"), date("Y")-1));
 
if ($_POST['selectDate'] == 'Неделю') {
                    $q = mysqli_query($link,"SELECT count(Дата_Сдачи) as 'Кол-во' FROM applications WHERE applications.Дата_Сдачи BETWEEN '$lastweek' and '$now' and applications.Закрыта = 1");
                    $result = mysqli_fetch_array($q,MYSQLI_ASSOC);
} elseif($_POST['selectDate'] == 'Месяц') {
                    $q = mysqli_query($link,"SELECT count(Дата_Сдачи) as 'Кол-во' FROM applications WHERE applications.Дата_Сдачи BETWEEN '$lastmonth' and '$now' and applications.Закрыта = 1");
                    $result = mysqli_fetch_array($q,MYSQLI_ASSOC);
} elseif($_POST['selectDate'] == 'Месяц') {
                    $q = mysqli_query($link,"SELECT count(Дата_Сдачи) as 'Кол-во' FROM applications WHERE applications.Дата_Сдачи BETWEEN '$lastyear' and '$now' and applications.Закрыта = 1");
                    $result = mysqli_fetch_array($q,MYSQLI_ASSOC);
};
?>

<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="assets/index.js"></script>
	<title>Отчет</title>
</head>
<body onLoad="window.print();">
        
        <div style="width: 600px;margin: 0 auto;text-align: center">
        <h1>Отчет</h1>
        <h2>по количеству замененных картриджей за <?php echo $_POST['selectDate']?></h2>
        <h3>в период с <?php echo $now?> по <?php switch ($_POST['selectDate']) {
          case 'Неделю':
                            echo $lastweek;
                            break;
          case 'Месяц':
                            echo $lastmonth;
                            break;
          case 'Год':
                            echo $lastyear;
                            break;
        }?></h3> 
        
        <p>Согласно статистике, за эту(от) <?php switch ($_POST['selectDate']) {
          case 'Неделю':
                            echo 'Неделю';
                            break;
          case 'Месяц':
                            echo 'Месяц';
                            break;
          case 'Год':
                            echo 'Год';
                            break;
        }?>, было замененно <?php echo $result['Кол-во'] ?> картриджа(ей)</p>
        <br>
        <br>
        <br>
        
        <span style="float: left;font-weight:bold">Дата: <?php echo $now?></span>  <span style="float: right;font-weight:bold">Подпись: _____________</span>
        </div>
        
    
</body>    