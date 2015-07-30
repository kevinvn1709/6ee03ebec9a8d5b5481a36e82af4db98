$(document).ready(function () {
    register();
    $('#register_btn').click(function () {
        $('#submit_btn').click();

    });
});

function register() {
    $('#signup_form').submit(function () {
        var data = $('#signup_form').serializeArray();
        $.ajax({
            url: BASE_URL + 'authorize/api_login/signup',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {
                if (response.code === '000000') {
                    $('#my_modal').find('.modal-title').html('Signup success');
                    $('#my_modal').find('.modal-body').html(response.msg);
                } else {
                    $('#my_modal').find('.modal-title').html('Signup fail');
                    $('#my_modal').find('.modal-body').html(response.msg);

                }
                $('#my_modal').modal('show');
            }
        });
        return false;

    });
}