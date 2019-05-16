<?php
    Session_start();
    if(!$_SESSION['connect'] = true) die();
    include 'assets/php/DataBase.php';
?>

<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<script src="assets/index.js"></script>
	<title>Учет печатающих средств</title>
</head>
<body>

<div class="main">
    
        <?php
                $username = $_SESSION['username'];
                $q = mysqli_query($link,"SELECT printers.Код_Принтера, printers.Производитель, printers.Модель, printers.Характеристики, printers.Код_Картриджа, printers.Кабинет, cart.Дата_Замены FROM mydb.cart, mydb.printers where printers.Кабинет = (select users.room from users where users.Логин = '$username') and printers.Код_Картриджа = cart.Код_Картриджа");
                $result = mysqli_fetch_all($q,MYSQLI_ASSOC);        
        ?>
    <div class="table-div">
    
        <table class="table">
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
    
        <div class="menu">  
                                   
      
 <!--Блок меню--> <!--Блок меню--><!--Блок меню--><!--Блок меню--><!--Блок меню--><!--Блок меню--><!--Блок меню--><!--Блок меню--><!--Блок меню-->                    
                    <div class="menu-container">
                            <h2>Что-то не работает?</h2>
                            <a class="btn" href="app.php">Оставить заявку</a>
                    </div>
 <!--Блок меню--> <!--Блок меню--><!--Блок меню--><!--Блок меню--><!--Блок меню--><!--Блок меню--><!--Блок меню--><!--Блок меню--><!--Блок меню--> 
                     <div class="menu-container">
                         
        <a href="#openModal" class="btn">Совместимые картриджи <br>с принтерами</a>
	<div id="openModal" class="modalDialog">
		<div>
			<a href="#close" class="close">X</a>
			<h2>Вы видите доступные на складе картриджи, которые совместимы с вашими принтерами!</h2>
			<?php                        
                            $q1 = mysqli_query($link,"SELECT printers.Модель,cart.Код_Картриджа FROM printers,cart WHERE (printers.Кабинет = (SELECT users.room FROM users WHERE users.Логин = '$username')) and (printers.Модель = cart.Совместимость) ORDER BY printers.Модель");
                            $result1 = mysqli_fetch_all($q1,MYSQLI_ASSOC);
                        ?>
                        <table>
                            <th>Модель</th>
                            <th>Код картриджа</th>
                            <?php
                            foreach($result1 as $str1) {                            
                                echo '<tr>';                               
                                    echo '<td>'.$str1['Модель'].'</td>';
                                    echo '<td>'.$str1['Код_Картриджа'].'</td>';                               
                                echo '</tr>';                               
                            }                           
                           ?>
                        </table>

               </div>
           </div>                   
         </div>            
                            
             </div>
 
 <!--Блок меню--> <!--Блок меню--><!--Блок меню--><!--Блок меню--><!--Блок меню--><!--Блок меню--><!--Блок меню--><!--Блок меню--><!--Блок меню-->    
 
         </div>   
                    

	

	<div class="footer">
		
		<p>Developed by © <i>«WebConnect»</i>, 2018</p>
                <p style="font-size: 100%">«все права защищены, копирование любой информации без разрешения автора и обратной ссылки запрещено»</p>


	</div>

	</div>

</body>
</html>