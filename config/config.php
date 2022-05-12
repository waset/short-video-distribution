<?php

// +----------------------------------------------------------------------
// | 抖音配置
// +----------------------------------------------------------------------

return [
    // 抖音
    "douyin" => [
        'client_key'    => env('douyin.client_key', ''),
        'client_secret' => env('douyin.client_secret', ''),
        'scope'         => env('douyin.scope', [
            'trial.whitelist',
            'data.external.item',
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
    // 快手
    "kuaishou" => [
        'app_id'        => env('kuaishou.app_id', ''),
        'app_secret'    => env('kuaishou.app_secret', ''),
        "scope"         => env('kuaishou.scope', [
            "user_base",
            // ...
        ])
    ],
    // 哔哩哔哩
    "bilibili" => [
        'client_id'    => env('bilibili.client_id', ''),
        'client_secret' => env('bilibili.client_secret', ''),
        "scope"         => env('bilibili.scope', [
            "USER_INFO",
            // ...
        ])
    ]
];
