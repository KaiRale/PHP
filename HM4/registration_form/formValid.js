console.log('formvalid');
class FormValidator{
    constructor(form) {
        this._form = form;
        this._validate=document.querySelectorAll('.validate');
        this._form.addEventListener('submit',  this.some.bind(this));
        this.arrErr=[];
    }

    addRules(rules){
        this._rules = rules.rules;
        this._messages = rules.messages;

        for (let i = 0; i < this._validate.length; i++) {
            let sp1 = document.createElement('p');
            sp1.setAttribute('class', 'errorText');
            sp1.innerHTML = this._messages[this._validate[i].name];
            let sp2 = this._validate[i];
            let parentElem = sp2.parentNode;
            parentElem.insertBefore(sp1, sp2.nextSibling);
        }
    }

    some (){

        this.arrErr=[];
        for (let i = 0; i < this._validate.length; i++){

            if (!this._rules[this._validate[i].name].test(this._validate[i].value)) {


                this._validate[i].setAttribute('class', 'invalid');
                this._validate[i].nextSibling.style.display='block';
                this.arrErr.push(1);
            }
            else {
                this._validate[i].nextSibling.style.display='none';
                this._validate[i].setAttribute('class', 'valid');
            }

        }

    }


    isValid () {
        this.some();
        if(this.arrErr.length>0) {
            console.log('есть ошибки');
            return false;

        }
        if(!this.arrErr.length){
            console.log("нет ошибок");
            return true;

        }

    }

}


let newForm = document.forms.someForm;

let formValidator = new FormValidator(newForm);



formValidator.addRules({
    rules: {
        name: /^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$/,
        password: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/,
        email: /^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$/
    },
    messages: {
        name: "Некорректное имя пользователя",
        password: "Неверно заданный пароль",
        email: "Неверно заданный email"
    }
});



//ajax
let form = document.forms.someForm;
form.addEventListener('submit', ajaxHandler);
function ajaxHandler(event) {
    event.preventDefault();
    if (!formValidator.isValid()){
        document.getElementById("errors").innerHTML =
            'Проверьте правильность введенных данных';
        return;
    }
    let form_data = new FormData(this);
    console.log(form_data.get("name"));

    let xhr = new XMLHttpRequest();
    console.log(xhr);
    xhr.open("POST", this.action, true);
    xhr.send(form_data);

    xhr.onload = function (event) {
        if (xhr.status == 200) {
            responseHandler(xhr.responseText);
        }
    }
}

function responseHandler(text) {
    console.log("ответ сервера: " + text);
}
