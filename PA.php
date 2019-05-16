<?php

 include 'assets/php/DataBase.php';
 
 ?>

<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<script src="assets/index.js"></script>
	<title>Страница администратора</title>
        <style>
            table {
                width: 90%;
                margin: 0 auto;
                border-spacing: 5%;
                color: #f2f2f2;
                font-size: 1.3rem;
                font-family: Arial, sans-serif;
                font-weight: bold;
            }
            .btn {
                width: 50px;
                font-size: 10px;
                display: block;
                margin: 0 auto;
                margin-top: 10px;
            }
        </style>
</head>
<body style="overflow: auto">
    
    <div class="main" style="display: flex;flex-direction: row;flex-wrap:wrap">
        
        
        <div class="blockA" style="width: 100%;height: 60%; overflow: scroll; border-top: none;">
            
            
            <?php
                $q = mysqli_query($link,"SELECT printers.Код_Принтера, printers.Производитель, printers.Модель, printers.Характеристики, printers.Код_Картриджа, printers.Кабинет, cart.Дата_Замены FROM mydb.cart, mydb.printers where printers.Код_Картриджа = cart.Код_Картриджа");
                $result = mysqli_fetch_all($q,MYSQLI_ASSOC);        
             ?>
    <div class="box" id="box1"> 
    
        <table style="height: 400px">
                    <th>Код принтера</th>
                    <th>Производитель</th>
                    <th>Дата замены картриджа</th>
                    <th>Модель</th>
                    <th>Характеристики</th>
                    <th>Код картриджа</th>
                    <th>Кабинет</th>
        <?php
               
                foreach ($result as $str) {
                            
                        echo '<tr>';
                            echo '<td>'.$str['Код_Принтера'].'</td>';
                            echo '<td>'.$str['Производитель'].'</td>';
                            echo '<td>'.$str['Дата_Замены'].'</td>';
                            echo '<td>'.$str['Модель'].'</td>';
                            echo '<td>'.$str['Характеристики'].'</td>';
                            echo '<td>'.$str['Код_Картриджа'].'</td>';
                            echo '<td>'.$str['Кабинет'].'</td>';
                        echo '</tr>';
                    
                 }
                echo '</table>';
        ?>
    </div>  
            
            <!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- -->
            
             <?php
                $q1 = mysqli_query($link,"SELECT * FROM Users");
                $result1 = mysqli_fetch_all($q1,MYSQLI_ASSOC);        
             ?>
            
            
             <div class="box" id="box2" hidden>
    
        <table style="height: 400px">
                    <th>Логин</th>
                    <th>Пароль</th>
                    <th>Фамилия</th>
                    <th>Кабинет</th>
        <?php
               
                foreach ($result1 as $str) {
                            
                        echo '<tr>';
                            echo '<td>'.$str['Логин'].'</td>';
                            echo '<td>'.$str['password'].'</td>';
                            echo '<td>'.$str['surname'].'</td>';
                            echo '<td>'.$str['room'].'</td>';
                        echo '</tr>';
                    
                 }
                echo '</table>';
        ?>
    </div>  
            
            
    <!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- -->
            
             <?php
                $q2 = mysqli_query($link,"SELECT * FROM cart");
                $result2 = mysqli_fetch_all($q2,MYSQLI_ASSOC);        
             ?>
            
            
             <div class="box" id="box3" hidden>
    
        <table style="height: 400px">
                    <th>Код_Картриджа</th>
                    <th>Производитель</th>
                    <th>Характеристики</th>
                    <th>ДПЗК</th>
                    <th>Дата_Замены</th>
                    <th>Статус</th>
                    <th>Совместимость</th>
        <?php
               
                foreach ($result2 as $str) {
                            
                        echo '<tr>';
                            echo '<td>'.$str['Код_Картриджа'].'</td>';
                            echo '<td>'.$str['Производитель'].'</td>';
                            echo '<td>'.$str['Характеристики'].'</td>';
                            echo '<td>'.$str['ДПЗК'].'</td>';
                            echo '<td>'.$str['Дата_Замены'].'</td>';
                            echo '<td>'.$str['Статус'].'</td>';
                            echo '<td>'.$str['Совместимость'].'</td>';
                        echo '</tr>';
                    
                 }
                echo '</table>';
        ?>
    </div>   
    
    <!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- -->
            
             <?php
                $q3 = mysqli_query($link,"SELECT * FROM applications");
                $result3 = mysqli_fetch_all($q3,MYSQLI_ASSOC);        
             ?>
            
            
             <div class="box" id="box4" hidden>
    
        <table style="height: 400px">
                    <th>Номер заявки</th>
                    <th>Логин</th>
                    <th>Код принтера</th>
                    <th>Дата сдачи</th>
                    <th>Причина</th>
                    <th>Уточнение</th>
        <?php
               
                foreach ($result3 as $str) {
                            
                        echo '<tr>';
                            echo '<td>'.$str['Номер_заявки'].'</td>';
                            echo '<td>'.$str['Логин'].'</td>';
                            echo '<td>'.$str['Код_Принтера'].'</td>';
                            echo '<td>'.$str['Дата_Сдачи'].'</td>';
                            echo '<td>'.$str['Причина'].'</td>';
                             echo '<td>'.$str['Уточнение'].'</td>';
                        echo '</tr>';
                    
                 }
                echo '</table>';
        ?>
    </div>  
            
        </div>
         
 <!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- --><!-- -->
        <div class="blockA" style="width: 18%;">
            
            <h1>Пользователи</h1>
            <a href="#" class="btn" onclick=openbox(2)>Показатать таблицу</a>
            <a href="#openModal" class="btn">Добавить пользователя</a>
             <a href="#openModal1" class="btn">Удалить пользователя</a>
            
	<div id="openModal" class="modalDialog">
		<div>
			<a href="#close" class="close">X</a>
			<h2>Добавить пользователя</h2>
                        <form action="assets/php/sqlQueries/insert_user.php" method="POST">
                            <input type="text" name="login" placeholder="Логин">
                            <input type="text" name="pas" placeholder="пароль">
                            <input type="text" name="surname" placeholder="фамилия">
                            <input type="text" name="room" placeholder="кабинет">
                            <br>
                            <input type="submit" value="добавить">
                        </form>

		</div>
	</div>
            
	<div id="openModal1" class="modalDialog">
		<div>
			<a href="#close" class="close">X</a>
			<h2>Удалить Пользователя</h2>
			 <form action="assets/php/sqlQueries/delete_user.php" method="POST">
                            <input type="text" name="login" placeholder="Логин">
                            <br>
                            <input type="submit" value="Удалить">
                        </form>

		</div>
	</div>
            
        </div>
        
        <div class="Print blockA" style="width: 20%">
            <h1>Принтеры</h1>
            <a href="#" class="btn" onclick=openbox(1)>Показать таблицу</a>
            <a href="#openModal2" class="btn">Добавить принтер</a>
            <a href="#openModal3" class="btn">Удалить принтер</a>
            
	<div id="openModal2" class="modalDialog">
		<div>
			<a href="#close" class="close">X</a>
			<h2>Добавить принтер</h2>
			<form action="assets/php/sqlQueries/insert_printer.php" method="POST">
                            <input type="text" name="kod_p" placeholder="Код принтера">
                            <input type="text" name="proz" placeholder="Производитель">
                            <input type="text" name="model" placeholder="Модель">
                            <input type="text" name="har" placeholder="Характеристики">
                             <p>Вводите код только имеющегося картриджа в базе!</p>
                            <input type="text" name="kod_c" placeholder="Код картриджа">
                            <input type="text" name="room" placeholder="кабинет">
                            <br>
                            <input type="submit" value="добавить">
                        </form>

		</div>
	</div>
            
	<div id="openModal3" class="modalDialog">
		<div>
			<a href="#close" class="close">X</a>
			<h2>Удалить принтер</h2>
			 <form action="assets/php/sqlQueries/delete_printer.php" method="POST">
                            <input type="text" name="kod_p" placeholder="Код принтера">
                            <br>
                            <input type="submit" value="Удалить">
                        </form>

		</div>
	</div>
            
        </div>
 
        <div class="Cart blockA" style="width: 20%">
            <h1>Картриджи</h1>
            <a href="#" class="btn" onclick=openbox(3)>Показать таблицу</a>
            <a href="#openModal4" class="btn">Добавить картридж</a>
            <a href="#openModal5" class="btn">Удалить картридж</a>
            
	<div id="openModal4" class="modalDialog">
		<div>
			<a href="#close" class="close">X</a>
			<h2>Добавить картридж</h2>
			<form action="assets/php/sqlQueries/insert_cart.php" method="POST">
                            <input type="text" name="kod_c" placeholder="Код картриджа">
                            <input type="text" name="proz" placeholder="Производитель">
                            <input type="text" name="har" placeholder="Характеристики">
                            <input type="date" name="DPZ" placeholder="Дата п-й заправки">
                            <input type="date" name="DZ" placeholder="Дата замены">
                            <select name="cause" id="cause">
         <option value="" disabled selected>Выберите статус</option>
          <option value="Занят">Занят</option>
          <option value="Свободен">Свободен</option>
          <option value="Не заправлен">Не заправлен</option>
      </select>
                            <input type="text" name="sov" placeholder="Совместимость">
                            <br>
                            <input type="submit" value="добавить">
                        </form>

		</div>
	</div>
            
	<div id="openModal5" class="modalDialog">
		<div>
			<a href="#close" class="close">X</a>
			<h2>Удалить картридж</h2>
			<form action="assets/php/sqlQueries/delete_cart.php" method="POST">
                            <input type="text" name="kod_c" placeholder="Код картриджа">
                            <br>
                            <input type="submit" value="Удалить">
                        </form>

		</div>
	</div>
            
        </div>
 
 <div class="blockA" style="width: 20%;">
            <h1>Заявки</h1>
            <a href="#" class="btn" onclick=openbox(4)>Показатать таблицу</a>
            <h1 style="margin: 10px 0 5px 0;text-decoration: none;">Изменение даты заправки картриджа:</h1>
            <form action="assets/php/sqlQueries/updatetime.php" method="POST">
                            
                            <input type="text" placeholder="Введите код принтера" name="nprint">
                            
                            <input type="date" name="date">
                            <br>
                            <input type="submit" value="ok" class="btn" name="change">
                            
                        </form> 
 </div>
 
        <div class="report blockA" style="width: 20%;">
            <h1>Отчеты</h1>
            <div style="display:flex;flex-direction: column;align-items: center;">
                            
                            <div style="border-bottom: 1px solid #f2f2f2;margin-bottom: 10px">
                                <h2 style="text-decoration:none">Кол-во замененных картриджей за:</h2>
                                <form method="POST" action="assets\php\reports\countCartChange.php">
                                <select name="selectDate" style="width: 150px">
                                     <option value="Неделю" selected>Неделю</option>
                                     <option value="Месяц">Месяц</option>
                                     <option value="Год">Год</option>
                                </select>
                                    <br>
                                    <input type="submit" class="btn" value="ок" name="ok1" style="width: 10px">
                                </form>    
                            </div> 
                 
                             <div style="border-bottom: 1px solid #f2f2f2;margin-bottom: 10px">
                                <h2 style="text-decoration:none">Кол-во обращений по несправности принтеров:</h2>
                                <form method="POST" action="assets\php\reports\malfunction.php">
                                <select name="selectDate" style="width: 150px">
                                     <option value="Неделю" selected>Неделю</option>
                                     <option value="Месяц">Месяц</option>
                                     <option value="Год">Год</option>
                                </select>
                                    <br>
                                    <input type="submit" class="btn" value="ок" name="ok1">
                                </form>    
                            </div>
                 
                             <div style="margin-bottom: 10px">
                                <h2 style="text-decoration:none">Отчет по всему парку принтеров:</h2>
                                <form method="POST" action="assets\php\reports\allPrinters.php">
                                    <br>
                                    <input type="submit" class="btn" value="ок" name="ok1">
                                </form>    
                            </div> 
            
        </div>
            </div>
    
    </div>
        
        
    </div>
    <script>
  
        function openbox(id) {
             var el = document.getElementById('box' + id);
             
            if (el.hidden){
                document.querySelectorAll('.box').forEach(box => box.hidden = true);
                 el.hidden = false;
            }else{
                el.hidden = true;
            }
        }
    </script>  
</body>    

