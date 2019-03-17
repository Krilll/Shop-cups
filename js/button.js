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