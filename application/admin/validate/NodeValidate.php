<?php 

namespace app\admin\validate;

use think\Validate;

class NodeValidate extends Validate
{
    protected $rule = [
      ['n_name', 'min:2', '昵称不能短于2个字符'],
    ];

}