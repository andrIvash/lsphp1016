// form.addEventListener('submit', function(e){
//     e.preventDefault();
//     console.log('submit');
//
//     if (!isEmpty(this)) {
//         var data = JSON.stringify({
//             login: form.login.value.trim(),
//             password: form.password.value.trim()
//         });
//         var result = sendData('main.php', data, 'application/json');
//         result.then(function(res){
//             form.reset();
//             resultBlock.innerHTML = res;
//
//         }, function(res){
//             form.reset();
//             resultBlock.innerHTML = res;
//         });
//     } else {
//         resultBlock.innerHTML = 'Введите оба значения';
//     }
//
// });
// form.addEventListener('reset', function(){
//     console.log('reset');
//     resultBlock.innerHTML = '';
//
// });
addfile.addEventListener('submit', function(e){
    e.preventDefault();
    if (!isEmpty(addfile)) {
        var file = inputfile.files[0];
        var formData = new FormData();
        //if (!file.type.match('image.*')) {
            formData.append('file', file, file.name);
        //}


        var result = sendData('image.php', formData, false);
        result.then(function(res){
            addfile.reset();
            //resultBlock.innerHTML = res;
            console.log(res)

        }, function(res){
            addfile.reset();
            resultBlock.innerHTML = res;
        });
    } else {
        resultBlock.innerHTML = 'Введите имя файла';
    }

});

function isEmpty(form) {
    var result  = true;
    form.querySelectorAll('input').forEach(function(elem){
        if (elem.type === 'text' || elem.type === 'password' || elem.type === 'file') {
            if(elem.value !== '') {
                result = false;
            }
        }
    });
    return result;
}

function sendData(url, data, type) { //'application/json' , 'multipart/form-data'
    return new Promise(function(resolve, reject) {
        var xhr = new XMLHttpRequest();

        xhr.open('POST', url, true);
        if (type !== false) {
            xhr.setRequestHeader('Content-Type', type);
        }
        xhr.send(data);
        xhr.onreadystatechange = function () {
            if (this.readyState != 4) return;

            if (this.status != 200) {
                reject('ошибка: ' + (this.status ? this.statusText : 'запрос не удался'));
            } else {
                resolve(this.responseText);

            }
        };
    });

}
