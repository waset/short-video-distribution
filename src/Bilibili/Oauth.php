<?php

namespace Waset\Bilibili;

class Oauth extends Application
{
    /**
     * bilibili 授权地址
     *
     * 该接口只适用于bilibili 网页应用授权
     *
     * @see https://openhome.bilibili.com/doc/4/aac73b2e-4ff2-b75c-4c96-35ced865797b
     *
     * @param string $redirect_uri 授权成功后的回调地址，必须以http/https开头。
     * @param string $state 用于保持请求和回调的状态
     * @return string
     */
    public function code(array $scope,  string $redirect_uri, string $state = "")
    {
        $api_url = 'https://passport.bilibili.com/register/pc_oauth2.html#/';

        $params = [
            // 应用唯一标识
            'client_id' => $this->client_id,
            'return_url' => urlencode($redirect_uri),
            // 写死为'code'即可
            'response_type' => 'code',
            // 'scope' => implode(',', $scope),
            'state' => $state
        ];

        return $this->https_url($api_url, $params);
    }

    /**
     * 获取access_token
     *
     * 该接口用于获取用户授权凭证access_token
     *
     * @see https://openhome.bilibili.com/doc/4/eaf0e2b5-bde9-b9a0-9be1-019bb455701c
     *
     * @param string $code
     * @return BaseApi
     */
    public function token(string $code)
    {
        $api_url = self::BaseUrl . '/x/account-oauth2/v1/token';
        $params = [
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
            'code' => $code,
            'grant_type' => 'authorization_code'
        ];

        $res = $this->https_post($api_url, $params)->toArray();

        return $res['data'] ?? throw new \Exception("获取授权信息失败", 1);
    }
}
