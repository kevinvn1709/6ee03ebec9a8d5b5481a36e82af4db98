<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $head; ?>
    </head>

    <body>
        <?php echo $content; ?>

        <!-- jQuery -->
        <script src="/assets/authorize/js/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="/assets/authorize/js/bootstrap.min.js"></script>
        <!-- custom scrollbar plugin -->
        <!-- Compiled and minified JavaScript -->
        <script src="/assets/authorize/js/materialize.js"></script>
        <script>
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '326396260712034',
                    xfbml: true,
                    version: 'v2.3'
                });
            };

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <script src="https://apis.google.com/js/client:platform.js?onload=start" async defer></script>
        <script src="/assets/authorize/js/scripts.js"></script>

<?php echo $_scripts; ?>
    </body>
</html>