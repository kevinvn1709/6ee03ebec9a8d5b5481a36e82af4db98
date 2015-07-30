<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!function_exists('is_required')) {

    function is_required($haystack, $needle) {
        $haystack_keys = array_keys($haystack);
        foreach ($needle as $item) {
            if (!in_array($item, $haystack_keys)) {
                return FALSE;
            } else {
                if (empty($haystack[$item]) === TRUE && $haystack[$item] != '0')
                    return FALSE;
            }
        }
        return TRUE;
    }

}
if (!function_exists('make_array')) {

    function make_array($haystack, $needle = array(), $keep_null = FALSE, $check_key_in_haystack = FALSE) {
        $array = array();
        for ($i = 0, $c = count($needle); $i < $c; $i++) {
            $tmp = $haystack[$needle[$i]];
            if ($keep_null === TRUE) {
                if ($check_key_in_haystack === TRUE) {
                    if (array_key_exists($needle[$i], $haystack) === TRUE) {
                        $array[$needle[$i]] = $tmp;
                    }
                } else {
                    $array[$needle[$i]] = $tmp;
                }
            } else {
                if ($tmp != '') {
                    $array[$needle[$i]] = $tmp;
                }
            }
        }
        return $array;
    }

}
if (!function_exists('is_json')) {

    function is_json($stringJson, $null_is_true = FALSE) {
        if (empty($stringJson) === TRUE && $null_is_true === TRUE) {
            return TRUE;
        } elseif (empty($stringJson) === TRUE) {
            return false;
        }
        $json = json_decode($stringJson, TRUE);
        if (is_array($json)) {
            return TRUE;
        } else {
            return FALSE;
        }
        return FALSE;
    }

}
if (!function_exists('mysql_datetime')) {

    function mysql_datetime($time = NULL) {
        if (empty($time) === TRUE)
            $time = time();
        return date('Y-m-d H:i:s', $time);
    }

}
if (!function_exists('mysql_password')) {

    function mysql_password($str) {
        $p = sha1($str, true);
        $p = sha1($p);
        return "*" . strtoupper($p);
    }

}
if (!function_exists('random_string_humanable')) {

    function random_string_humanable($length = 6) {
        for ($i = 0, $pass = '', $vocal = rand(0, 1); $i < $length; $i++, $vocal = !$vocal) {
            $result = $pass.=$vocal ? substr('aeiou', mt_rand(0, 4), 1) : substr('abcdefghijklmnopqrstuvwxyz', mt_rand(0, 25), 1);
        }
        return $result;
    }

}

if (!function_exists('dateIsBetween')) {

    function dateIsBetween($from, $to, $date = '') {
        $date = empty($date) ? date('Y-m-d H:i:s') : strtotime($date);
        $from = is_int($from) ? $from : strtotime($from);
        $to = is_int($to) ? $to : strtotime($to);
        return ($date > $from) && ($date < $to);
    }

}

if (!function_exists('split_content')) {

    function split_content($tag_start, $tag_end, $str) {
        $temp = '';
        $temp1 = '';
        $result = '';
        $temp = explode($tag_start, $str);
        if (count($temp) > 2) {
            for ($i = 1; $i < count($temp); $i++) {
                $temp1 = explode($tag_end, $temp[$i]);
                $result[] = $temp1[0];
            }
        } else {
            $temp1 = explode($tag_end, $temp[1]);
            $result = $temp1[0];
        }
        return $result;
    }

}


if (!function_exists('week_to_date')) {

    function week_to_date($year, $week, $start_week = 0) {
        $time = strtotime("1 January $year", time());
        $day = date('w', $time);
        $time += ((7 * $week) + 1 - $day) * 24 * 3600 + ($start_week * 86400);
        //$result = date('Y-m-d', $time);
        $time += 6 * 24 * 3600;
        $result = date('Y-m-d', $time);

        if ($time > time()) {
            return FALSE;
        }
        return $result;
    }

}
if (!function_exists('week_to_range_date')) {

    function week_to_range_date($year, $week, $start_week = 0, $check_time = TRUE) {
        $time = strtotime("1 January $year", time());
        $day = date('w', $time);
        $time += ((7 * $week) + 1 - $day) * 24 * 3600 + ($start_week * 86400);
        $result['start_date'] = date('Y-m-d', $time);
        $time += 6 * 24 * 3600;
        $result['end_date'] = date('Y-m-d', $time);
        $result['week'] = $week;
        if ($time === TRUE) {
            if ($time > time()) {
                return FALSE;
            }
        }

        return $result;
    }

}
if (!function_exists('month_to_date')) {

    function month_to_date($step = 0) {
        $result = date('Y-m-t', strtotime("-{$step} Months"));
        if (strtotime($result) > time()) {
            return FALSE;
        }
        return $result;
    }

}

