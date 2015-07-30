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
        $this->template->parse_view('sidebar_menu', 'block/dashboard/sidebar_menu', $this->data);
        $this->template->parse_view('profile', 'block/dashboard/profile', $this->data);
    }

    private function is_login() {
        $account_info = $this->session->userdata('account_info');
        $this->data['account_info'] = $account_info;
        return empty($account_info) == TRUE ? FALSE : TRUE;
    }


}