<?php

namespace Waset\Haokan;

class Video extends Application
{
    /**
     * 发布视频
     *
     * @param string $title
     * @param string $video_url
     * @param string $cover_images
     * @return Video
     */
    public function push(string $title, string $video_url, string $cover_images)
    {
        $api_url = self::BaseUrl . '/video/publish';

        $params = [
            'app_id' => $this->app_id,
            'app_token' => $this->app_token,
            "title" => $title,
            "video_url" => $video_url,
            "cover_images" => $cover_images,
        ];

        $res = $this->https_post($api_url, $params)->toArray();

        return $res;
    }

    /**
     * 获取视频状态
     *
     * @param array $article_id
     * @return Video
     */
    public function status(array $article_id)
    {
        $api_url = self::BaseUrl . '/query/status';

        $params = [
            'app_id' => $this->app_id,
            'app_token' => $this->app_token,
            "article_id" => implode(',', $article_id),
        ];

        $res = $this->https_post($api_url, $params)->toArray();

        return $res;
    }
}
