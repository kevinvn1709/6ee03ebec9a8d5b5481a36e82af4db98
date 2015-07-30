<?php

class Core_Authorize_Controller extends CI_Controller {
    protected $data = array();

    public function __construct() {
        parent::__construct();
        if ($this->is_login() == TRUE) {
            redirect(base_url('dashboard'));
        }

        $this->template->set_template('authorize');
        $this->template->parse_view('head', 'block/authorize/head', $this->data);
    }

    private function is_login() {
        $account_info = $this->session->userdata('account_info');
        $this->data['account_info'] = $account_info;
        return empty($account_info) == TRUE ? FALSE : TRUE;
    }

}