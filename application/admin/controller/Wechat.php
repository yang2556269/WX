<?php 
namespace app\admin\controller;
use app\admin\controller\Wx;
use app\admin\controller\AccessToken;
class Wechat {

  /**
   * [myWecaht description]
   * @AuthorHTL
   * @DateTime  2016-09-13T14:25:20+0800
   * @return    [type]                   [description]
   */
  public function myAccount()
  {
    return $this->fetch();
  }

	public function index()
  {      
  	$token=config('WECHAT_TOKEN');
		$weObj = new Wx($token);
		//$weObj->valid();
		echo $weObj->run();
  }
  public static function getAccToken(){
  	$access_token= AccessToken::getAccessToken();
    echo $access_token;
  }
  
  public function test(){
    return $this->fetch();
  }

}