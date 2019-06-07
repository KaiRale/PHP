

let form=document.forms.form_for_file;
let areaForData=document.getElementById('for_text');

console.log(form);
form.addEventListener('submit',ajaxHandler);

function ajaxHandler(event) {
    event.preventDefault();
    let form_data=new FormData(this);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", this.action, true);
    xhr.send(form_data);

    xhr.onload = function () {
        if (xhr.status == 200) {
            responseHandler(xhr.responseText);
        }
    }
}

function responseHandler(text){
    console.log(text);
    areaForData.innerHTML='';
    areaForData.innerHTML=text;

}