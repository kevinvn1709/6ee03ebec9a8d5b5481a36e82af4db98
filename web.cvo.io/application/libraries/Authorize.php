<?php

class Authorize {

    private $CI;

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->library('curl');
    }

    public function login($params) {
        
    }

    private function _call_api($control, $func, $params) {
        $params['otp'] = $this->get_otp();
        $token = $this->make_token($control, $func, $params);
        $link = $this->url . "/?control={$control}&func={$func}&" . http_build_query($params) . "&app={$this->app}&token={$token}";
        $json = $this->CI->Curl->get($link);
        $data = json_decode($json, TRUE);
        return is_array($data) ? $data : FALSE;
    }

    private function get_otp() {
        $this->CI->load->MEAPI_Library("TOTP", 'TOTP');
        return $this->CI->TOTP->getCode($this->key);
    }

    private function make_token($control, $func, $params) {
        return md5($control . $func . implode('', $params) . $this->app . $this->key);
    }

}

?>