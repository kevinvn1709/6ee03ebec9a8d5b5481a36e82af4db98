<?php

class Register extends Core_Authorize_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $user_info = $this->session->userdata('user_info');
        if (empty($user_info) == FALSE) {
            redirect(base_url('home'));
        }
        $this->template->add_js('assets/authorize/js/custom/register.js');
        $this->template->parse_view('content', 'authorize/register', $this->data);

        $this->template->render();
    }

}