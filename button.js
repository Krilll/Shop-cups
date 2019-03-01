let number = 4;
$(document).ready(() => {
    $("#yet").click(() => {
        $.ajax({
            url: "m/show.php",
            type: "GET",
            data: {"number": number},
            error: function () {
                alert("Что-то пошло не так...");
            },
            success: function (response) {
                if (response === 0) {  // смотрим ответ от сервера и выполняем соответствующее действие
                    alert("Больше нет записей");
                } else {
                    $("#new").append(response);
                    number+=3;
                }
            }
        });
    });

    $(".item").click(e => {
        console.log(e.currentTarget);



        //$('#dropInformation').on ('click', '.information-name', e => {
        //         myCheckout.showHideInformation(e.currentTarget);
        //     });
    });
});