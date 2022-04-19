<?php

namespace Waset\Kuaishou;

class Oauth extends Application
{
    /**
     * 快手授权码(code)
     *
     * 该接口只适用于快手获取动态二维码
     *
     * 该URL不是用来请求的, 需要展示给用户用于扫码，在快手APP支持端内唤醒的版本内打开的话会弹出客户端原生授权页面。
     * @see https://open.kuaishou.com/platform/openApi?menu=12
     *
     * @param array $scope 应用授权作用域,多个授权作用域以英文逗号（,）分隔
     * @param string $redirect_uri 授权成功后的回调地址，必须以http/https开头。
     * @param string $state 用于保持请求和回调的状态
     * @param string $type 返回值类型,可选img和path,选择img会返回二维码图片,选择path会返回二维码内容的地址
     * @param boolean $debug 是否开启调试模式,开启后,在用户授权失败时,会在快手APP内显示调试信息,可以根据调试信息来调试.默认false
     * @return BaseApi
     */
    public function code(array $scope, string $redirect_uri, string $state = "", string $type = "path", bool $debug = false)
    {
        $api_url = self::BaseUrl . '/oauth2/qr_code';
        $params = [
            // 应用唯一标识
            'app_id' => $this->app_id,
            // 写死为'code'即可
            'response_type' => 'code',
            'scope' => implode(',', $scope),
            'redirect_uri' => $redirect_uri,
            'type' => $type,
            'debug' => $debug
        ];

        if ($state) {
            $params['state'] = $state;
        }

        return $this->https_url($api_url, $params);
    }

    /**
     * 获取access_token
     *
     * 该接口用于获取用户授权凭证access_token
     *
     * 该接口适用于快手授权
     * @see https://open.kuaishou.com/platform/openApi?menu=13
     *
     * @param string $code
     * @return BaseApi
     */
    public function token(string $code)
    {
        $api_url = self::BaseUrl . '/oauth2/access_token';
        $params = [
            'app_id' => $this->app_id,
            'app_secret' => $this->app_secret,
            'code' => $code,
            'grant_type' => 'authorization_code'
        ];

        $res = $this->https_get($api_url, $params)->toArray();

        return $res;
    }

    /**
     * 刷新refresh_token
     *
     * 该接口用于刷新refresh_token的有效期
     *
     * 该接口适用于快手授权
     *
     * @see https://open.snssdk.com/platform/doc/6848806519174154248
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

        return $res;
    }

    /**
     * 刷新access_token
     *
     * 该接口用于刷新access_token的有效期
     *
     * 该接口适用于快手授权
     *
     * @see https://open.snssdk.com/platform/doc/6848806519174154248
     * @param string $refresh_token
     *
     * @return BaseApi
     */
    public function refresh_token(string $refresh_token)
    {
        $api_url = self::BaseUrl . '/oauth2/refresh_token';
        $params = [
            'app_id' => $this->app_id,
            'app_secret' => $this->app_secret,
            'refresh_token' => $refresh_token,
            'grant_type' => "refresh_token"
        ];

        $res = $this->https_post($api_url, $params)->toArray();

        return $res;
    }
}
