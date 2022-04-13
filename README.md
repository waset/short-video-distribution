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

return [
    // 字节跳动(适用于抖音、头条、西瓜)
    "bytedance" =>  [
        "client_key"    =>  "",
        "client_secret" =>  "",
    ],
    // ...
];

```

# 鸣谢

- [ThinkPHP](https://github.com/top-think/framework)

# License

[MIT](./LICENSE)
