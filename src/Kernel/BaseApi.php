<?php

namespace Waset\Kernel;

/**
 * 内核
 * Class BaseApi
 */
class BaseApi
{
    /**
     * 句柄
     *
     * @var mixed
     */
    public $handle = null;

    /**
     * 结果
     *
     * @var mixed
     */
    public mixed $response = null;

    /**
     * 转数组
     *
     * @return mixed
     */
    public function toArray()
    {
        return $this->response ? json_decode($this->response, true) : true;
    }

    /**
     * 获取访问地址（拼接参数）
     *
     * @param string $url
     * @param array $params
     * @return string
     */
    public function https_url(string $url, array $params = [])
    {
        if ($params) {
            $url = $url . '?' . http_build_query($params);
        }

        return $url;
    }

    /**
     * GET 请求
     *
     * @param string $url
     * @param array $params
     * @return BaseApi
     */
    public function https_get(string $url, array $params = [], array $header = [])
    {
        if ($params) {
            $url = $url . '?' . http_build_query($params);
        }
        $this->response = $this->https_request($url, null, $header);

        return $this;
    }

    /**
     * POST 请求
     *
     * @param string $url
     * @param array $params
     * @return BaseApi
     */
    public function https_post(string $url, array $params = [], array $header = [])
    {
        if (!$header || empty($header)) {
            $header = [
                'Accept:application/json',
                'Content-Type: multipart/form-data',
            ];
        }
        $this->response = $this->https_request($url, $params, $header);

        return $this;
    }

    /**
     * HTTP 请求
     *
     * @param string $url
     * @param mixed $data
     * @param mixed $headers
     * @return string|bool
     */
    public function https_request(string $url, mixed $data = null, mixed $headers = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        if (!empty($headers)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }
        if (defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')) {
            curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        }
        $output = curl_exec($curl);
        curl_close($curl);
        return ($output);
    }
}
