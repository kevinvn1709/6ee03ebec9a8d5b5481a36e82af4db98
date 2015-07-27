<?php

class Core_DashBoard_Controller extends CI_Controller {
    protected $data = array();

    public function __construct() {
        parent::__construct();
        if ($this->is_login() == FALSE) {
            redirect(base_url('authorize/login'));
        }
        $this->template->set_template('dashboard');

        $this->template->parse_view('head', 'block/dashboard/head', $this->data);
        $this->template->parse_view('header', 'block/dashboard/header', $this->data);
    }

    private function is_login() {
        return TRUE;
        $user_info = $this->session->userdata('user_info');
        $this->data['user_info'] = $user_info;
        return empty($user_info) == TRUE ? FALSE : TRUE;
    }


}