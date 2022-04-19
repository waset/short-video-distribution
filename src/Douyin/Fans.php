<?php

namespace Waset\Douyin;

class Fans extends Application
{
    /**
     * 获取粉丝列表
     *
     * @param string $access_token
     * @param string $openid
     * @param integer $cursor
     * @param integer $count
     * @return Fans
     */
    public function list(string $access_token, string  $openid, int $cursor = 0, int $count = 20)
    {
        $api_url = self::BaseUrl . '/fans/list/';

        $headers = [
            "access-token: ${access_token}",
            'Content-Type: application/json',
        ];
        $params = [
            'open_id' => $openid,
            "cursor" => $cursor,
            "count" => $count
        ];

        $res = $this->https_get($api_url, $params, $headers)->toArray();

        return $res['data'];
    }
}
