<?php

class Login extends Core_Authorize_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $user_info = $this->session->userdata('user_info');
        if (empty($user_info) == FALSE) {
            redirect(base_url('home'));
        }
        $this->template->parse_view('content', 'authorize/login', $this->data);

        $this->template->render();
    }

    public function facebook() {
        $params = $this->input->post();
        $response = array(
            'status' => FALSE
        );

        if (empty($params['access_token']) == FALSE) {
            $this->load->library('social/FacebookAPI', '', 'FacebookAPI');
            $result = $this->FacebookAPI->verify_access_token($params['access_token']);
            $account_info = array(
                'id' => $result['id'],
                'full_name' => $result['full_name'],
                'avatar' => $result['avatar'],
            );
            $this->session->set_userdata('account_info', $account_info);
            $response = array(
                'status' => TRUE,
            );
        }
        echo json_encode($response);
    }

    public function google() {
        $params = $this->input->post();
        $response = array(
            'status' => FALSE
        );

        if (empty($params['access_token']) == FALSE) {
            $this->load->library('social/GoogleAPI', '', 'GoogleAPI');
            $result = $this->GoogleAPI->verify_access_token($params['access_token']);
            $account_info = array(
                'id' => $result['id'],
                'full_name' => $result['full_name'],
                'avatar' => $result['avatar'],
            );
            $this->session->set_userdata('account_info', $account_info);
            $response = array(
                'status' => TRUE,
            );
        }
        echo json_encode($response);
    }

}