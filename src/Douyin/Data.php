<?php

namespace Waset\Douyin;

class Data extends Application
{
    /**
     * 获取用户视频情况
     *
     * @param string $access_token
     * @param string $openid
     * @param integer $date_type
     * @return User
     */
    public function item($access_token, $openid, $date_type = 30)
    {
        $api_url = self::BaseUrl . '/data/external/user/item/';
        $headers = [
            "access-token: ${access_token}",
            'Content-Type: application/json',
        ];
        $params = [
            'open_id' => $openid,
            "date_type" => 30
        ];

        $res = $this->https_get($api_url, $params, $headers)->toArray();

        return $res['data'];
    }

    /**
     * 获取用户粉丝数
     *
     * @param string $access_token
     * @param string $openid
     * @param integer $date_type
     * @return User
     */
    public function fans($access_token, $openid, $date_type = 30)
    {
        $api_url = self::BaseUrl . '/data/external/user/fans/';
        $headers = [
            "access-token: ${access_token}",
            'Content-Type: application/json',
        ];
        $params = [
            'open_id' => $openid,
            "date_type" => 30
        ];

        $res = $this->https_get($api_url, $params, $headers)->toArray();

        return $res['data'];
    }

    /**
     * 获取用户点赞数
     *
     * @param string $access_token
     * @param string $openid
     * @param integer $date_type
     * @return User
     */
    public function like($access_token, $openid, $date_type = 30)
    {
        $api_url = self::BaseUrl . '/data/external/user/like/';
        $headers = [
            "access-token: ${access_token}",
            'Content-Type: application/json',
        ];
        $params = [
            'open_id' => $openid,
            "date_type" => 30
        ];

        $res = $this->https_get($api_url, $params, $headers)->toArray();

        return $res['data'];
    }

    /**
     * 获取用户评论数
     *
     * @param string $access_token
     * @param string $openid
     * @param integer $date_type
     * @return User
     */
    public function comment($access_token, $openid, $date_type = 30)
    {
        $api_url = self::BaseUrl . '/data/external/user/comment/';
        $headers = [
            "access-token: ${access_token}",
            'Content-Type: application/json',
        ];
        $params = [
            'open_id' => $openid,
            "date_type" => 30
        ];

        $res = $this->https_get($api_url, $params, $headers)->toArray();

        return $res['data'];
    }

    /**
     * 获取用户分享数
     *
     * @param string $access_token
     * @param string $openid
     * @param integer $date_type
     * @return User
     */
    public function share($access_token, $openid, $date_type = 30)
    {
        $api_url = self::BaseUrl . '/data/external/user/share/';
        $headers = [
            "access-token: ${access_token}",
            'Content-Type: application/json',
        ];
        $params = [
            'open_id' => $openid,
            "date_type" => 30
        ];

        $res = $this->https_get($api_url, $params, $headers)->toArray();

        return $res['data'];
    }

    /**
     * 获取用户主页访问数
     *
     * @param string $access_token
     * @param string $openid
     * @param integer $date_type
     * @return User
     */
    public function profile($access_token, $openid, $date_type = 30)
    {
        $api_url = self::BaseUrl . '/data/external/user/profile/';
        $headers = [
            "access-token: ${access_token}",
            'Content-Type: application/json',
        ];
        $params = [
            'open_id' => $openid,
            "date_type" => 30
        ];

        $res = $this->https_get($api_url, $params, $headers)->toArray();

        return $res['data'];
    }
}
