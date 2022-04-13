<?php

namespace Waset;

use think\facade\Config;

class Distribute
{
    /**
     * 实例化应用
     *
     * @param string $app
     * @param array $config
     *
     * @method class \Waset\Douyin\Application
     */
    public static function app(string $app = '', array $config = [])
    {
        $name = ucfirst(strtolower($app));
        $class = "\\Waset\\{$name}\\Application";

        $config = array_merge(Config::get("distribute.{$app}", []), $config);
        if (empty($config)) throw new \Exception("{$app} config is empty");

        if (!empty($class) && class_exists($class)) {
            return new $class($config);
        } else {
            throw new \Exception("{$app} is not exists");
        }
    }
}
