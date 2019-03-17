class Check {
    constructor(field) {
        this.patterns = {
            login: /([a-zA-Z]|[\u0400-\u04FF]){4,15}/,
            name: /[\u0400-\u04FF]{4,15}/,
            lastName: /[\u0400-\u04FF]{4,20}/,
            //telephone: / ^ \+\7 \s{1}\(\d{3}\)\s{1}\d{2}\-\d{2}\-\d{3} $/,
            password: /\w{4,15}/
        };
        this.errors = {
            login: 'из 4-15 букв',
            name: 'из 4-15 русских букв',
            lastName: 'из 4-20 русских букв',
            //telephone: '+7 (999) 99-99-999',
            password: 'из 4-15 латинских букв и цифр'
        };

        this.errorClass = 'error-msg';
        this.field = field;
        this._check(this.field);
    }

    _check(field) {

        if (this.patterns[field.name]) {
            if (!this.patterns[field.name].test(field.value)) {
                if ($(field.parentNode.lastChild).hasClass(this.errorClass) === false) {
                    let errMsg = document.createElement('div');
                    errMsg.classList.add(this.errorClass);
                    errMsg.textContent = this.errors[field.name];
                    field.parentNode.appendChild(errMsg);
                    $("#submitReg").attr("disabled", "disabled");
                }
            } else {
                $("#submitReg").removeAttr("disabled");
                if (field.parentNode.lastChild !== field) {
                    field.parentNode.lastChild.remove();
                }
            }
        }
    }

    _checkPasswords(one,two) {
        if(one != two) {
            $("#errorPassRepeat").html("Пароли не совпадают!"); // Выводим сообщение
            $("#submitReg").attr("disabled", "disabled"); // Запрещаем отправку формы
        } else { // Условие, если поля совпадают
            $("#submitReg").removeAttr("disabled");  // Разрешаем отправку формы
            $("#errorPassRepeat").html(""); // Скрываем сообщение
        }
    }
}