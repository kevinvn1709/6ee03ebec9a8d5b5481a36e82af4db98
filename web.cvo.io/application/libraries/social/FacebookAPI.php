<?php

class FacebookAPI {
    private $link_graph = 'https://graph.facebook.com';
    private $CI;

    public function __construct() {
        $this->CI =& get_instance();
    }

    public function verify_access_token($access_token) {
        if (empty($access_token) == FALSE) {
            $this->CI->load->library('Curl');
            $link = $this->link_graph . '/me/?access_token=' . $access_token;
            $result = json_decode($this->CI->curl->get($link), TRUE);

            if (empty($result['verified']) == FALSE) {
                $response = array(
                    'id' => $result['id'],
                    'first_name' => $result['first_name'],
                    'last_name' => $result['last_name'],
                    'full_name' => $result['name'],
                    'gender' => $result['gender'],
                    'verified' => $result['verified'],
                    'avatar' => $this->link_graph . '/' . $result['id'] . '/picture',

                );
                return $response;
            }
        }
        return FALSE;
    }
}