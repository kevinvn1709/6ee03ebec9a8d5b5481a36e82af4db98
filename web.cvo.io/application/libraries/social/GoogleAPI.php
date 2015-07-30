<?php

class GoogleAPI {
    private $CI;

    private $link_oauth = 'https://accounts.google.com/o/oauth2/token';
    private $link_verify = 'https://www.googleapis.com/plus/v1/people/me';

    private $client_id = '831241106839-et06q75cv68fsn3tpgponqgb3l5skt59.apps.googleusercontent.com';
    private $client_secret = 'oFusrex890o0LIualFJrEVSg';
    private $redirect_url = 'postmessage';
    private $grant_type = 'authorization_code';


    public function __construct() {
        $this->CI =& get_instance();
    }

    public function verify_access_token($access_token) {
        if (empty($access_token) == FALSE) {
            $this->CI->load->library('Curl');

            $ch = curl_init($this->link_oauth);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FAILONERROR, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
            curl_setopt($ch, CURLOPT_POSTFIELDS,
                'code=' . $access_token . '&' .
                'client_id=' . $this->client_id . '&' .
                'client_secret=' . $this->client_secret . '&' .
                'redirect_uri=' . $this->redirect_url . '&' .
                'grant_type=' . $this->grant_type
            );
            $result = json_decode(curl_exec($ch), TRUE);

            if (empty($result['access_token']) == FALSE) {
                $link = $this->link_verify . '/?access_token=' . $result['access_token'];
                $result = json_decode($this->CI->curl->get($link), TRUE);

                $response = array(
                    'id' => $result['id'],
                    'first_name' => $result['name']['givenName'],
                    'last_name' => $result['name']['familyName'],
                    'full_name' => $result['displayName'],
                    'gender' => $result['gender'],
                    'verified' => $result['verified'],
                    'avatar' => $result['image']['url'],

                );
                return $response;
            }
        }
        return FALSE;
    }
}