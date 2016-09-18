<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id$
return [

    //模板参数替换
    'view_replace_str'       => array(
        '__CSS__'    => '/1/public/static/admin/css',
        '__JS__'     => '/1/public/static/admin/js',
        '__IMG__' => '/1/public/static/admin/images',
    ),
    'token_path'=>'./extend/org/access_token.txt',
    //管理员状态
    'user_status' => [
        '1' => '正常',
        '2' => '禁止登录'
    ],
    //角色状态
    'role_status' => [
        '1' => '启用',
        '2' => '禁用'
    ],
    'WECHAT_TOKEN'=> 'weixin',
    "WECHAT_APPID"=>'wxef8781c3bcf7f85b',
    "WECHAT_APPSECRET"=>'32e9db5df79f733d8c1e6aabd60926bc'
];