if (!function_exists('month_to_range_date')) {

    function current_month_to_range_date($step = 0) {
        $result['start_date'] = date('Y-m-01', strtotime("-{$step} Months"));
        $result['end_date'] = date('Y-m-t', strtotime("-{$step} Months"));
        $result['month'] = date('Y-m', strtotime($result['end_date']));
        if (strtotime($result['end_date']) > time()) {
            return FALSE;
        }
        return $result;
    }

}

if (!function_exists('month_to_date')) {

    function month_to_date($year, $month) {
        $month = sprintf("%02s", $month);
        $result['start_date'] = date("{$year}-{$month}-01");
        $result['end_date'] = date("{$year}-{$month}-t", strtotime($result['start_date']));
        return $result;
    }

}

if (!function_exists('toMysqlDate')) {

    function toMysqlDate($str = null) {
        if ($str) {
            list($sday, $smonth, $syear) = explode("/", $str);
            return "$syear-$smonth-$sday";
        } else {
            return NULL;
        }
    }

}

if (!function_exists('toFormDate')) {

    function toFormDate($time) {
        if ($time) {
            $time = strtotime($time);
            if ($time) {
                return date('d/m/Y', $time);
            }
        }
        return NULL;
    }

}

if (!function_exists('toFormDateTime')) {

    function toFormDateTime($time) {
        if ($time) {
            $time = strtotime($time);
            if ($time) {
                return date('d/m/Y H:i:s', $time);
            }
        }
        return NULL;
    }

}

if (!function_exists('toMysqlDatetime')) {

    function toMysqlDatetime($str = null) {
        if ($str) {
            $tmp = explode(' ', $str);
            list($sday, $smonth, $syear) = explode("/", $tmp[0]);
            list($hour, $min, $ss) = explode(':', $tmp[1]);
            return "$syear-$smonth-$sday $hour:$min:$ss";
        }
    }

}
if (!function_exists('createDateRangeArray')) {

    function createDateRangeArray($strDateFrom, $strDateTo) {
        $aryRange = array();

        $iDateFrom = mktime(1, 0, 0, substr($strDateFrom, 5, 2), substr($strDateFrom, 8, 2), substr($strDateFrom, 0, 4));
        $iDateTo = mktime(1, 0, 0, substr($strDateTo, 5, 2), substr($strDateTo, 8, 2), substr($strDateTo, 0, 4));

        if ($iDateTo >= $iDateFrom) {
            array_push($aryRange, date('Y-m-d', $iDateFrom)); // first entry
            while ($iDateFrom < $iDateTo) {
                $iDateFrom+=86400; // add 24 hours
                array_push($aryRange, date('Y-m-d', $iDateFrom));
            }
        }
        return $aryRange;
    }

}

function week_to_date($year, $week, $start_week = 0) {
    $time = strtotime("1 January $year", time());
    $day = date('w', $time);
    $time += ((7 * $week) + 1 - $day) * 24 * 3600 + ($start_week * 86400);
    //$result = date('Y-m-d', $time);
    $time += 6 * 24 * 3600;
    $result = date('Y-m-d', $time);
    return $result;
}

if (!function_exists('createWeekRangeArray')) {

    function createWeekRangeArray($sWeek, $sYear, $eWeek, $eYear) {
        $aryRange = array();
        $stime = strtotime(week_to_date($sYear, $sWeek));
        $etime = strtotime(week_to_date($eYear, $eWeek));
        if ($etime >= $stime) {
            array_push($aryRange, array('year' => $sYear, 'week' => $sWeek)); // first entry
            while ($stime < $etime) {
                $sYear = date('Y', $stime);
                $sWeek = date('W', $stime);
                array_push($aryRange, array('year' => $sYear, 'week' => $sWeek));
                $stime+=86400 * 7; // add 24 hours
            }
        }
        return $aryRange;
    }

}


