var oldpass = document.getElementById('oldpassword');
var newpass = document.getElementById('newpassword');
var msg = document.getElementById('msgPass');

function changePassword() {
    if (oldpass.value == '' || newpass.value == '') {
        alert('Complete todo los campos por favor.');
    } else {
        $.ajax({
            url: baseurl + 'Settings/validatePassword',
            data: { password: oldpass.value },
            method: 'POST',
            success: function (data) {
                if (data == 0) {
                    msg.style.display = 'block';
                    msg.style.backgroundColor = '#b30000';
                    msg.innerHTML = 'Error: Contraseña actual invalida, ingrese su actual contraseña correctamente.';
                } else if (data == 1) {
                    msg.style.display = 'none';
                    updatePassword();
                } else {
                    msg.style.display = 'block';
                    msg.style.backgroundColor = '#b30000';
                    msg.innerHTML = 'Error: Vuelva a intentarlo por favor.';
                }
            }
        })
    }
}

function updatePassword() {
    $.ajax({
        url: baseurl + 'Settings/changePass',
        data: { password: newpass.value },
        method: 'POST',
        success: function (data) {
            if (data > 0) {
                msg.style.display = 'block';
                msg.style.backgroundColor = 'green';
                msg.innerHTML = 'Exito!! Su contraseña fue actualizada correctamente.';
            } else {
                msg.style.display = 'block';
                msg.style.backgroundColor = '#b30000';
                msg.innerHTML = 'Error: Vuelva a intentarlo por favor.';
            }
        }
    })
}