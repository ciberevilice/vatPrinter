<?php
        session_unset(); 
	include 'assets/php/DataBase.php';
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

	<a href="#openModal" class="help">?</a>
	<div id="openModal" class="modalDialog" style="overflow: scroll">
		<div style=" font-size: 15px;">
			<a href="#close" class="close">X</a>
			<h2 style="text-align: center">ПОДРОБНАЯ СПРАВКА К ПРОГРАММЕ УЧЁТА ПЕЧАТАЮЩИХ СРЕДСТВ</h2>
	<p style="text-align: center">Web Connetc Company представляет программный продукт на веб платформе, позволяющий ускорить обработку данных связаных с обслуживанием печатающих усстройств. Далее предложенна иструкция, чтобы даже не опытные пользователи смогли пользоваться данным продуктом</p>
	<a href="#" onclick="openbox('box1'); return false">Авторизация</a>
	<div id="box1" style="display: none;">
		<p>Авторизация - это главный процесс, при котором сравниваються введёные вами данные с имеющимися в базе данных, Если они прошли проверку, то вам будет дан доступ к переходу на главную страницу. Если вы где-то ошиблись, то всплывающее окно вам об этом сообщит.</p> 
	</div>
	<br>
	<a href="#" onclick="openbox('box2'); return false">Регистрация</a>
	<div id="box2" style="display: none;">
		<p>Если вы ещё не зарегестрированы, то вам необходимо пройти регистрацию, дабы получиться доступ к системе.
		Чтобы зарегестрироваться вам нужно на странице авторизации нажать кнопку регестрация, в каждом поле ввести свои данные и нажать кнопку зарегестрироваться, если вы всё сделали правильно ,то вас переведёт обратно на страницу авторизации со всплывающем окном, что вы зарегестрировались, и теперь вы можете пользоватеся приложением, если же такой пользователь есть или же вы допустили какие-то ошибки, то в всплывающем окне вы увидите ошибку.</p>
	</div>
	<br>
	<a href="#" onclick="openbox('box4'); return false">Заявки</a>
	<div id="box4" style="display: none;">
		<p>Заявка - форма уведомления системного администртора о какой-то ошибке. В данном приложеняи пользователю был разработан интерфейс заявки где ему необходимо ввести небольшое количетсов данных в определённые поля. </p>
		<ul>
			<li>Поле Код Принтера - это поле куда нужно записать 12-ти значный чифровой код, обозначенный на задней части вашего устройства</li>
			<li>Поле Причина сдачи - это поле для выбора одной из причин выподающего списка</li>
			<li>Поле Уточненние - это  поле не обезательно для заполнение, оно напроавленно на помощь системному администртаору, заполняя его верно, вы можете ускорить ремонт вашего устройства</li>
		</ul>
		<p>На главной странице помимо кнопки заявок, вы можеет увидеть кнопку "совместимые картриджи", это кнопка покажет, если на складе, в данный момент, нужный вам картридж, в заправленном состоянии. Если же такой имеется, вы можеет в уточнениях к заявке подписать код картриджа для замены, дабы ускорить замену картриджа</p>
	</div>
	<br>
	<a href="#" onclick="openbox('box5'); return false">Отчёты</a>
	<div id="box5" style="display: none;">
		<p>Программа позволяет создавать и распечатывать отчёты. При необхождимости администратор может, открыть окно отчётот, выбрать период (неделя, месяц, год) и один из нескольки возмоных отчётов таких как:</p>
		<ul>
			<li>Отчёт по количеству заменённых картриджей</li>
			<li>Отчёт по количеству обращений по причине неисправности</li>
			<li>Отчёт по всему имеющемся парку машин</li> 
		</ul>
	</div>
	<script>
		function openbox(id){
    	display = document.getElementById(id).style.display;
 
    	if(display=='none'){
      		document.getElementById(id).style.display='block';
    	}
    	else{
       		document.getElementById(id).style.display='none';
    	}
	}
	</script>

		</div>
	</div>

	</div>

	<div class="formAut">

<!-- скрипт статуса БД -->
		<?php
			if(mysqli_connect_errno()) {
		echo '<p>Статус сервера баз данных: <span style="color: red">Отключен</span></p>';
	} else {
		echo '<p>Статус сервера баз данных: <span style="color: green">Включен</span></p>';
	}
		?>
<!-- скрипт статуса БД	 -->

		<form method="post" action="assets\php\autLogin.php">
			
			<input name = "login" type="text" placeholder="логин" id="login">
			<input name = "password" type="password" placeholder="пароль" id="password">

			<input class="btn btn-disabled" type="submit" value="Вход" name="entry" id="btn_login" disabled="disabled">
			<a class="btn" href="registration.php">Регистрация</a>

		</form>

	</div>

	<div class="footer">
		
		<p>Developed by © <i>«WebConnect»</i>, 2018</p>
                <p style="font-size: 100%">«все права защищены, копирование любой информации без разрешения автора и обратной ссылки запрещено»</p>

	</div>

	</div>

<!-- Скрипт для блокировки кнопки ВХОД -->

	<script>
	var btn = document.getElementById("btn_login");
	var login = document.getElementById("login");
	var pas = document.getElementById("password");

	setInterval(function check(){
		if((login.value !== '') && (pas.value !== '')) {
		btn.removeAttribute("disabled");
                btn.classList.remove("btn-disabled");
	} else {
		btn.setAttribute("disabled", "disabled");
                btn.classList.add("btn-disabled");
	}
	},500);
	</script>

<!-- Скрипт для блокировки кнопки ВХОД -->

</body>
</html>