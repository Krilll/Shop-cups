$(document).ready(() => {

/*для телефона маска при помощи jquery*/
	$("#telephone").mask("+7 (999) 99-99-999", {autoclear: false, placeholder:" "});


	$("#login").on("keyup", function() { // Выполняем при изменении логина
		my = new Check (document.getElementsByTagName('input')['login']);
	});
	
	$("#name").on("keyup", function() { // Выполняем при изменении имени
        my = new Check (document.getElementsByTagName('input')['name']);
	});

	$("#lastName").on("keyup", function() { // Выполняем при изменении фамилии	
        my = new Check (document.getElementsByTagName('input')['lastName']);
	});
	

	$("#password").on("keyup", function() { // Выполняем при изменении 1-го пароля	
        my = new Check (document.getElementsByTagName('input')['password']);
	});

	$("#passwordRepeat").on("keyup", function() { // Выполняем при изменении 2-го пароля
		let value1 = $("#password").val(); 
		let value2 = $(this).val();
        my = new Check (" ");
        my._checkPasswords(value1, value2)

	});
});