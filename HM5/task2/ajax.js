
const AUTH_ERROR='error';

let form=document.forms.someForm;
let errorArea=document.getElementById('errors');
let areaForData=document.getElementById('forUrl');
form.addEventListener('submit',ajaxHandler);

function ajaxHandler(event) {
    event.preventDefault();
    let form_data=new FormData(this);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", this.action, true);
    xhr.send(form_data);

    xhr.onload = function () {
        // когда сервер ответит на запрос,
        // будет вызвана данная функция - обработчик события load
        // для объекта запроса

        if (xhr.status == 200) {
            // с сервера пришел ответ
            responseHandler(xhr.responseText);

        }
    }
}

function responseHandler(text){
    console.log(text);
    errorArea.innerHTML='';
    areaForData.innerHTML='';
    if (text===AUTH_ERROR) {
        errorArea.innerHTML='Некорректный URL';
    }
    else {
        areaForData.innerHTML=text;
    }
}