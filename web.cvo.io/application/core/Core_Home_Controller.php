<?php

class Core_Home_Controller extends CI_Controller {
    protected $data = array();

    public function __construct() {
        parent::__construct();
        $this->template->set_template('home');

    }

    private function is_login() {

    }


}

require_once 'Core_DashBoard_Controller.php';