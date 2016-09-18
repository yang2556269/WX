<?php 
namespace app\admin\controller;
use app\admin\model\Account;
class Account extends Base{


	/**
	 * [index description]
	 * @AuthorHTL
	 * @DateTime  2016-09-13T15:59:34+0800
	 * @return    [type]                   [description]
	 */
	public function index()
	{
		if(request()->isAjax()){

  		$param = input('param.');

    	$limit = $param['pageSize'];
    	$offset = ($param['pageNumber'] - 1) * $limit;

    	$where = [];
    	$Account = new Account();
    	$selectResult = $Account->getAccountByWhere($where, $offset, $limit);

    	foreach($selectResult as $key=>$vo){

      	$operate = [
          '编辑' => url('editAccount', ['id' => $vo['id']]),
          '删除' => "javascript:delAccount('".$vo['id']."')",
          '功能管理'=>url('functions')

      	];

      	$selectResult[$key]['operate'] = showOperate($operate);
    	}

   		$return['total'] = $Account->getAllAccounts($where);  //总数据
    	$return['rows'] = $selectResult;

    	return json($return);
		}
		return $this->fetch();
	}
	/**
	 * [addAccount description]
	 * @AuthorHTL
	 * @DateTime  2016-09-13T15:41:46+0800
	 */
	public function addAccount(){
		if(request()->isPost()){

      $param = input('param.');
      $param = parseParams($param['data']);
      $param['token']=$_SESSION['think']['username'];
      $account=new Account();
      $flag = $account->insertAccount($param);

      return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
    return $this->fetch();
	}
	/**
	 * [delAccount description]
	 * @AuthorHTL
	 * @DateTime  2016-09-13T16:10:48+0800
	 * @return    [type]                   [description]
	 */
	public function delAccount()
  {
    $id = input('param.id');

    $role = new Account();
    $flag = $role->delAccount($id);
    return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
  }
  /**
   * [editAccount description]
   * @AuthorHTL
   * @DateTime  2016-09-13T16:15:46+0800
   * @return    [type]                   [description]
   */
  public function editAccount(){
    $Account = new Account();
    if(request()->isPost()){
      $param = input('param.');
      $param = parseParams($param['data']);
      $flag = $Account->editAccount($param);
      return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
    $id = input('param.id');
    $this->assign([
      'data' => $Account->getOneAccount($id)
    ]);
    return $this->fetch();
  }
  /**
   * 公众号功能管理
   * @AuthorHTL
   * @DateTime  2016-09-14T09:09:52+0800
   * @return    [type]                   [description]
   */
  public function functions()
  {
    return $this->fetch();
  }
}