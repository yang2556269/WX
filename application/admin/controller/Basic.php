<?php 
namespace app\admin\controller;
use app\admin\model\Account;
/**
*公众号基础设置
*/
class Basic extends Base	
{
	/**
	 * 基础设置首页
	 * @AuthorHTL
	 * @DateTime  2016-09-14T09:39:09+0800
	 * @return    [type]                   [description]
	 */
	public function index()
	{
		return $this->fetch();
	}
	/**
	 * [huifu description]
	 * @AuthorHTL
	 * @DateTime  2016-09-14T10:44:10+0800
	 * @return    [type]                   [description]
	 */
	public function huifu()
	{
		$Account = new Account();
    if(request()->isPost()){
      $param = input('param.');
      $param = parseParams($param['data']);
      $flag = $Account->insertWelcome($param);
      $token=$_SESSION['think']['username'];
      $welcome=$Account->getWelcome(['token'=>$token]);
      session('welcome',$welcome);
      return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
    return $this->fetch();
  }
	
	/**
	 * [keyword description]
	 * @AuthorHTL
	 * @DateTime  2016-09-14T10:44:26+0800
	 * @return    [type]                   [description]
	 */
	public function tuwen()
	{
		
	}
	/**
	 * [keyword description]
	 * @AuthorHTL
	 * @DateTime  2016-09-14T10:44:26+0800
	 * @return    [type]                   [description]
	 */
	public function keyword()
	{
		return $this->fetch();
	}
	/**
	 * [keyword description]
	 * @AuthorHTL
	 * @DateTime  2016-09-14T10:44:26+0800
	 * @return    [type]                   [description]
	 */
	public function muban()
	{
		
	}
}