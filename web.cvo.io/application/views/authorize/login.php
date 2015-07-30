<div class="signin_wrapper">
    <div class="row">
        <div class="right_block">
            <div class="row">
                <form id="authorize_form" class="col-md-12 col-sm-12 col-xs-12">

                    <!-- fixes autocomplete off -->
                    <input style="display:none" type="submit" id="submit_btn">
                    <input type="password" style="display:none">
                    <!-- /fixes autocomplete off -->

                    <h2 class="signup-heading">Signin</h2>

                    <div class="row">
                        <div class="input-field col-md-12 col-sm-12 col-xs-12">
                            <i class="ion-coffee prefix"></i>
                            <input id="email" name="email" type="text" class="validate">
                            <label for="icon_prefix-2">Email</label>
                        </div>
                        <div class="input-field col-md-12 col-sm-12 col-xs-12">
                            <i class="ion-key prefix"></i>
                            <input id="password" name="password" type="password" class="validate">
                            <label for="icon_prefix-3">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">Or login with</div>
                        <div class="col-md-6 col-sm-6 col-xs-6 ti-align-right" style="text-align: right;">
                            <a href="javascript:;" onclick="loginFacebook()">Facebook |</a>
                            <a href="javascript:;" onclick="loginGoogle()">Google</a>
                        </div>
                    </div>
                    <div class="bottom_info">
                        <a href="#" class="pull-right" data-toggle="modal" data-target="#forgot">forgot password?</a>
                        <a href="<?php echo base_url('authorize/register'); ?>" class="pull-left">Register new
                            account</a>
                    </div>
                    <div class="clearfix"></div>
                    <a href="#" id="login_btn" class="btn btn-primary btn-block">Sign in</a>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
         style="">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="ion-android-settings"></i> Reset password</h4>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" placeholder="Enter Email here">
                        <h6 class="note"><i class="ion-android-mail"></i> password will be sent to your email</h6>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-red" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Login Fail
                </div>
                <div class="modal-body">
                    Please check your account
                </div>
            </div>
        </div>
    </div>
</div>