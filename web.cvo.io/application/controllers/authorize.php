<?php

class Authorize extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function login() {
        $user_info = $this->session->userdata('user_info');
        if(empty($user_info) == FALSE) {
            redirect(base_url('home'));
        }

        $this->template->set_template('login');
        $this->template->render();
    }

    public function loginfb() {
        $params = $this->input->post();
        $response = array(
            'status' => FALSE
        );

        if ($params['access_token']) {
            $this->load->library('Curl');
            $link = 'https://graph.facebook.com/me/?access_token=' . $params['access_token'];
            $result = json_decode($this->curl->get($link), TRUE);

            if (empty($result['verified']) == FALSE) {
                $user_info = array(
                    'id' => $result['id'],
                    'name' => $result['name'],
                );

                $this->session->set_userdata('user_info', $user_info);
                $response = array(
                    'status' => TRUE
                );
            }

        }
        echo json_encode($response);
    }

}