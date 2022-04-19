<?php

namespace Waset\Kuaishou;

class User extends Application
{
    /**
     * 获取用户信息
     * @param string $access_token
     * @param string $app_id
     * @return User
     */
    public function info($access_token)
    {
        $api_url = self::BaseUrl . '/openapi/user_info/';
        $params = [
            'access_token' => $access_token,
            'app_id' => $this->app_id,
        ];

        $res = $this->https_get($api_url, $params)->toArray();

        return $res['user_info'] ?? throw new \Exception("获取授权信息失败", 1);
    }
}
