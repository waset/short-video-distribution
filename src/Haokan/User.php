<?php

namespace Waset\Haokan;

class User extends Application
{
    /**
     * 获取用户信息
     * @param string $access_token
     * @param string $openid
     * @return User
     */
    public function info()
    {
        $url = "https://haokan.hao123.com/author/";

        $html = preg_replace("/\r|\n|\t/", "", file_get_contents($url.$this->app_id));

        preg_match("/<h1 class=\"uinfo-head-name\">(.*?)<\/h1>/is", $html, $nameArr);
        $data['name'] = $nameArr[1];

        preg_match('/<div class=\"uinfo-head-avatar\"><img(.*?)src=\"(.*?)\"(.*?)>/is', $html, $avatarArr);
        $data['avatar'] = $avatarArr[2];

        preg_match("/粉丝<\/h3><p>(.*?)<\/p>/is", $html, $fansArr);
        $data['fans'] = $fansArr[1];

        preg_match("/视频<\/h3><p>(.*?)<\/p>/is", $html, $videoArr);
        $data['video'] = $videoArr[1];

        return $data;
    }
}
