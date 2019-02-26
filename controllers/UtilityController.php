<?php

class UtilityController {

    public static function phantrang($tongdong = 0, $sodong = 50, $tranghientai = 1) {
        $url = "index.php";
        if (isset($_GET["ctl"])) {
            $ctl = $_GET["ctl"];
            $url = "?ctl=" . $ctl;
        }
        if (isset($_GET["act"])) {
            $act = $_GET["act"];
            $url .= "&act=" . $act;
        }

        $str = "";
        $rootURL = $url;
        $sotrang = ceil($tongdong / $sodong);

        $soluongphantrang = ceil($sotrang / 10);
        $phantrang_current = intval(ceil($tranghientai / 10));
        $phatrang_max = 10 * $phantrang_current;
        if ($phatrang_max > $sotrang) {
            $phatrang_max = $sotrang;
        }
        for ($i = 1; $i <= $sotrang; $i++) {
            if ($tranghientai == $i) {
                $str .= "<li class='active'><a href='#'>" . $i . "</a></li>";
            } else {
                $str .= "<li><input type='submit' name='page' class='btnpaging' value='" . $i . "'></li>";
            }
        }

        return $str;
    }

    public static function phantrangnew($tongdong = 0, $sodong = 50, $tranghientai = 1) {
        $url = "index.php";
        if (isset($_GET["ctl"])) {
            $ctl = $_GET["ctl"];
            $url = "?ctl=" . $ctl;
        }
        if (isset($_GET["act"])) {
            $act = $_GET["act"];
            $url .= "&act=" . $act;
        }

        $str = "";
        $rootURL = $url;
        $sotrang = ceil($tongdong / $sodong);

        $soluongphantrang = ceil($sotrang / 10);
        $phantrang_current = intval(ceil($tranghientai / 10));
        $phatrang_max = 10 * $phantrang_current;
        if ($phatrang_max > $sotrang) {
            $phatrang_max = $sotrang;
        }
        for ($i = 1; $i <= $sotrang; $i++) {
            if ($tranghientai == $i) {
                $str .= "<li class='active'><a href='#'>" . $i . "</a></li>";
            } else {
                $str .= "<li><a href='#'>" . $i . "</a></li>";
            }
        }

        return $str;
    }

    public static function gotoPage($str) {
        echo "<script type='text/javascript'>window.location.href='" . $str . "';</script>";
    }

    public static function messageSuccess() {
        echo "<script type='text/javascript'>alert('Thành công');</script>";
    }

    public static function messageError() {
        echo "<script type='text/javascript'>alert('Lỗi');</script>";
    }

    public static function message($str) {
        echo "<script type='text/javascript'>alert('" . $str . "');</script>";
    }

    public static function gen_uuid() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                // 32 bits for "time_low"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                // 16 bits for "time_mid"
                mt_rand(0, 0xffff),
                // 16 bits for "time_hi_and_version",
                // four most significant bits holds version number 4
                mt_rand(0, 0x0fff) | 0x4000,
                // 16 bits, 8 bits for "clk_seq_hi_res",
                // 8 bits for "clk_seq_low",
                // two most significant bits holds zero and one for variant DCE1.1
                mt_rand(0, 0x3fff) | 0x8000,
                // 48 bits for "node"
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    public static function formatToMySQL($date = null) {
        if ($date != NULL) {
            $arrDate = explode('/', $date);
            if (count($arrDate) > 0) {
                $day = isset($arrDate[0]) ? $arrDate[0] : date('d');
                $month = isset($arrDate[1]) ? $arrDate[1] : date('m');
                $year = isset($arrDate[2]) ? $arrDate[2] : date('Y');
                return intval($year) . "-" . intval($month) . "-" . intval($day);
            } else {
                return NULL;
            }
        }
        return NULL;
    }

    public static function formatNumber($number = 0) {
        return number_format($number, 0, ",", ".");
    }

