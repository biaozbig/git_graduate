<?php

/**
 * Created by PhpStorm.
 * User: Biao
 * Date: 2017/4/20
 * Time: 22:13
 */
class RequestHelper
{
    protected $_url = '';
    protected $_header = '';

    public function _construct(){

    }

    public function  makeRequest($expire = 0,$extend = array(), $hostIp =''){
        $url = $this->_url;
        $_params = $this->_params;
        $_header = $this->_header;
        $_curl = curl_init();
        //自行设定指定的host
        if(!empty($hostIp)){
            $urlInfo = parse_url($url);
            if(empty($urlInfo['host'])){
                $urlInfo['host'] = substr(DOMAIN, 7, -1);
                $url = "http://{$hostIp}{url}";
            }else{
                $url = str_replace($urlInfo['host'], $hostIp, $url);
            }
            $_header[] = "Host:{$urlInfo['host']}";
        }
        //post请求的参数
        if(!empty($_params)){
            curl_setopt($_curl, CURLOPT_POSTFIELDS, http_build_query($_params));
            curl_setopt($_curl, CURLOPT_POST, true);
        }
        //https请求
        if (substr($url, 0, 8) == 'https://') {
            curl_setopt($_curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($_curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        }
        curl_setopt($_curl, CURLOPT_URL, $url);
        curl_setopt($_curl, CURLOPT_RETURNTRANSFER);
        curl_setopt($_curl, CURLOPT_USERAGENT, 'API PHP CURL');
        curl_setopt($_curl, CURLOPT_HTTPHEADER, $_header);

        if($expire > 0){
            curl_setopt($_curl, CURLOPT_TIMEOUT, $expire);
            curl_setopt($_curl, CURLOPT_CONNECTTIMEOUT, $expire);
        }
        // 额外的配置
        if (!empty($extend)) {
            curl_setopt_array($_curl, $extend);
        }

        $result['result'] = curl_exec($_curl);
        $result['code'] = curl_getinfo($_curl, CURLINFO_HTTP_CODE);
        $result['info'] = curl_getinfo($_curl);
        if ($result['result'] === false) {
            $result['result'] = curl_error($_curl);
            $result['code'] = -curl_errno($_curl);
        }
        curl_close($_curl);
        return $result;





    }

}