📦 国内最全的短视频平台 SDK

# 介绍

### 环境需求

- PHP >= 8.0.0
- [Composer](https://getcomposer.org/) >= 2.0

### 适用平台

- [抖音](https://open.douyin.com/platform/doc)
- [头条视频](https://open.douyin.com/platform/doc?doc=docs/openapi/video-management/toutiao/create-video/publish-video)
- [西瓜视频](https://open.douyin.com/platform/doc?doc=docs/openapi/video-management/xigua/create-video/publish-video)
- TODO...

### 适用框架

- [ThinkPHP](https://www.kancloud.cn/manual/thinkphp6_0) >= 6.0
- TODO...

# 开始

#### 安装

```bash
composer require waset/short-video-distribution
```

#### 配置

```php
// config/distribute.php
<?php
// 因各平台使用 scope 不一致，所以还是单独定义吧，不会太麻烦，毕竟只定这一次
return [
    // 抖音
    "douyin" => [
        'client_key' => '',
        'client_secret' => '',
        'scope' => [
            'trial.whitelist',,
            'user_info',
            // ...
        ]
    ],
    // 头条
    "toutiao" => [
        'client_key' => '',
        'client_secret' => '',
        'scope' => [
            'user_info',
            // ...
        ]
    ],
    //  西瓜
    "xigua" => [
        'client_key' => '',
        'client_secret' => '',
        'scope' => [
            'user_info',
            // ...
        ]
    ],
    // ...
];


```

#### 使用

```php
use Waset\Distribute;

// 获取绑定链接（结果是 url，如有需要自行生成二维码）
// TODO:本插件提供二维码生成方法？
$code =  Distribute::app($model)->oauth()->code($scope, $redirect_uri, $state);

// 获取token
$data =  Distribute::app($model)->oauth()->token($code);
// $data = $data->toArray();

// 获取用户信息
$user_info =  Distribute::app($model)->user()->info($data['access_token'], $data['open_id']);
// $user_info = $user_info->toArray();

```

# 鸣谢

- [ThinkPHP](https://github.com/top-think/framework)

# License

[MIT](./LICENSE)