    public static function khoangCachNgay($p_strngay1, $p_strngay2, $p_strkieu = 'ngay') {
        $m_arrngay1 = explode('/', $p_strngay1);
        $m_arrngay2 = explode('/', $p_strngay2);
        $m_intngay1 = mktime(0, 0, 0, $m_arrngay1[1], $m_arrngay1[0], $m_arrngay1[2]);
        $m_intngay2 = mktime(23, 59, 59, $m_arrngay2[1], $m_arrngay2[0], $m_arrngay2[2]);
        $m_int = abs($m_intngay1 - $m_intngay2);
        return $m_int;
        switch ($p_strkieu) {
            case 'ngay': $m_int /= 86400;
                break;
            case 'gio' : $m_int /= 3600;
                break;
            case 'phut': $m_int /= 60;
                break;
            default : break;
        }
        return round($m_int);
    }

    public static function convertNumberToInt($param) {
        return intval(str_replace(",", "", str_replace(".", "", $param)));
    }

    public static function convert2Alias($str = '') {
        $vMap = array(
            'é' => 'e',
            'è' => 'e',
            'ẻ' => 'e',
            'ẽ' => 'e',
            'ẹ' => 'e',
            'ý' => 'y',
            'ỳ' => 'y',
            'ỷ' => 'y',
            'ỹ' => 'y',
            'ỵ' => 'y',
            'ú' => 'u',
            'ù' => 'u',
            'ủ' => 'u',
            'ũ' => 'u',
            'ụ' => 'u',
            'ư' => 'u',
            'ứ' => 'u',
            'ừ' => 'u',
            'ử' => 'u',
            'ữ' => 'u',
            'ự' => 'u',
            'í' => 'i',
            'ì' => 'i',
            'ỉ' => 'i',
            'ĩ' => 'i',
            'ị' => 'i',
            'ó' => 'o',
            'ò' => 'o',
            'ỏ' => 'o',
            'õ' => 'o',
            'ọ' => 'o',
            'ô' => 'o',
            'ố' => 'o',
            'ồ' => 'o',
            'ổ' => 'o',
            'ỗ' => 'o',
            'ộ' => 'o',
            'á' => 'a',
            'à' => 'a',
            'ả' => 'a',
            'ã' => 'a',
            'ạ' => 'a',
            'â' => 'a',
            'ấ' => 'a',
            'ầ' => 'a',
            'ẩ' => 'a',
            'ẫ' => 'a',
            'ậ' => 'a',
            'ă' => 'a',
            'ắ' => 'a',
            'ằ' => 'a',
            'ẳ' => 'a',
            'ẵ' => 'a',
            'ặ' => 'a',
            'ê' => 'e',
            'ế' => 'e',
            'ể' => 'e',
            'ễ' => 'e',
            'ệ' => 'e',
            'ơ' => 'o',
            'ớ' => 'o',
            'ờ' => 'o',
            'ở' => 'o',
            'ỡ' => 'o',
            'ợ' => 'o',
            'É' => 'e',
            'È' => 'e',
            'Ẻ' => 'e',
            'Ẽ' => 'e',
            'Ẹ' => 'e',
            'Ê' => 'e',
            'Ế' => 'e',
            'Ề' => 'e',
            'Ể' => 'e',
            'Ễ' => 'e',
            'Ệ' => 'e',
            'Ý' => 'y',
            'Ỳ' => 'y',
            'Ỷ' => 'y',
            'Ỹ' => 'y',
            'Ỵ' => 'y',
            'Ú' => 'u',
            'Ù' => 'u',
            'Ủ' => 'u',
            'Ũ' => 'u',
            'Ụ' => 'u',
            'Ư' => 'u',
            'Ứ' => 'u',
            'Ừ' => 'u',
            'Ử' => 'u',
            'Ữ' => 'u',
            'Ự' => 'u',
            'Í' => 'i',
            'Ì' => 'i',
            'Ỉ' => 'i',
            'Ĩ' => 'i',
            'Ị' => 'i',
            'Ó' => 'o',
            'Ò' => 'o',
            'Ỏ' => 'o',
            'Õ' => 'o',
            'Ọ' => 'o',
            'Ô' => 'o',
            'Ố' => 'o',
            'Ồ' => 'o',
            'Ổ' => 'o',
            'Ỗ' => 'o',
            'Ộ' => 'o',
            'Ơ' => 'o',
            'Ớ' => 'o',
            'Ờ' => 'o',
            'Ở' => 'o',
            'Ỡ' => 'o',
            'Ợ' => 'o',
            'Á' => 'a',
            'À' => 'a',
            'Ả' => 'a',
            'Ã' => 'a',
            'Ạ' => 'a',
            'Â' => 'a',
            'Ấ' => 'a',
            'Ầ' => 'a',
            'Ẩ' => 'a',
            'Ẫ' => 'a',
            'Ậ' => 'a',
            'Ă' => 'a',
            'Ắ' => 'a',
            'Ằ' => 'a',
            'Ẳ' => 'a',
            'Ẵ' => 'a',
            'Ặ' => 'a',
            'đ' => 'd',
            'Đ' => 'd',
        );
        $str = strtolower(preg_replace('/[^0-9a-zA-Z\_\-]/', '-', strtr(strtr($str, $vMap), array(' ' => '-'))));
        $ii = 0;
        $new = '';
        while ($ii < strlen($str)) {
            if ($str[$ii] == '-') {
                $new = $new . $str[$ii];
                $ii++;
                while ($str[$ii] == '-' && $ii < strlen($str)) {
                    $ii++;
                }
            } else {
                $new = $new . $str[$ii];
                $ii++;
            }
        }
        return $new;
    }

