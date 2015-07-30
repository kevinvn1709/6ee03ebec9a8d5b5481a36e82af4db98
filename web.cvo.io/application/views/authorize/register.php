<div class="signup_wrapper">
    <div class="row">
        <div class="right_block">
            <div class="row">
                <form id="signup_form" class="col-md-12">
                    <input style="display:none" type="submit" id="submit_btn">

                    <h2 class="signup-heading">Signup</h2>
                    <div class="row">
                        <div class="input-field col-md-12">
                            <i class="ion-ios-person prefix"></i>
                            <input name="fristname" id="icon_prefix" type="text" class="validate">
                            <label for="icon_prefix">First Name</label>
                        </div>
                        <div class="input-field col-md-12">
                            <i class="ion-ios-person prefix"></i>
                            <input name="lastname" id="icon_prefix-1" type="text" class="validate">
                            <label for="icon_prefix-1">Last Name</label>
                        </div>
                        <div class="input-field col-md-12">
                            <i class="ion-coffee prefix"></i>
                            <input name="username" id="icon_prefix-2" type="text" class="validate">
                            <label for="icon_prefix-2">Username</label>
                        </div>
                        <div class="input-field col-md-12">
                            <i class="ion-key prefix"></i>
                            <input name="password"  id="icon_prefix-3" type="password" class="validate">
                            <label for="icon_prefix-3">Password</label>
                        </div>
                        <div class="input-field col-md-12">
                            <i class="ion-email prefix"></i>
                            <input name="email"  id="icon_prefix-4" type="email" class="validate">
                            <label for="icon_prefix-4">Email</label>
                        </div>
                    </div>
                    <a href="<?php echo base_url('authorize/login'); ?>" class="pull-right">Already have an account ?</a>

                    <div class="clearfix"></div>
<!--                    <div class="piluku-check">
                        <input type="checkbox" id="c1"/>
                        <label for="c1"></label>
                    </div>-->
                    <a href="#" id="register_btn" class="btn btn-primary btn-block">register</a>
                </form>
            </div>
        </div>
        <!-- right_block -->
    </div>
    <!-- row -->
</div>