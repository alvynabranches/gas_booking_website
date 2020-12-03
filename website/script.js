document.getElementById('confirm_password').addEventListener('focusout', (e) => {
    if(document.getElementById('password').value != document.getElementById('confirm_password').value){
        alert('Confirm password does not match the password');
    }
});
document.getElementById('confirm_password').addEventListener('keyup', (e) => {
    if(document.getElementById('password').value != document.getElementById('confirm_password').value || document.getElementById('password').value.length < 8) {
        document.getElementById('confirm_password').style.border = '5px solid red';
    }else{
        document.getElementById('confirm_password').style.border = '5px solid green';
    }
});
document.getElementById('password').addEventListener('keyup', (e) => {
    if(document.getElementById('password').value.length < 8) {
        document.getElementById('password').style.border = '5px solid red';
    }else{
        document.getElementById('password').style.borderColor = 'green';
        document.getElementById('password').style.borderWidth = '5px';
    }
});
document.getElementById('full_name').addEventListener('keydown', (e) => {
    if(document.getElementById('full_name').value.length >= 5){
        document.getElementById('full_name').style.borderColor = 'green';
        document.getElementById('full_name').style.borderWidth = '5px';
    }else{
        document.getElementById('full_name').style.borderColor = 'red';
        document.getElementById('full_name').style.borderWidth = '5px';
    }
});
document.getElementById('full_name').addEventListener('focus', (e) => {
    if(document.getElementById('full_name').value.length >= 5){
        document.getElementById('full_name').style.borderColor = 'green';
        document.getElementById('full_name').style.borderWidth = '5px';
    }else{
        document.getElementById('full_name').style.border = '5px solid red';
    }
});
document.getElementById('full_name').addEventListener('focusout', (e) => {
    if(document.getElementById('full_name').value.length >= 5){
        document.getElementById('full_name').style.borderColor = 'green';
        document.getElementById('full_name').style.borderWidth = '5px';
    }else{
        document.getElementById('full_name').style.border = '5px solid red';
    }
});
document.getElementById('full_address').addEventListener('keyup', (e) => {
    if (document.getElementById('full_address').value.length >= 16){
        document.getElementById('full_address').style.borderColor = 'green';
        document.getElementById('full_address').style.borderWidth = '5px';
    }else{
        document.getElementById('full_address').style.border = '5px solid red';
    }
});
document.getElementById('full_address').addEventListener('focus', (e) => {
    if (document.getElementById('full_address').value.length >= 16){
        document.getElementById('full_address').style.borderColor = 'green';
        document.getElementById('full_address').style.borderWidth = '5px';
    }else{
        document.getElementById('full_address').style.border = '5px solid red';
    }
});
document.getElementById('full_address').addEventListener('focusout', (e) => {
    if (document.getElementById('full_address').value.length >= 16){
        document.getElementById('full_address').style.borderColor = 'green';
        document.getElementById('full_address').style.borderWidth = '5px';
    }else{
        document.getElementById('full_address').style.border = '5px solid red';
    }
});
document.getElementById('username').addEventListener('keyup', (e) => {
    if(document.getElementById('username').value.length < 8) {
        document.getElementById('username').style.border = '5px solid red';
    }else{
        document.getElementById('username').style.borderColor = 'green';
        document.getElementById('username').style.borderWidth = '5px';
    }
});
document.getElementById('username').addEventListener('focus', (e) => {
    if(document.getElementById('username').value.length < 8) {
        document.getElementById('username').style.borderColor = 'red';
        document.getElementById('username').style.borderWidth = '5px';
    }else{
        document.getElementById('username').style.borderColor = 'green';
        document.getElementById('username').style.borderWidth = '5px';
    }
});
document.getElementById('username').addEventListener('focusout', (e) => {
    if(document.getElementById('username').value.length < 8) {
        document.getElementById('username').style.borderColor = 'red';
        document.getElementById('username').style.borderWidth = '5px';
    }else{
        document.getElementById('username').style.borderColor = 'green';
        document.getElementById('username').style.borderWidth = '5px';
    }
});
// document.getElementById('email').addEventListener('keyup', (e) => {
//     let reg = /^([A-Za-z0-9_\-\.])+@([A-Za-z0-9_\-\.])+\a([A-Za-z]{2,4})$/;
//     if(reg.test(document.getElementById('email'))){
//         document.getElementById('email').style.borderColor = 'green';
//         document.getElementById('email').style.borderWidth = '5px';
//     }else{
//         document.getElementById('email').style.borderColor = 'red';
//         document.getElementById('email').style.borderWidth = '5px';
//     }
// });