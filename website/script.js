document.getElementById('confirm_password').addEventListener('keyup', (e) => {
    if(document.getElementById('password').value != document.getElementById('confirm_password').value || document.getElementById('password').value.length < 8) {
        document.getElementById('confirm_password').style.borderColor = 'red';
        document.getElementById('confirm_password').style.borderWidth = '5px';
    }else{
        document.getElementById('confirm_password').style.borderColor = 'green';
        document.getElementById('confirm_password').style.borderWidth = '5px';
    }
});
document.getElementById('password').addEventListener('keyup', (e) => {
    if(document.getElementById('password').value.length < 8) {
        document.getElementById('password').style.borderColor = 'red';
        document.getElementById('password').style.borderWidth = '5px';
    }else{
        document.getElementById('password').style.borderColor = 'green';
        document.getElementById('password').style.borderWidth = '5px';
    }
});
document.getElementById('full_name').addEventListener('keydown', (e) => {
    if(document.getElementById('full_name').value.length >= 4){
        document.getElementById('full_name').style.borderColor = 'green';
        document.getElementById('full_name').style.borderWidth = '5px';
    }else{
        document.getElementById('full_name').style.borderColor = 'red';
        document.getElementById('full_name').style.borderWidth = '5px';
    }
});
document.getElementById('full_address').addEventListener('keyup', (e) => {
    if (document.getElementById('full_address').value.length >= 16){
        document.getElementById('full_address').style.borderColor = 'green';
        document.getElementById('full_address').style.borderWidth = '5px';
    }else{
        document.getElementById('full_address').style.borderColor = 'red';
        document.getElementById('full_address').style.borderWidth = '5px';
    }
});
document.getElementById('username').addEventListener('keyup', (e) => {
    if(document.getElementById('username').value.length < 8) {
        document.getElementById('username').style.borderColor = 'red';
        document.getElementById('username').style.borderWidth = '5px';
    }else{
        document.getElementById('username').style.borderColor = 'green';
        document.getElementById('username').style.borderWidth = '5px';
    }
});
document.getElementById('email').addEventListener('keyup', (e) => {
    let reg = /^([A-Za-z0-9_\-\.])+@([A-Za-z0-9_\-\.])+\a([A-Za-z]{2,4})$/;
    if(reg.test(document.getElementById('email'))){
        document.getElementById('email').style.borderColor = 'green';
        document.getElementById('email').style.borderWidth = '5px';
    }else{
        document.getElementById('email').style.borderColor = 'red';
        document.getElementById('email').style.borderWidth = '5px';
    }
});