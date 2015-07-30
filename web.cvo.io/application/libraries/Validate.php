<?php

class Validate {

    public function isEmail($email) {
        if (preg_match('/^[_a-z0-9]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) {
            return TRUE;
        }
        return FALSE;
    }

    public function isFullname($fullname) {
        return strlen($fullname) > 2 && strlen($fullname) < 200;
    }

    public function isValidRefCode($account, $min = 6, $max = 20) {
        $pattern = '/^[a-zA-Z0-9_]{' . $min . ',' . $max . '}$/';
        if (preg_match($pattern, $account)) {
            return TRUE;
        }
    }
    
    public function isValidAccount($account, $min = 6, $max = 20) {
        $pattern = '/^[a-zA-Z0-9]{' . $min . ',' . $max . '}$/';
        if (preg_match($pattern, $account)) {
            return TRUE;
        }
    }

    public function isExist($value = null) {
        return $value != null && trim($value) != '';
    }

    public function isDigit($value) {
        if (preg_match('/^[0-9]+$/', $value)) {
            return TRUE;
        }
        return FALSE;
    }

    public function isNumber($value) {
        if (is_numeric($value)) {
            return TRUE;
        }
        return FALSE;
    }

    public function validLen($str, $min, $max) {
        return (strlen($str) >= $min) && (strlen($str) <= $max);
    }

    public function isUserName($username, $min = 6, $max = 20) {
        $pattern = '/^[a-zA-Z0-9]{' . $min . ',' . $max . '}$/';
        if (preg_match($pattern, $username)) {
            return TRUE;
        }
        return FALSE;
    }

    public function validPassword($password) {
        return (strlen($password) >= 6);
    }

    public function checkvalid($key, $k, $v) {

        $str_valid['isExist'] = ' không được để trống';
        $str_valid['isDigit'] = ' phải là số 0->9';
        $str_valid['isNumber'] = ' phải là số ';
        $str_valid['validLen_1'] = ' chỉ cho phép từ ';
        $str_valid['validLen_2'] = ' đến ';
        $str_valid['validLen_3'] = ' ký tự ';

        $str_valid['isUserName_1'] = ' chỉ cho phép từ ';
        $str_valid['isUserName_2'] = ' đến ';
        $str_valid['isUserName_3'] = ' ký tự ';

        $str_valid['isValidAccount_1'] = ' chỉ cho phép từ ';
        $str_valid['isValidAccount_2'] = ' đến ';
        $str_valid['isValidAccount_3'] = ' ký tự ';


        if ($key == 'validLen' || $key == 'isUserName' || $key == 'isValidAccount') {
            if (!$this->$key($v['key'], $v['min'], $v['max'])) {
                $error = $this->errSpan(ucfirst(str_replace('_', ' ', $k)) . $str_valid[$key . '_1'] . $v['min'] . $str_valid[$key . '_2'] . $v['max'] . $str_valid[$key . '_3']) . ' ,';
            }
        } else {
            if (!$this->$key($v)) {
                $error = $this->errSpan(ucfirst(str_replace('_', ' ', $k)) . $str_valid[$key]) . ' ,';
            }
        }
        return $error;
    }

    public function errSpan($msg) {
        return <<<EOF
        <span class="error_string">$msg</span>
EOF;
    }

    public function errDiv($msg) {
        return <<<EOF
        <div class="signup-error">
            <div class="fieldWithErrors">$msg<br>
            </div>
            </div>
EOF;
    }

}
