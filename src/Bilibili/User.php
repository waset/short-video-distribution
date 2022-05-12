<?php

namespace Waset\Bilibili;

class User extends Application
{
    /**
     * 获取用户公开信息
     *
     * 调用该接口可获取用户公开信息，例如头像，昵称，openid等
     *
     * @see https://openhome.bilibili.com/doc/4/feb66f99-7d87-c206-00e7-d84164cd701c
     *
     * @param string $access_token
     * @return User
     */
    public function info(string $access_token)
    {
        $api_url = 'http://member.bilibili.com/arcopen/fn/user/account/info';
        $params = [
            'access_token' => $access_token,
            'client_id' => $this->client_id,
        ];

        $res = $this->https_get($api_url, $params)->toArray();

        return $res['data'] ?? throw new \Exception("获取授权信息失败", 1);
    }
}
