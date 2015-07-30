<?php

class Core_Controller extends CI_Controller {
    protected $data = array();

    public function __construct() {
        parent::__construct();
        if ($this->is_login() == FALSE) {
            redirect(base_url('authorize/login'));
        }
        $this->template->set_template('master');

        $this->template->parse_view('head', 'block/head', $this->data);
        $this->template->parse_view('header', 'block/header', $this->data);
    }

    private function is_login() {
        $account_info = $this->session->userdata('account_info');
        $this->data['account_info'] = $account_info;
        return empty($account_info) == TRUE ? FALSE : TRUE;
    }


}

require_once 'Core_DashBoard_Controller.php';
require_once 'Core_Home_Controller.php';
require_once 'Core_Authorize_Controller.php';