ð¦ å½åæå¨çç­è§é¢å¹³å° SDK

# ä»ç»

### ç¯å¢éæ±

- PHP >= 8.0.0
- [Composer](https://getcomposer.org/) >= 2.0

### éç¨å¹³å°

- [æé³](https://open.douyin.com/platform/doc)
- [å¤´æ¡è§é¢](https://open.douyin.com/platform/doc?doc=docs/openapi/video-management/toutiao/create-video/publish-video)
- [è¥¿çè§é¢](https://open.douyin.com/platform/doc?doc=docs/openapi/video-management/xigua/create-video/publish-video)
- TODO...

### éç¨æ¡æ¶

- [ThinkPHP](https://www.kancloud.cn/manual/thinkphp6_0) >= 6.0
- TODO...

# å¼å§

#### å®è£

```bash
composer require waset/short-video-distribution
```

#### éç½®

```php
// config/distribute.php (ThinkPHP6 ä¼èªå¨çæ)
<?php
// å åå¹³å°ä½¿ç¨ scope ä¸ä¸è´ï¼æä»¥è¿æ¯åç¬å®ä¹å§ï¼ä¸ä¼å¤ªéº»ç¦ï¼æ¯ç«åªå®è¿ä¸æ¬¡
return [
    // æé³
    "douyin" => [
        'client_key' => '',
        'client_secret' => '',
        'scope' => [
            'trial.whitelist',,
            'user_info',
            // ...
        ]
    ],
    // ...

    // "å¹³å°å" => [
    //     'å¯é¥' => '',
    //     'å¯ç ' => '',
    //     'æé' => [
    //         ...
    //     ]
    // ],
];
```

#### å¹³å° => `$model`

```
æé³ => 'douyin'
ä»æ¥å¤´æ¡ => 'toutiao'
è¥¿çè§é¢ => 'xigua'
```

#### ä½¿ç¨

```php
use Waset\Distribute;

// è·åç»å®é¾æ¥ï¼ç»ææ¯ urlï¼å¦æéè¦èªè¡çæäºç»´ç ï¼
// TODO:æ¬æä»¶æä¾äºç»´ç çææ¹æ³ï¼
$code =  Distribute::app($model)->oauth()->code($scope, $redirect_uri, $state);

// è·åtoken
$data =  Distribute::app($model)->oauth()->token($code);
// $data = $data->toArray();

// è·åç¨æ·ä¿¡æ¯
$user_info =  Distribute::app($model)->user()->info($data['access_token'], $data['open_id']);
// $user_info = $user_info->toArray();
```

# é¸£è°¢

- [ThinkPHP](https://github.com/top-think/framework)

# License

[MIT](./LICENSE)
