<?php

namespace Waset\Kuaishou;

class Video extends Application
{
    /**
     * 开始上传视频
     *
     * @param string $access_token
     * @return Video
     */
    public function start_upload(string $access_token)
    {
        $api_url = self::BaseUrl . '/openapi/photo/start_upload';

        $body = [
            'access_token' => $access_token,
            'app_id' => $this->app_id,
        ];
        $res = $this->https_post($api_url, $body)->toArray();

        return $res;
    }

    /**
     * 上传视频
     *
     * @param string $endpoint
     * @param string $upload_token
     * @param string $file
     * @return Video
     */
    public function upload(string $endpoint, string $upload_token, string $file)
    {
        $api_url = "http://${endpoint}/api/upload?upload_token=${upload_token}";


        return $this->https_byte($api_url, $file);
    }

    /**
     * 上传视频 - Multipart Form Data上传
     *
     * @param string $endpoint 上传网关的域名
     * @param string $upload_token 上传令牌
     * @param string $file 上传文件
     */
    public function upload_multipart(string $endpoint, string  $upload_token, string $file)
    {
        $api_url = "http://${endpoint}/api/upload/multipart?upload_token=${upload_token}";

        $body = [
            'file' => new \CURLFile($file),
        ];
        $header = [
            'Content-Type' => 'multipart/form-data',
        ];

        return $this->https_post($api_url, $body, $header)->toArray();
    }

    /**
     * 分片上传 - 上传分片
     *
     * @param string $endpoint 上传网关的域名
     * @param string $upload_token 上传令牌
     * @param string $fragment_id 分片id 从0开始
     */
    public function video_upload_fragment(string $endpoint, string $upload_token, string $fragment_id, mixed $file)
    {
        $api_url = "http://${endpoint}/api/upload/fragment";
        $api_url = $this->https_url($api_url, [
            'fragment_id' => $fragment_id,
            'upload_token' => $upload_token
        ]);

        return $this->https_byte($api_url, $file);
    }

    /**
     * 分片上传 - 断点续传
     *
     * @param string $endpoint 上传网关的域名
     * @param string $upload_token 上传令牌
     * @param string $fragment_id 分片id 从0开始
     */
    public function video_upload_resume(string $endpoint, string $upload_token)
    {
        $api_url = "http://${endpoint}/api/upload/resume";
        $api_url = $this->https_url($api_url, [
            'upload_token' => $upload_token
        ]);

        return $this->https_get($api_url);
    }

    /**
     * 分片上传 - 完成分片上传
     *
     * @param string $endpoint 上传网关的域名
     * @param string $upload_token 上传令牌
     * @param string $fragment_id 分片id 从0开始
     */
    public function video_upload_complete(string $endpoint, string $upload_token, string $fragment_count)
    {
        $api_url = "http://${endpoint}/api/upload/complete";
        $api_url = $this->https_url($api_url, [
            'upload_token' => $upload_token,
            'fragment_count' => $fragment_count,
        ]);

        return $this->https_post($api_url);
    }


    /**
     * 发布视频
     *
     * @param string $access_token
     * @param string $upload_token
     * @param string $title
     * @param string $cover_images
     * @return Video
     */
    public function publish(string $access_token, string $upload_token, string  $title, string $cover_images)
    {
        $api_url = self::BaseUrl . '/openapi/photo/publish';
        $params = [
            'access_token' => $access_token,
            'app_id' => $this->app_id,
            'upload_token' => $upload_token
        ];
        $url = $this->https_url($api_url, $params);
        $body = [
            'caption' => $title,
            'cover' => new \CURLFile($cover_images),
        ];
        $res = $this->https_post($url, $body)->toArray();

        return $res;
    }

    /**
     * 删除视频
     *
     * @param string $access_token
     * @param string $photo_id
     */
    public function video_delete($access_token, $photo_id)
    {
        $api_url = self::BaseUrl . '/openapi/photo/delete';

        $params = [
            'access_token' => $access_token,
            'photo_id' => $photo_id
        ];
        return $this->https_post($api_url, $params);
    }
}
