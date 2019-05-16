<?php
	@include 'assets/php/DataBase.php';
?>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<title>Учет печатающих средств</title>
</head>
<body>

<div class="main">	

	<div class="header">

            <a href="index.php" class="btn-custom">На главную</a>
            
	</div>

	<div class="formAut" style="text-align: center;margin-top: 2%">
		
		<form action="assets\php\sqlQueries\registration_user.php" method="POST">
			
			<input  name="reg_login" id="log" type="text" placeholder="Введите ваш логин" style="padding: 25px;margin-bottom: 20px;"> <span id="loginf" class="hidden" style="position: absolute;font-size: 1.8rem;color: maroon;font-weight: bold">Логин должен содержать минимум 6 символов!</span>
			<input  name="reg_password" id="pas" type="password" placeholder="Введите ваш пароль" style="padding: 25px;margin-bottom: 20px;"><span  id="pasinf"class="hidden" style="position: absolute;font-size: 1.8rem;color: maroon;font-weight: bold">Пароль должен содержать минимум 6 символов!</span>
                        <input  id="pasR" type="password" placeholder="Введите пароль еще раз" style="padding: 25px;margin-bottom: 20px;"> <span  id="pasRinf"class="hidden" style="position: absolute;font-size: 1.8rem;color: maroon;font-weight: bold">Пароли не совпадают!</span>
			<input  name="reg_surname" id="fam" type="text" placeholder="Введите вашу фамилию" style="padding: 25px;margin-bottom: 20px;">
                        <input  name="reg_room" id="r" type="text" placeholder="Введите номер вашего кабинета" style="padding: 25px;margin-bottom: 20px;">

                        <input id="btn" style="margin-left: 10%" class="btn btn-disabled" type="submit" value="Зарегистрироваться">


		</form>

	</div>

	<div class="footer">
		
		<p>Developed by © <i>«WebConnect»</i>, 2018</p>
                <p style="font-size: 100%">«все права защищены, копирование любой информации без разрешения автора и обратной ссылки запрещено»</p>

	</div>

	</div> 
    
 <!--Скрипт проверки введенных данных -->
 
    <script>
        
          var log=document.getElementById("log"),
              pas=document.getElementById("pas"),
              pasR=document.getElementById("pasR"),
              fam=document.getElementById("fam"),
              r=document.getElementById("r"),
              
              loginf=document.getElementById("loginf"),
              pasinf=document.getElementById("pasinf"),
              pasRinf=document.getElementById("pasRinf"),
              
              logStatus = false,
              pasStatus = false,
              pasRStatus = false,
      
              btn = document.getElementById("btn");

	setInterval(function check(){
	
        
     
        //Совпадение пароля
        if((pas.value !== '') && (pasR.value !== '')) {
            if(pas.value == pasR.value) {
                pasRinf.classList.add("hidden");
                pasRStatus = true;
            }
            else {
                pasRinf.classList.remove("hidden");
                pasRStatus = false;
            }
        }
         //Совпадение пароля
        
         //Длина логина 
        if(log.value !== '') {
            if(log.value.length < 6) {
                loginf.classList.remove("hidden");
                logStatus = false;
            }
            else {
                loginf.classList.add("hidden");
                logStatus = true;
            }
        }
        //Длина логина
        
        //Длина пароля
        if(pas.value !== '') {
            if(pas.value.length < 6) {
                pasinf.classList.remove("hidden");
                pasStatus = false;
            }
            else {
                pasinf.classList.add("hidden");
                pasStatus = true;
            }
        }
        //Длина пароля
        
        if( (fam.value !== '') && (r.value !== '') && (logStatus == true) && (pasStatus == true) && (pasRStatus == true) ) {
             btn.removeAttribute("disabled");
             btn.classList.remove("btn-disabled");
        } else {
                btn.setAttribute("disabled", "disabled");
                btn.classList.add("btn-disabled");
        }
        
	},500);
        
    </script>
  
    
 <!--Скрипт проверки введенных данных -->   

</body>
</html>