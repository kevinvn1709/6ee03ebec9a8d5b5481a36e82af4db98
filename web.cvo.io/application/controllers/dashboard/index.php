<?php

class Index extends Core_DashBoard_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->template->render();
    }

}