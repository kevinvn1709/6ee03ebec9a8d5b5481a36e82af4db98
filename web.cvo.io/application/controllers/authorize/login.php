<?php

class Login extends Core_Authorize_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $user_info = $this->session->userdata('user_info');
        if (empty($user_info) == FALSE) {
            redirect(base_url('home'));
        }
        $this->template->parse_view('content', 'authorize/login', $this->data);

        $this->template->render();
    }

}