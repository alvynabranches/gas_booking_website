document.getElementById('confirm_password').addEventListener('keyup', (e) => {
    if(document.getElementById('password').value != document.getElementById('confirm_password').value) {
        document.getElementById('confirm_password').style.borderColor = 'red';
        document.getElementById('confirm_password').style.borderWidth = '5px';
    }
    else {
        document.getElementById('confirm_password').style.borderColor = 'green';
        document.getElementById('confirm_password').style.borderWidth = '5px';
    }
});
document.getElementById('password').addEventListener('keyup', (e) => {
    if(document.getElementById('password').value != document.getElementById('confirm_password').value) {
        document.getElementById('confirm_password').style.borderColor = 'red';
        document.getElementById('confirm_password').style.borderWidth = '5px';
    }
    else {
        document.getElementById('confirm_password').style.borderColor = 'green';
        document.getElementById('confirm_password').style.borderWidth = '5px';
    }
});
document.getElementById('password').addEventListener('keyup', (e) => {
    if(document.getElementById('password').value.length >= 8){
        document.getElementById('password').style.borderColor = 'green';
        document.getElementById('password').style.borderWidth = '5px';
    }
    else{
        document.getElementById('password').style.borderColor = 'red';
        document.getElementById('password').style.borderWidth = '5px';
    }
});