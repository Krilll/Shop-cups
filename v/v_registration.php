
<div class ="reg">
	<div id="reg-name"><a href="#" class="not-active-reg reg-what">Войти<a> / <a href="#" class="active-reg reg-what" id="regist"> Регистрация</a></div>
	<div class="unseen" id="log">
	<form method="post">
			<p> Логин &nbsp; <input type="text" name="loginNew"/></p>
			<p> Пароль <input type="password" name="passwordNew" /></p>
			<p> Запомнить? <input type="checkbox" name="rememberme" /></p>
			<p><input class="button"  type="submit" value="Войти" /></p>
		</form>
	</div>
	
	<div  id="registration">
		<form method="post" id="myForm">
		
			<div class="field">
				<label for="login">Логин</label>
				<input type="text" name="login" id="login" required >
			</div>

			<div class="field">
				<label for="name">Имя</label>
				<input type="text" name="name" id="name" required >
			</div>

			<div class="field">
				<label for="lastName">Фамилия</label>
				<input type="text" name="lastName" id="lastName" required >
			</div>

			<div class="field">
				<label for="phone">Телефон </label>
				<input type="text" name="telephone" id="telephone" placeholder="+7 (999) 99 99 999" required>
			<!--<input type="tel" name="telephone" 
			placeholder="XXXXXXXXXXX"
			pattern="[0-9]{11}"/> -->
			</div>
			<div class="field">
				<label for="password">Пароль</label>
				<input type="password" name="password" id="password" required >
			</div>

			<div class="field">
				<label for="passwordRepeat">Подтвердите пароль</label>
				<br/>
				<input type="password" name="passwordRepeat" id="passwordRepeat" required >
			</div>
            <div id="errorPassRepeat"></div>
			<p><input class="button" type="submit" id="submitReg" value="Зарегистрироваться" ></p>
		</form>
	</div>	
</div>

<? if(isset($text)){echo "<script> alert('$text'); </script>";}?>



