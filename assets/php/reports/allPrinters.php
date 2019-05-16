<?php
 include '../DataBase.php';

 $now = date("y-m-d");
 
 $q = mysqli_query($link,"SELECT printers.Код_Принтера,printers.Модель,cart.Код_Картриджа FROM printers right join cart on printers.Модель = cart.Совместимость ORDER BY printers.Код_Принтера");
 $result = mysqli_fetch_all($q,MYSQLI_ASSOC);

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
        <h2>по всем имеющимся принтерам и совместимыми с ними картриджами</h2>
        
        <p>Согласно данным, на <?php echo $now ?> в организации имеются следующие принтеры:</p>
        
         <table style="text-align: center">
            
            <th>Принтер</th>
            <th>Совместимый картридж</th>
            
            <?php
                 foreach($result as $str1) {                            
                                echo '<tr>';                               
                                    echo '<td>'.$str1['Модель'].'</td>';
                                    echo '<td>'.$str1['Код_Картриджа'].'</td>';                              
                                echo '</tr>';                               
                            }                           
                           ?>
            
        </table>
        
        <br>
        <br>
        <br>
        
        <span style="float: left;font-weight:bold">Дата: <?php echo $now?></span>  <span style="float: right;font-weight:bold">Подпись: _____________</span>
        </div>
        
    
</body>    