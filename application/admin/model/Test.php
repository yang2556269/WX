<?php 
namespace app\admin\model;
use think\Model;
use org\wechat\wechat;

class Test {

	  public function __construct($token) {
	  	parent::__construct();
	  	echo $token;
    }
}