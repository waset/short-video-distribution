<?php

namespace Waset\Douyin;

class Video extends Application
{
    /**
     * 获取粉丝列表
     *
     * @param string $access_token
     * @param string $openid
     * @param integer $cursor
     * @param integer $count
     * @return Video
     */
    public function list(string $access_token, string  $openid, int $cursor = 0, int $count = 20)
    {
        $api_url = self::BaseUrl . '/video/list/';

        $headers = [
            "access-token: ${access_token}",
            'Content-Type: application/json',
        ];
        $params = [
            'open_id' => $openid,
            "cursor" => $cursor,
            "count" => $count
        ];

        return $this->https_get($api_url, $params, $headers);
    }
}
