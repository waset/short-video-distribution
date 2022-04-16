<?php

// +----------------------------------------------------------------------
// | 平台配置
// +----------------------------------------------------------------------

return [
    // 抖音
    "douyin" => [
        'client_key'    => env('douyin.client_key', ''),
        'client_secret' => env('douyin.client_secret', ''),
        'scope'         => env('douyin.scope', [
            'trial.whitelist',
            'user_info',
            // ...
        ]),
    ],
    // 头条
    "toutiao" => [
        'client_key'    => env('toutiao.client_key', ''),
        'client_secret' => env('toutiao.client_secret', ''),
        'scope'         => env('toutiao.scope', [
            'user_info',
            // ...
        ])
    ],
    //  西瓜
    "xigua" => [
        'client_key'    => env('xigua.client_key', ''),
        'client_secret' => env('xigua.client_secret', ''),
        'scope'         => env('xigua.scope', [
            'user_info',
            // ...
        ])
    ],
];
