<?php

namespace Waset\Xigua;

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

        $res = $this->https_get($api_url, $params)->toArray();

        return $res['data'];
    }
}
