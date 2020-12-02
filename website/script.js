document.getElementById('confirm_password').addEventListener('keyup', (e) => {
    if(document.getElementById('password').value != document.getElementById('confirm_password').value || document.getElementById('password').value.length < 8) {
        document.getElementById('password').style.border = '5px solid red';
    }else{
        document.getElementById('password').style.border = '5px solid green';
    }
});
document.getElementById('confirm_password').addEventListener('focusout', (e) => {
    if(document.getElementById('password').value != document.getElementById('confirm_password').value || document.getElementById('confirm_password').value.length < 8){
        alert('Confirm password does not match the password');
    }
});
document.getElementById('password').addEventListener('keyup', (e) => {
    if(document.getElementById('password').value.length < 8) {
        document.getElementById('password').style.border = '5px solid red';
    }else{
        document.getElementById('password').style.border = '5px solid green';
    }
});
document.getElementById('full_name').addEventListener('keydown', (e) => {
    if(document.getElementById('full_name').value.length >= 5){
        document.getElementById('password').style.border = '5px solid green';
    }else{
        document.getElementById('password').style.border = '5px solid red';
    }
});
document.getElementById('full_name').addEventListener('focus', (e) => {
    if(document.getElementById('full_name').value.length >= 5){
        document.getElementById('password').style.border = '5px solid green';
    }else{
        document.getElementById('password').style.border = '5px solid red';
    }
});
document.getElementById('full_name').addEventListener('focusout', (e) => {
    if(document.getElementById('full_name').value.length >= 5){
        document.getElementById('password').style.border = '5px solid green';
    }else{
        document.getElementById('password').style.border = '5px solid red';
    }
});
document.getElementById('full_address').addEventListener('keyup', (e) => {
    if (document.getElementById('full_address').value.length >= 16){
        document.getElementById('password').style.border = '5px solid green';
    }else{
        document.getElementById('password').style.border = '5px solid red';
    }
});
document.getElementById('full_address').addEventListener('focus', (e) => {
    if (document.getElementById('full_address').value.length >= 16){
        document.getElementById('password').style.border = '5px solid green';
    }else{
        document.getElementById('password').style.border = '5px solid red';
    }
});
document.getElementById('full_address').addEventListener('focusout', (e) => {
    if (document.getElementById('full_address').value.length >= 16){
        document.getElementById('password').style.border = '5px solid green';
    }else{
        document.getElementById('password').style.border = '5px solid red';
    }
});
document.getElementById('username').addEventListener('keyup', (e) => {
    if(document.getElementById('username').value.length < 8) {
        document.getElementById('password').style.border = '5px solid red';
    }else{
        document.getElementById('password').style.border = '5px solid green';
    }
});
document.getElementById('username').addEventListener('focus', (e) => {
    if(document.getElementById('username').value.length < 8) {
        document.getElementById('password').style.border = '5px solid red';
    }else{
        document.getElementById('password').style.border = '5px solid green';
    }
});
document.getElementById('username').addEventListener('focusout', (e) => {
    if(document.getElementById('username').value.length < 8) {
        document.getElementById('password').style.border = '5px solid red';
    }else{
        document.getElementById('password').style.border = '5px solid green';
    }
});
// document.getElementById('email').addEventListener('keyup', (e) => {
//     let reg = /^([A-Za-z0-9_\-\.])+@([A-Za-z0-9_\-\.])+\a([A-Za-z]{2,4})$/;
//     if(reg.test(document.getElementById('email'))){
//         document.getElementById('password').style.border = '5px solid green';
//     }else{
//         document.getElementById('password').style.border = '5px solid red';
//     }
// });