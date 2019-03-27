<form method="post" id="guestOrder">
<p>Пожалуйста, введите Ваше имя, фамилию и номер телефона для отправки заказа на обработку</p>
	<div class="field">
		<label for="guestName">Имя</label>
		<input type="text" name="guestName" id="guestName" maxlength=15 required>
	</div>

	<div class="field">
		<label for="guestLastName">Фамилия</label>
		<input type="text" name="guestLastName" id="guestLastName" maxlength=20 required>
	</div>

	<div class="field">
		<label for="guestTelephone">Телефон </label>
		<input type="text" name="guestTelephone" id="guestTelephone" placeholder="+7 (999) 99 99 999" required>
	</div>
	<p><input class="button add_new_basket" type="submit" value="Оформить заказ" ></p>
</form>
</br>