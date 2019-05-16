<?php
  session_start();
  $username = $_SESSION['username'];
  @include 'assets/php/DataBase.php';

?>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/appl.css">
  <script src="assets/index.js"></script>
  <title>Учет печатающих средств</title>
</head>
<body>

<div class="main">  

            
  
        <?php
                $q = mysqli_query($link,"SELECT * FROM applications where applications.Логин = '$username' order by applications.Дата_Сдачи desc");
                $result = mysqli_fetch_all($q,MYSQLI_ASSOC);        
        ?>
  <div class="table-div">
    
        <table class="table">
                    <th>Логин</th>
                    <th>Код Принтера</th>
                    <th>Причина</th>
                    <th>Дата Сдачи</th>
                    <th>Закрыта</th>
                    <th>Уточнение</th>
        <?php
               
                foreach ($result as $str) {
                            
                        echo '<tr>';
                            echo '<td>'.$str['Логин'].'</td>';
                            echo '<td>'.$str['Код_Принтера'].'</td>';
                            echo '<td>'.$str['Дата_Сдачи'].'</td>';
                            echo '<td>'.$str['Причина'].'</td>';
                            if($str['Закрыта'] == '0') {
                                echo '<td>Нет</td>';
                            } else {
                                echo '<td>Да</td>';
                            }
                             echo '<td>'.$str['Уточнение'].'</td>';
                        echo '</tr>';
                    
                 }
                echo '</table>';
        ?>
    </div> 

  <div class="formAPP" style="text-align: center;margin-top: 1%">
    
      <form action="/assets/php/sqlQueries//insert_application.php" method="POST">
      
      <input  name="id-print" id="print" type="text" placeholder="Введите код принтера" >
      <br>
      <select name="cause" id="cause">
         <option value="" disabled selected>Выберите причину</option>
          <option value="Заправка картриджа">Заправка картриджа</option>
          <option value="Замена картриджа">Замена картриджа</option>
          <option value="Неисправность устройства">Неисправность устройства</option>
          <option value="Неизвестная причина">Другая причина</option>
      </select>
      <br>  
      <textarea name="refinement" id="refinement" maxlength="120" placeholder="Опишите проблему" ></textarea>
      <input name="datecause" type="date" id="date">
      <input id="btn" style="margin-left: 10%" class="btn btn-disabled" type="submit" disabled="disabled" value="отправить заявку">

    </form>

  </div>

  <a href="main.php" class="btn-custom">На главную</a>

  <div class="footer">
    
    <p>Developed by © <i>«WebConnect»</i>, 2018</p>
                <p style="font-size: 100%">«все права защищены, копирование любой информации без разрешения автора и обратной ссылки запрещено»</p>

  </div>

  </div> 
    
 <!--Скрипт проверки введенных данных -->
 
    <script>
        
          var print= document.getElementById("print"),
              
              printinf= document.getElementById("printinf"),
              
              cause = document.getElementById("cause"),
              
              printStatus = false,

      
              btn = document.getElementById("btn");

  setInterval(function check(){

        
         //Проверка заполения главны полей

        if((print.value !== '') && (cause.value !== 'Выберите причину') && (date.value !== '')) {
             btn.removeAttribute("disabled");
             btn.classList.remove("btn-disabled");
        } else {
            btn.classList.add("btn-disabled");
            btn.setAttribute("disabled", "disabled")
        }
        //Проверка заполнения главных полей
  },500);
        
    </script>
  
    
 <!--Скрипт проверки введенных данных -->   

</body>
</html>