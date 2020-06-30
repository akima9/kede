<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*************************************************************
 * common_helper
 * 전페이지에서 공통으로 사용하는 Helper
 ************************************************************/
/**
 * print_r 을 예쁘게 출력해준다.
 * @param object $str   출력할 오브젝트
 */
function print_r2($str) {
    echo "<pre>";
    print_r($str);
    echo "</pre>";
}

/**
 * Alert 창을 띄우고 특정 URL로 이동합니다.
 * @param string $msg   띄울 메시지 창
 * @param string $url   이동할 URL
 */
function alert($msg = '', $url = '')
{
    if (empty($msg)) {
        $msg = "잘못된 접근입니다.";
    }
    echo '<meta http-equiv="content-type" content="text/html; charset=utf-8">';
    echo '<script type="text/javascript">alert("' . $msg . '");';
    if (empty($url)) {
        echo 'history.go(-1);';
    }
    if ($url) {
        echo 'document.location.href="' . $url . '"';
    }
    echo '</script>';
    exit;
}

/**
 * 특정문자열을 암호화하여 내보낸다.
 * @param string $string    암호화할 문자열
 * @return string
 */
function get_password_hash($string)
{
    $CI =& get_instance();
    return hash( 'sha256', hash('md5', $CI->config->item('encryption_key') . $string ) );
}

/**
 * 배열의 특정 키값을 가져옵니다.
 * @param string $item      배열의 키 값
 * @param array $array      검사할 배열
 * @param string $default   값이 없을시 기본값
 * @return mixed|null
 */
function element($item, $array, $default = NULL)
{
    return is_array($array) && array_key_exists($item, $array) &&  $array[$item] ? $array[$item] : $default;
}


/**
 * 현재 주소를 Parameter 포함해서 가져온다.
 * @param boolean $encoding_url 현재 주소를 리턴할때 URL인코딩 여부
 * @return string
*/
function current_full_url($encoding_url = FALSE)
{
    $CI =& get_instance();
    $url = $CI->config->site_url($CI->uri->uri_string());
    $return = ($CI->input->server('QUERY_STRING')) ? $url . '?' . $CI->input->server('QUERY_STRING') : $url;
    return $encoding_url ?  urlencode($return) : $return;
}
?>