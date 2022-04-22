<?php

namespace Waset\Douyin;

class Item extends Application
{
    /**
     * 获取评论列表
     *
     * @param string $access_token
     * @param string $openid    用户唯一标志
     * @param string $item_id   视频id
     * @param integer $cursor   分页游标
     * @param integer $count    每页的数量，最大不超过50，最小不低于1
     * @param string $sort_type 列表排序方式，不传默认按推荐序，可选值：time(时间逆序)、time_asc(时间顺序)
     * @return Item
     */
    public function comments(string $access_token, string  $openid, string $item_id,  int $cursor = 0, int $count = 20, string $sort_type = '')
    {
        $api_url = self::BaseUrl . '/item/comment/list/';

        $headers = [
            "access-token: ${access_token}",
            'Content-Type: application/json',
        ];
        $params = [
            'open_id'   =>  $openid,
            "cursor"    =>  $cursor,
            "count"     =>  $count,
            "item_id"   =>  $item_id,
            "sort_type" =>  $sort_type,
        ];

        $res = $this->https_get($api_url, $params, $headers)->toArray();

        return $res['data'];
    }

    /**
     * 获取评论回复列表
     *
     * @param string $access_token
     * @param string $openid    用户唯一标志
     * @param string $item_id   视频id
     * @param integer $cursor   分页游标
     * @param integer $count    每页的数量，最大不超过50，最小不低于1
     * @param string $sort_type 列表排序方式，不传默认按推荐序，可选值：time(时间逆序)、time_asc(时间顺序)
     * @return Item
     */
    public function replys(string $access_token, string  $openid, string $item_id,string $comment_id,  int $cursor = 0, int $count = 20, string $sort_type = '')
    {
        $api_url = self::BaseUrl . '/item/comment/reply/list/';

        $headers = [
            "access-token: ${access_token}",
            'Content-Type: application/json',
        ];
        $params = [
            'open_id'   =>  $openid,
            "cursor"    =>  $cursor,
            "count"     =>  $count,
            "item_id"   =>  $item_id,
            "comment_id"=>  $comment_id,
            "sort_type" =>  $sort_type,
        ];

        $res = $this->https_get($api_url, $params, $headers)->toArray();

        return $res['data'];
    }
}
