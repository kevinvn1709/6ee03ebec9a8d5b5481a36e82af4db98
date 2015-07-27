<?php

class Index extends Core_Home_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->template->render();
    }

}