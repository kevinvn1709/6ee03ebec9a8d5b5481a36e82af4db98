<?php

class Api_login extends Core_Authorize_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Authorize account
     * $params string email,tring password 
     */
    public function index() {
        /*
         * Verify data
         */
        $params = $this->input->post(NULL);
        if (is_required($params, array('email', 'password'))) {
            /*
             * Call API login
             */
            $this->load->library('authorize');
            $result = $this->authorize->login($params);
            if (!empty($result)) {
                
            } else {
                
            }
        } else {
            /*
             * return FALSE;
             */
        }
    }

}
