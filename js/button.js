let number = 4;


$(document).ready(() => {
	
	/*для подгрузки данных на странице catalog.php при нажатии кнопки "Еще"*/
    $("#yet").click(() => {
        $.ajax({
            url: "v/v_item.php",
            type: "GET",
            data: {"number": number},
            error: function () {
                alert("Что-то пошло не так...");
            },
            success: function (response) {
                if (response === 0) {  // смотрим ответ от сервера и выполняем соответствующее действие
                    alert("Больше нет записей");
                } else {
                    $("#products").append(response);
                    number+=3;
                }
            }
        });
    });
	
	/*для удаления товара из корзины в профиле администратора*/
	$(".delete_admin").click( e => {
		let del_id = e.currentTarget["id"];
        $.ajax({
            url: "m/action_admin.php",
            type: "GET",
            data: {"delete_id": del_id},
            error: function () {
                alert("Что-то пошло не так...");
            },
            success: function (response) {
                if (response === 0) {  // смотрим ответ от сервера и выполняем соответствующее действие
                    alert("Что-то пошло не так...");
                } else {
					let string = response.split(',');
					if(string[0] === 'delete') {
						let new_delete = "product_" + del_id;
						$("#"+new_delete).empty();
					} else {	
						let new_count = "count_" + del_id;
						let new_price = "price_" + del_id;

						$("#"+new_count).empty();
						$("#"+new_count).append(string[0]);
						$("#"+new_price).empty();
						$("#"+new_price).append(string[0]*string[1]);
					}   
                }
            }
        });
    });
	
	/*для оформления товара из корзины в профиле администратора*/
	$(".work_admin").click( e => {
		let work_id = e.currentTarget["id"];
        $.ajax({
            url: "m/action_admin.php",
            type: "GET",
            data: {"work_id": work_id},
            error: function () {
                alert("Что-то пошло не так...");
            },
            success: function (response) {
                if (response === 0) {  // смотрим ответ от сервера и выполняем соответствующее действие
                    alert("Что-то пошло не так...");
                } else {
					let new_work = "work_" + work_id;
					$("#"+new_work).empty();
					$("#"+new_work).append("Оформлен"); 
                }
            }
        });
    });
	
	/*для оформления отправки товара из корзины в профиле администратора*/
	$(".sent_admin").click( e => {
		let sent_id = e.currentTarget["id"];
        $.ajax({
            url: "m/action_admin.php",
            type: "GET",
            data: {"sent_id": sent_id},
            error: function () {
                alert("Что-то пошло не так...");
            },
            success: function (response) {
                if (response === 0) {  // смотрим ответ от сервера и выполняем соответствующее действие
                    alert("Что-то пошло не так...");
                } else {
					let new_sent = "sent_" + sent_id;
					$("#"+new_sent).empty();
					$("#"+new_sent).append("Отправлен"); 
                }
            }
        });
    });
	
	/*для удаления товара из корзины*/
	$(".delete_basket").click( e => {
		let del_id = e.currentTarget["id"];
		let total_id = $("#total");
		let string_total = total_id.text().split(' ');
        $.ajax({
            url: "m/action_user.php",
            type: "GET",
            data: {"delete_id": del_id},
            error: function () {
                alert("Что-то пошло не так...");
            },
            success: function (response) {
                if (response === 0) {  // смотрим ответ от сервера и выполняем соответствующее действие
                    alert("Что-то пошло не так...");
                } else {
					let string = response.split(',');
					if(string[0] === 'delete') {
						let new_delete = "productU_" + del_id;
						$("#"+new_delete).empty();
						
						$("#total").empty();
						string_total[1]-=string[1];
						$("#total").append(string_total[0],' ',string_total[1],' ',string_total[2]);
					} else {
						let new_count = "countU_" + del_id;
						let new_price = "priceU_" + del_id;
						
						$("#total").empty();
						string_total[1]-=string[1];
						$("#total").append(string_total[0],' ',string_total[1],' ',string_total[2]);
						
						$("#"+new_count).empty();
						$("#"+new_count).append(string[0]);
						$("#"+new_price).empty();
						$("#"+new_price).append(string[0]*string[1]);
					}   
                }
            }
        });
    });
	
	/*для добавления товара в корзину*/	
	$("#content").on('click', '.add-to-basket', e => {
		e.preventDefault();
		let add_id = e.currentTarget["id"];
		console.log(add_id);
		let string = add_id.split('_');
		$.ajax({
            url: "m/action_user.php",
            type: "GET",
            data: {"add": string[0],
					"addIdP": string[1],
					"addIdU": string[2]},
            error: function () {
                alert("Что-то пошло не так...");
            },
            success: function (response) {
                if (response === 0) {  // смотрим ответ от сервера и выполняем соответствующее действие
                    alert("Что-то пошло не так...");
                } else {
					alert(response);
                }
            }
        });
	});
	
	/*для оформления корзины зарегистрированного пользователя*/
	$(".add_basket").click( e => {
		let check_id = e.currentTarget["id"];
		let string = check_id.split('_');
        $.ajax({
            url: "m/action_user.php",
            type: "GET",
            data: {"check_id": string[1]},
            error: function () {
                alert("Что-то пошло не так...");
            },
            success: function (response) {
                if (response === 0) {  // смотрим ответ от сервера и выполняем соответствующее действие
                    alert("Что-то пошло не так...");
                } else {
					$("#"+check_id).empty();
					$("#"+check_id).append(response);					
                }
            }
        });
    });
	
	/*для оформления корзины гостя*/
	$(".add_new_basket").click( e => {
		e.preventDefault();
		let my_form = e.currentTarget;
		let check_id = e.currentTarget.form;
		let name = check_id[0].value;
		let lastName = check_id[1].value;
		let telephone = check_id[2].value;
		if(name !== '' && lastName !== '' && telephone !== ''){
			
			$.ajax({
				url: "m/action_user.php",
				type: "GET",
				data: {"guest_name": name,
				"guest_lastName": lastName,
				"guest_telephone": telephone},
				error: function () {
					alert("Что-то пошло не так в передаче...");
				},
				success: function (response) {
					if (response === 0) {  // смотрим ответ от сервера и выполняем соответствующее действие
						alert("Что-то пошло не так...");
					} else {
					
					$(check_id).empty();
					$(check_id).append(response);				
					}
				}
			});
		}
    });
	
	/*для подсветки активного пункта меню*/
    let url=document.location.href;
	$.each($("#menu a"),function(){
		if(this.href==url){
			$(this).addClass('active');
		}
	});

	$(".reg-what").click(e => {
		let name = e.currentTarget;
		if($(name).hasClass('not-active-reg')) {
			$.each($(".reg-what"),function(){
				$(this).removeClass('active-reg');
				$(this).addClass('not-active-reg');
			});
			$(name).removeClass('not-active-reg');
            $(name).addClass('active-reg');
			
			if($(name).is("#regist")) {
				$("#registration").removeClass('unseen');
				$("#log").addClass('unseen');
			} else {
				$("#log").removeClass('unseen');
				$("#registration").addClass('unseen');
			}
			
		}
	});
});