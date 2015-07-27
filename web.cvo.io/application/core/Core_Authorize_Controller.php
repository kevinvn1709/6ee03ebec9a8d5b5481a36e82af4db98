<?php

class Core_Authorize_Controller extends CI_Controller {
    protected $data = array();

    public function __construct() {
        parent::__construct();
        $this->template->set_template('authorize');

        $this->template->parse_view('head', 'block/authorize/head', $this->data);
    }

}