<div class="profile-sidebar">
    <div class="portlet light profile-sidebar-portlet">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
            <img src="<?php echo $account_info['avatar']; ?>" class="img-responsive" alt="">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                <?php echo $account_info['full_name']; ?>
            </div>
            <div class="profile-usertitle-job">
                Developer
            </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
            <button type="button" class="btn btn-circle green-haze btn-sm">Follow</button>
            <button type="button" class="btn btn-circle btn-danger btn-sm">Message</button>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
            <ul class="nav">
                <li class="active">
                    <a href="extra_profile.html">
                        <i class="icon-home"></i>
                        Overview </a>
                </li>
                <li>
                    <a href="extra_profile_account.html">
                        <i class="icon-settings"></i>
                        Account Settings </a>
                </li>
                <li>
                    <a href="page_todo.html" target="_blank">
                        <i class="icon-check"></i>
                        Tasks </a>
                </li>
                <li>
                    <a href="extra_profile_help.html">
                        <i class="icon-info"></i>
                        Help </a>
                </li>
            </ul>
        </div>
        <!-- END MENU -->
    </div>
</div>