<?php
namespace app\admin\model;

use think\Model;

class Node extends Model
{
  /**
   * 根据ID获取权限
   * @AuthorHTL
   * @DateTime  2016-09-12T13:28:50+0800
   * @param     [type]                   $id [description]
   * @return    [type]                       [description]
   */
  public function getNodeInfo($id)
  {
    $result = $this->field('id,n_name,typeid')->select();
    $str = "";

    $role = new UserType();
    $rule = $role->getRuleById($id);

    if(!empty($rule)){
      $rule = explode(',', $rule);
    }
    foreach($result as $key=>$vo){
      $str .= '{ "id": "' . $vo['id'] . '", "pId":"' . $vo['typeid'] . '", "name":"' . $vo['n_name'].'"';
      if(!empty($rule) && in_array($vo['id'], $rule)){
      $str .= ' ,"checked":1';
      }
      $str .= '},';
    }

    return "[" . substr($str, 0, -1) . "]";
  }

  /**
   * 根据节点数据获取对应的菜单
   * @AuthorHTL
   * @DateTime  2016-09-12T13:30:06+0800
   * @param     string                   $nodeStr [description]
   * @return    [type]                            [description]
   */
  public function getMenu($nodeStr = '')
  {
    //超级管理员没有节点数组
    $where = empty($nodeStr) ? 'is_menu = 2' : 'is_menu = 2 and id in('.$nodeStr.')';

    $result = db('node')->field('id,n_name,typeid,control_name,action_name,style')
    ->where($where)->select();
    $menu = prepareMenu($result);

    return $menu;
  }
  /**
  * 根据条件查找对应个数的权限并排序
  * @AuthorHTL
  * @DateTime  2016-09-09T11:03:13+0800
  * @param     [type]                   $where  [description]
  * @param     [type]                   $offset [description]
  * @param     [type]                   $limit  [description]
  * @return    [type]                           [description]
  */
  public function getNodeByWhere($where, $offset, $limit)
  {
    return $this
    ->where($where)->limit($offset, $limit)->order('id asc')->select();
  }
  /**
  * [getAllNodesInfo description]
  * @AuthorHTL
  * @DateTime  2016-09-12T10:45:15+0800
  * @param     [type]                   $where [description]
  * @return    [type]                          [description]
  */
  public function getNodesInfoByWhere($where)
  {
    return $this
    ->where($where)->select();
  }
  /**
   * 通过ID获得权限信息
   * @AuthorHTL
   * @DateTime  2016-09-12T13:36:33+0800
   * @param     [type]                   $id [description]
   * @return    [type]                       [description]
   */
  public function getOneNode($id)
  {
    return $this->where('id', $id)->find();
  }
  /**
  * 获得所有权限个数
  * @AuthorHTL
  * @DateTime  2016-09-09T11:02:08+0800
  * @param     [type]                   $where [description]
  * @return    [type]                          [description]
  */
  public function getAllNodes($where)
  {
    return $this->where($where)->count();
  }
  /**
  * 增加权限
  * @AuthorHTL
  * @DateTime  2016-09-12T10:21:17+0800
  * @param     [type]                   $param [description]
  * @return    [type]                          [description]
  */
  public function insertNode($param)
  {
    try{

      foreach ($param as $key => $value) {
        $param[$key]=strtolower($value);
      }
      $result =  $this->validate('NodeValidate')->save($param);
      if(false === $result){
        return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
      }
      else{
        return ['code' => 1, 'data' => '', 'msg' => '添加权限成功'];
      }
    }
    catch( PDOException $e){
      return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
    }
  }


  public function delNode($id)
  {
    try{
      $this->where('id', $id)->delete();
      return ['code' => 1, 'data' => '', 'msg' => '删除成功'];
    }
    catch( PDOException $e){
      return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
    }
  }
  public function editNode($param){
    try{
      foreach ($param as $key => $value) {
        $param[$key]=strtolower($value);
      }
      $result =  $this->save(strtolower($param), ['id' => $param['id']]);
      if(false === $result){
        return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
      }else{

        return ['code' => 1, 'data' => '', 'msg' => '编辑权限成功'];
      }
    }catch( PDOException $e){
      return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
    }
  }

}