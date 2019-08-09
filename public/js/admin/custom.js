"use strict";

var image_inputs = Array.from(document.querySelectorAll('.has-preview'));

image_inputs.forEach(function (item, index, arr) {
    image_inputs[index].addEventListener("change", function () {
        var file = this.files[0],
            preview = URL.createObjectURL(file),
            container = this.getAttribute("data-preview");

        document.querySelector(container).setAttribute('src', preview);
        document.querySelector(container).style.display = 'inline-block';
    });
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function updatePassword() {
    let password = $("#newpassword").val(),
        repeat = $("#repeatpassword").val();
    if (password != repeat) {
        swal('Пароли не совпадают', 'Проверьте правильность введенных паролей', "error");
        return 0;
    }
    $.ajax({
        type: 'POST',
        url: '/admin/change-password',
        data: {
            password: password,
        },
        success: function (data) {
            swal(data.success, data.message, "success");
            $("#change-password").modal('hide');
        },
        error: function () {
            swal('Что-то пошло не так', 'Пожалуйста повторите попытку позже', "error");
        }
    });
}


$(document).ready(function() {
    $(".update-password").on('click', function() {
        updatePassword();
    });
});
