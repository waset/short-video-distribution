<?php

namespace Waset\Douyin;

class Oauth extends Application
{
    /**
     * 获取access_token
     *
     * 该接口用于获取用户授权第三方接口调用的凭证access_token -
     *
     * 该接口适用于抖音/头条授权
     *
     * @see https://open.douyin.com/platform/doc/6848806493387606024
     *
     * @param string $code  授权码
     * @param string $model 请求类型
     * @param string $model.douyin 抖音
     * @param string $model.toutiao 头条
     *
     * @return BaseApi
     */
    public function token(string $code)
    {
        $api_url = self::BaseUrl . '/oauth/access_token/';
        $params = [
            'client_key' => $this->client_key,
            'client_secret' => $this->client_secret,
            'code' => $code,
            'grant_type' => 'authorization_code'
        ];

        $res = $this->https_post($api_url, $params)->toArray();

        return $res['data'];
    }

    /**
     * 刷新refresh_token
     *
     * 该接口用于刷新refresh_token的有效期
     *
     * 该接口适用于抖音授权
     *
     * @see https://open.douyin.com/platform/doc/6848806519174154248
     * @param string $refresh_token
     *
     * @return BaseApi
     */
    public function renew_refresh_token(string $refresh_token)
    {
        $api_url = self::BaseUrl . '/platform/oauth/renew_refresh_token/';
        $params = [
            'client_key' => $this->client_key,
            'client_secret' => $this->client_secret,
            'refresh_token' => $refresh_token
        ];

        $res = $this->https_post($api_url, $params)->toArray();

        return $res['data'];
    }

    /**
     * 刷新access_token
     *
     * 该接口用于刷新access_token的有效期
     *
     * 该接口适用于抖音/头条授权
     *
     * @see https://open.douyin.com/platform/doc/6848806519174154248
     * @param string $refresh_token
     *
     * @return BaseApi
     */
    public function refresh_token(string $refresh_token)
    {
        $api_url = self::BaseUrl . '/platform/oauth/refresh_token/';
        $params = [
            'client_key' => $this->client_key,
            'client_secret' => $this->client_secret,
            'refresh_token' => $refresh_token
        ];

        $res = $this->https_post($api_url, $params)->toArray();

        return $res['data'];
    }

    /**
     * 生成client_token
     *
     * 该接口用于获取接口调用的凭证client_access_token，主要用于调用不需要用户授权就可以调用的接口
     *
     * 该接口适用于抖音/头条授权
     *
     * @see https://open.douyin.com/platform/doc/6848806519174154248
     * @param string $refresh_token
     *
     * @return BaseApi
     */
    public function client_token()
    {
        $api_url = self::BaseUrl . '/platform/oauth/client_token/';
        $params = [
            'client_key' => $this->client_key,
            'client_secret' => $this->client_secret,
            'grant_type' => 'client_credential'
        ];

        $res = $this->https_post($api_url, $params)->toArray();

        return $res['data'];
    }

    /**
     * 抖音获取授权码(code)
     *
     * 该接口只适用于抖音获取授权临时票据（code）
     *
     * 该URL不是用来请求的, 需要展示给用户用于扫码，在抖音APP支持端内唤醒的版本内打开的话会弹出客户端原生授权页面。
     *
     * @see https://open.douyin.com/platform/doc/6848806519174154248
     *
     * @param array $scope 应用授权作用域
     * @param string $redirect_uri 授权成功后的回调地址，必须以http/https开头。域名必须对应申请应用时填写的域名，
     * @param string $state 用于保持请求和回调的状态
     *
     * @return BaseApi
     */
    public function code(array $scope, string $redirect_uri, string $state = "")
    {
        $api_url = self::BaseUrl . '/platform/oauth/connect/';
        $params = [
            'client_key' => $this->client_key,
            'client_secret' => $this->client_secret,
            'scope' => implode(',', $scope),
            'redirect_uri' => $redirect_uri,
        ];
        if ($state) {
            $params['state'] = $state;
        }

        return $this->https_url($api_url, $params);
    }
}
