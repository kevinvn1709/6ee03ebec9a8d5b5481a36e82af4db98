jQuery(document).ready(function () {
    loginGoogle = function () {
        auth2.grantOfflineAccess({'redirect_uri': 'postmessage'}).then(signInCallback);
    }

    loginFacebook = function () {
        FB.login(function (response) {
            if (response.authResponse) {
                jQuery.ajax({
                    method: 'post',
                    url: '/authorize/login/facebook',
                    data: {
                        access_token: response.authResponse.accessToken
                    },
                    success: function (data) {
                       location.reload();
                    }
                })
            } else {
                console.log('User cancelled login or did not fully authorize.');
            }
        });
    }
});
function start() {
    gapi.load('auth2', function() {
        auth2 = gapi.auth2.init({
            client_id: '831241106839-et06q75cv68fsn3tpgponqgb3l5skt59.apps.googleusercontent.com',
            // Scopes to request in addition to 'profile' and 'email'
            scope: 'email'
        });
    });
}

function signInCallback(authResult) {
    if (authResult.code) {
        jQuery.ajax({
            method: 'post',
            url: '/authorize/login/google',
            data: {
                access_token: authResult.code
            },
            success: function(result) {
                location.reload();
            }
        });
    } else {
        // There was an error.
    }
}