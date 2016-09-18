<?php 
namespace app\admin\controller;

use app\admin\model\Node;
class Node extends Base{
	/**
	 * 权限列表
	 * @AuthorHTL
	 * @DateTime  2016-09-09T10:52:54+0800
	 * @return    [type]                   [description]
	 */
	public function index()
	{
		if(request()->isAjax()){

	  	$param = input('param.');

	    $limit = $param['pageSize'];
	    $offset = ($param['pageNumber'] - 1) * $limit;

	    $where = [];
	    $node = new Node();
	    $selectResult = $node->getNodeByWhere($where, $offset, $limit);


	    foreach($selectResult as $key=>$vo){

        $operate = [
            '编辑' => url('nodeEdit', ['id' => $vo['id']]),
            '删除' => "javascript:nodeDel('".$vo['id']."')"
        ];

        $selectResult[$key]['operate'] = showOperate($operate);
      }

	    $return['total'] = $node->getAllNodes($where);  //总数据
	    $return['rows'] = $selectResult;

	    return json($return);
		}

		return $this->fetch();
	}

	/**
	 * 增加权限
	 * @AuthorHTL
	 * @DateTime  2016-09-12T09:58:47+0800
	 * @return    [type]                   [description]
	 */
	public function nodeAdd()
	{
		$node = new Node();
		if(request()->isPost()){

      $param = input('param.');
      $param = parseParams($param['data']);

      $flag = $node->insertNode($param);
      return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
	  $is_menu=['1','2'];
	  $this->assign([
	  		'is_menu'=>$is_menu,
	      'nodeinfo' => $node->getNodesInfoByWhere('is_menu=2'),
	  ]);
		return $this->fetch();
	}

	/**
	 * 删除权限
	 * @AuthorHTL
	 * @DateTime  2016-09-12T11:45:49+0800
	 */
	public function nodeDel()
  {
    $id = input('param.id');

    $role = new Node();
    $flag = $role->delNode($id);
    return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
  }

  /**
   * 编辑权限
   * @AuthorHTL
   * @DateTime  2016-09-12T13:25:06+0800
   * @return    [type]                   [description]
   */
  public function nodeEdit(){
    $node = new Node();
    if(request()->isPost()){
      $param = input('param.');
      $param = parseParams($param['data']);
      $flag = $node->editNode($param);
      return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
    $id = input('param.id');
    $is_menu=['1','2'];
    $this->assign([
    	'is_menu'=>$is_menu,
	    'nodeinfo' => $node->getNodesInfoByWhere('is_menu=2'),
      'data' => $node->getOneNode($id)
    ]);
    return $this->fetch();
  }

	public function test()
	{
		
	}
}