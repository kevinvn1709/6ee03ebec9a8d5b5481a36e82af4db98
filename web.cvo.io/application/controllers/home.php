<?php

class Home extends Core_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->template->render();
    }

}