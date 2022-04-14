<?php

namespace Waset\Xigua;

use Waset\Kernel\BaseApi;

/**
 * 西瓜应用入口
 *
 * @method function Oauth Oauth()
 */
class Application extends BaseApi
{
    /**
     * 西瓜接口地址
     */
    const BaseUrl = "https://open-api.ixigua.com";

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
    public string $client_key = '';

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
        $this->client_key = $config['client_key'];
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
        $class = "\\Waset\\Xigua\\{$name}";

        if (!empty($class) && class_exists($class)) {
            return new $class(array_merge($this->config, $arguments));
        } else {
            throw new \Exception("{$name} is not exists");
        }
    }
}