    public static function checkRole() {
        $RoleId = 0;
        if (isset($_SESSION["user_info_admin"])) {
            $RoleId = $_SESSION["user_info_admin"]["role"];
        }
        $TabId = 0;
        if (isset($_GET["tabid"])) {
            $TabId = $_GET["tabid"];
        }
        $Sys_role_permisionsModel = new Sys_role_permisionsModel();
        $Sys_role_permisionsModel->setRoleId($RoleId);
        $Sys_role_permisionsModel->setMenuFunctionId($TabId);
        $Sys_role_permisionsModel->getCheckRole();
        $array = array(
            "view" => $Sys_role_permisionsModel->getIsView(),
            "update" => $Sys_role_permisionsModel->getIsUpdate(),
            "delete" => $Sys_role_permisionsModel->getIsDelete()
        );
        return $array;
    }

    public static function tinh_thoi_gian_thuc($from, $to = null) {
        $to = (($to === null) ? (time()) : ($to));
        $to = ((is_int($to)) ? ($to) : (strtotime($to)));
        $from = ((is_int($from)) ? ($from) : (strtotime($from)));

        $units = array
            (
            "year" => 29030400, // seconds in a year   (12 months)
            "month" => 2419200, // seconds in a month  (4 weeks)
            "week" => 604800, // seconds in a week   (7 days)
            "day" => 86400, // seconds in a day    (24 hours)
            "hour" => 3600, // seconds in an hour  (60 minutes)
            "minute" => 60, // seconds in a minute (60 seconds)
            "second" => 1         // 1 second
        );

        $diff = abs($from - $to);
        $suffix = (($from > $to) ? (date('d-m-Y')) : (" " . date("d/m/Y", strtotime("+1 day"))));

        foreach ($units as $unit => $mult)
            if ($diff >= $mult) {
                $and = (($mult != 1) ? ("") : ("and "));
                $output .= ", " . $and . intval($diff / $mult) . " " . $unit . ((intval($diff / $mult) == 1) ? ("") : ("s"));
                $diff -= intval($diff / $mult) * $mult;
            }
        $output .= " " . $suffix;
        $output = substr($output, strlen(", "));
        return $output;
    }

}
