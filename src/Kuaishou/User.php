<?php

namespace Waset\Kuaishou;

class User extends Application
{
    /**
     * 获取用户信息
     * @param string $access_token
     * @param string $openid
     * @return User
     */
    public function info($access_token, $openid)
    {
        $api_url = self::BaseUrl . '/oauth/userinfo/';
        $params = [
            'access_token' => $access_token,
            'open_id' => $openid
        ];

        $res = $this->https_post($api_url, $params)->toArray();

        return $res['user_info'] ?? throw new \Exception("快手获取用户失败", 1);;
    }
}
