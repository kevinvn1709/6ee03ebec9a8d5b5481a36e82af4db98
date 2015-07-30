$(document).ready(function () {
    login();
    $('#login_btn').click(function () {
        $('#submit_btn').click();

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
                success: function (response) {
                    if (response.code == '000001') {
                        alert('Mình đi đâu đây');
                    } else {
                        $('#my_modal').modal('show');
                    }
                }
            });
            return false;
        }
    });
}