if (!function_exists('createMonthRangeArray')) {

    function createMonthRangeArray($sdate, $edate) {
        $time1 = strtotime($sdate);
        $time2 = strtotime($edate);
        $my = date('mY', $time2);
        $months[date('m', $time1)] = array(
            'sdate' => date('Y-m-01', $time1),
            'edate' => date('Y-m-t', $time1),
            'month' => date('m', $time1),
            'year' => date('Y', $time1)
        );
        $f = '';

        while ($time1 < $time2) {
            $time1 = strtotime((date('Y-m-d', $time1) . ' +15days'));
            if (date('F', $time1) != $f) {
                $f = date('F', $time1);

                if (date('mY', $time1) != $my && ($time1 < $time2)) {
                    $months[date('m', $time1)] = array(
                        'sdate' => date('Y-m-01', $time1),
                        'edate' => date('Y-m-t', $time1),
                        'month' => date('m', $time1),
                        'year' => date('Y', $time1)
                    );
                }
            }
        }

        $months[date('m', $time2)] = array(
            'sdate' => date('Y-m-01', $time2),
            'edate' => date('Y-m-t', $time2),
            'month' => date('m', $time2),
            'year' => date('Y', $time2)
        );
        return array_values($months);
    }

    if (!function_exists('get_week_param')) {

        function get_week_param($str, $delimiter = ' ') {
            if (empty($str) === TRUE) {
                return FALSE;
            }
            $str = trim($str);
            $arr = explode($delimiter, $str);
            foreach ($arr as $value) {
                if (is_numeric($value) === TRUE && $value < 55) {
                    $week = $value;
                }
                if (is_numeric($value) === TRUE && $value > 1977) {
                    $year = $value;
                }
            }
            if (is_numeric($week) === TRUE && is_numeric($year) === TRUE) {
                return array('year' => $year, 'week' => sprintf("%02s", $week));
            }
            return FALSE;
        }

    }

    if (!function_exists('get_month_param')) {

        function get_month_param($str, $delimiter = '/') {
            if (empty($str) === TRUE) {
                return FALSE;
            }
            $str = trim($str);
            $arr = explode($delimiter, $str);
            foreach ($arr as $value) {
                if (is_numeric($value) === TRUE && $value <= 12) {
                    $month = $value;
                }
                if (is_numeric($value) === TRUE && $value > 1977) {
                    $year = $value;
                }
            }
            if (is_numeric($month) === TRUE && is_numeric($year) === TRUE) {
                return array('year' => $year, 'month' => $month);
            }
            return FALSE;
        }

    }

    if (!function_exists('array_mesh')) {

        function array_mesh() {
            // Combine multiple associative arrays and sum the values for any common keys
            // The function can accept any number of arrays as arguments
            // The values must be numeric or the summed value will be 0
            // Get the number of arguments being passed
            $numargs = func_num_args();

            // Save the arguments to an array
            $arg_list = func_get_args();

            // Create an array to hold the combined data
            $out = array();

            // Loop through each of the arguments
            for ($i = 0; $i < $numargs; $i++) {
                $in = $arg_list[$i]; // This will be equal to each array passed as an argument
                // Loop through each of the arrays passed as arguments
                foreach ($in as $key => $value) {
                    // If the same key exists in the $out array
                    if (array_key_exists($key, $out)) {
                        // Sum the values of the common key
                        if (empty($in[$key]) === FALSE && empty($out[$key]) === FALSE) {
                            $sum = $in[$key] + $out[$key];
                        }
                        if (empty($in[$key]) === TRUE && empty($out[$key]) === FALSE) {
                            $sum = $out[$key];
                        }
                        if (empty($in[$key]) === FALSE && empty($out[$key]) === TRUE) {
                            $sum = $in[$key];
                        }

                        // Add the key => value pair to array $out
                        $out[$key] = $sum;
                    } else {
                        // Add to $out any key => value pairs in the $in array that did not have a match in $out
                        $out[$key] = $in[$key];
                    }

                    ksort($out[$key]);
                }
            }
            return $out;
        }

    }
    if (!function_exists('last_week_from_date')) {

        function last_week_from_date($ddate, $week_num = 11) {
            $duedt = explode("-", $ddate);
            $date = mktime(0, 0, 0, $duedt[1], $duedt[2], $duedt[0]);
            $week = (int) date('W', $date);
            $date = new DateTime();

            $start = (array) $date->setISODate($duedt[0], $week);

            $week = date('Y-m-d', strtotime($start['date']));
            $year = date("Y", strtotime($week) - 86400 * 7 * $week_num);
            $week = date("W", strtotime($week) - 86400 * 7 * $week_num);
            return array('year' => $year, 'week' => $week);
        }

    }
    if (!function_exists('toNonAccent')) {

        function toNonAccent($str) {
            return strtr($str, array(
                'à' => 'a', 'á' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a',
                'ằ' => 'a', 'ắ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a', 'ă' => 'a',
                'ầ' => 'a', 'ấ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a', 'â' => 'a',
                'è' => 'e', 'é' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e',
                'ề' => 'e', 'ế' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e', 'ê' => 'e',
                'ì' => 'i', 'í' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i',
                'ò' => 'o', 'ó' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o',
                'ồ' => 'o', 'ố' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o', 'ô' => 'o',
                'ờ' => 'o', 'ớ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o', 'ơ' => 'o',
                'ù' => 'u', 'ú' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u',
                'ừ' => 'u', 'ứ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u', 'ư' => 'u',
                'ỳ' => 'y', 'ý' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y', 'đ' => 'd',
                'À' => 'A', 'Á' => 'A', 'Ả' => 'A', 'Ã' => 'A', 'Ạ' => 'A',
                'Ằ' => 'A', 'Ắ' => 'A', 'Ẳ' => 'A', 'Ẵ' => 'A', 'Ặ' => 'A', 'Ă' => 'A',
                'Ầ' => 'A', 'Ấ' => 'A', 'Ẩ' => 'A', 'Ẫ' => 'A', 'Ậ' => 'A', 'Â' => 'A',
                'È' => 'E', 'É' => 'E', 'Ẻ' => 'E', 'Ẽ' => 'E', 'Ẹ' => 'E',
                'Ề' => 'E', 'Ế' => 'E', 'Ể' => 'E', 'Ễ' => 'E', 'Ệ' => 'E', 'Ê' => 'E',
                'Ì' => 'I', 'Í' => 'I', 'Ỉ' => 'I', 'Ĩ' => 'I', 'Ị' => 'I',
                'Ò' => 'O', 'Ó' => 'O', 'Ỏ' => 'O', 'Õ' => 'O', 'Ọ' => 'O',
                'Ồ' => 'O', 'Ố' => 'O', 'Ổ' => 'O', 'Ỗ' => 'O', 'Ộ' => 'O', 'Ô' => 'O',
                'Ờ' => 'O', 'Ớ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O', 'Ợ' => 'O', 'Ơ' => 'O',
                'Ù' => 'U', 'Ú' => 'U', 'Ủ' => 'U', 'Ũ' => 'U', 'Ụ' => 'U',
                'Ừ' => 'U', 'Ứ' => 'U', 'Ử' => 'U', 'Ữ' => 'U', 'Ự' => 'U', 'Ư' => 'U',
                'Ỳ' => 'Y', 'Ý' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y', 'Ỵ' => 'Y', 'Đ' => 'D',
                ' ' => '-'
            ));
        }

    }
    if (!function_exists('read_and_cleanDir')) {

        function read_and_cleanDir($dir) {
            if (is_dir($dir) === FALSE) {
                return FALSE;
            }
            $dir = scandir($dir);
            foreach ($dir as $key => $value) {
                if ($value === '.' || $value === '..' || $value === '.svn') {
                    unset($dir[$key]);
                } else {
                    $result[] = $value;
                }
            }
            ksort($result);
            return $result;
        }

    }

    if (!function_exists('permission_list_games')) {

        function permission_list_games($list_game, $control, $func) {

            $CI = & get_instance();
            $user_id = $CI->session->userdata('user_id');
            $CI->load->MEAPI_Model('UserModel');
            $list_permission_db = $CI->UserModel->get_list_permission($user_id);

            $list_permission = json_decode($list_permission_db['permission_data'], TRUE);

            if (empty($list_permission) === FALSE) {
                $list_permission = array_change_key_case($list_permission, CASE_LOWER);
                foreach ($list_game as $key => $val) {
                    $key = strtolower($key);
                    foreach ($list_permission[$key] as $k_lp => $v_lp) {
                        if ($k_lp == $control . '_' . $func) {
                            $result [$key] = $val;
                        };
                    }
                }
                return $result;
            }
            return FALSE;
        }

    }

    if (!function_exists('service_name_to_service_id')) {

        function service_name_to_service_id($service_name) {
            if (empty($service_name) === TRUE) {
                return FALSE;
            }

            $service = MEAPI_Config_App::service();
            foreach ($service_name as $key => $value) {
                if (is_numeric($service[$key]) === TRUE) {
                    $result[] = $service[$key];
                }
            }
            return $result;
        }

    }
    if (!function_exists('number_format_by_account')) {

        function number_format_by_account($data, $type) {
            if ($data < 0 || empty($type) === TRUE) {
                return FALSE;
            }
            if ($type == 'dot')
                $result = number_format($data, 0, ",", ".");
            else
                $result = number_format($data);
            return $result;
        }

    }
}