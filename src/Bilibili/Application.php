<?php

namespace Waset\Bilibili;

use Waset\Kernel\BaseApi;

/**
 * bilibili应用入口
 *
 * @method function Oauth Oauth()
 */
class Application extends BaseApi
{
    /**
     * bilibili接口地址
     */
    const BaseUrl = "https://api.bilibili.com";

    /**
     * 应用唯一标识
     *
     * @var array
     */
    private array $config;

    /**
     * 应用唯一标识
     *
     * @var string
     */
    public string $client_id = '';

    /**
     * 应用唯一标识对应的密钥
     *
     * @var string
     */
    public string $client_secret = '';

    /**
     * 用户唯一标志
     *
     * @var string
     */
    public string $open_id = '';

    /**
     * 构造函数
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->client_id = $config['client_id'];
        $this->client_secret = $config['client_secret'];
        $this->open_id = $config['open_id'] ?? '';
    }

    /**
     * 静态魔术加载方法
     * @param $name
     * @param $arguments
     * @return class
     */
    public function __call($name, $arguments)
    {
        $name = ucfirst(strtolower($name));
        $class = "\\Waset\\Bilibili\\{$name}";

        if (!empty($class) && class_exists($class)) {
            return new $class(array_merge($this->config, $arguments));
        } else {
            throw new \Exception("{$name} is not exists");
        }
    }
}
