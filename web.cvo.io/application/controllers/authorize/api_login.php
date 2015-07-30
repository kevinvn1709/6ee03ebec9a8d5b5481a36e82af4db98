<?php

class Api_login extends Core_Authorize_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Authorize account
     * $params string email,tring password 
     */
    public function login() {
        /*
         * Verify data
         */
        $response = array('code' => 1, 'msg' => 'Please check your account');
        $params = $this->input->post();
        if (is_required($params, array('email', 'password'))) {
            $this->load->library('authorize');
            $result = $this->authorize->login($params);
            if (!empty($result)) {
                $response = array('code' => '000001', 'msg' => 'Signin success');
                echo json_encode($response);
            } else {
                echo json_encode($result);
            }
        } else {
            echo json_encode($response);
        }
        return;
    }

    /**
     * Reset account passwrod
     * $params string email
     */
    public function forgot() {
        /*
         * Verify data
         */
        $response = array('code' => 1, 'msg' => 'Please check your email');
        $params = $this->input->post();
        if (is_required($params, array('email'))) {
            $this->load->library('authorize');
            $result = $this->authorize->forgot($params);
            if (!empty($result)) {
                $response = array('code' => '000001', 'msg' => 'You will receive an email shortly');
                echo json_encode($response);
            } else {
                echo json_encode($result);
            }
        } else {
            echo json_encode($response);
        }
        return;
    }
    
    /**
     * signup account
     * $params string email
     */
    public function Signup() {
        /*
         * Verify data
         */
        $response = array('code' => 1, 'msg' => 'Please check your infomation');
        $params = $this->input->post();
        if (is_required($params, array('fristname','lastname','username','password','email'))) {
            $this->load->library('authorize');
            $result = $this->authorize->register($params);
            if (!empty($result)) {
                $response = array('code' => '000001', 'msg' => 'You will receive an email shortly');
                echo json_encode($response);
            } else {
                echo json_encode($result);
            }
        } else {
            echo json_encode($response);
        }
        return;
    }
}
