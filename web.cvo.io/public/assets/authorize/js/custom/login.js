$(document).ready(function () {
    login();
    forgot();
    $('#login_btn').click(function () {
        $('#submit_btn').click();

    });
    $('#forgot_btn').click(function () {
        $('#submit_forgot_btn').click();

    });
});

function login() {
    $('#authorize_form').submit(function () {
        var email = $('#email').val();
        var password = $('#password').val();
        if (email == '' || password == '') {
            return false;
        } else {
            var data = $('#authorize_form').serializeArray();
            $.ajax({
                url: BASE_URL + 'authorize/api_login/',
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function (response) {
                    if (response.code === '000000') {
                        alert('Mình đi đâu đây');
                    } else {
                        $('#my_modal').find('.modal-body').html(response.msg);
                        $('#my_modal').modal('show');
                    }
                }
            });
            return false;
        }
    });
}

function forgot() {
    $('#forgot_form').submit(function () {
        var email = $('#forgot_email').val();
        if (email == '') {
            return false;
        } else {
            var data = $('#forgot_form').serializeArray();
            $.ajax({
                url: BASE_URL + 'authorize/api_login/forgot',
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function (response) {
                    if (response.code === '000000') {
                        $('#my_modal').find('.modal-header').html('Reset password success');
                        $('#my_modal').find('.modal-body').html(response.msg);
                    } else {
                        
                        $('#my_modal').find('.modal-header').html('Reset password fail');
                        $('#my_modal').find('.modal-body').html(response.msg);
                        
                        
                    }
                    $('#my_modal').modal('show');
                }
            });
            return false;
        }
    });
}