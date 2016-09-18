<?php
namespace app\admin\model;
use think\Model;

class Account extends Model
{
  protected $autoWriteTimestamp = true;
  /**
  * 根据条件查找对应个数的权限并排序
  * @AuthorHTL
  * @DateTime  2016-09-09T11:03:13+0800
  * @param     [type]                   $where  [description]
  * @param     [type]                   $offset [description]
  * @param     [type]                   $limit  [description]
  * @return    [type]                           [description]
  */
  public function getAccountByWhere($where, $offset, $limit)
  {
    return $this
    ->where($where)->limit($offset, $limit)->order('id asc')->select();
  }
  /**
  * [getAllAccountsInfo description]
  * @AuthorHTL
  * @DateTime  2016-09-12T10:45:15+0800
  * @param     [type]                   $where [description]
  * @return    [type]                          [description]
  */
  public function getAccountsInfoByWhere($where)
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
  public function getOneAccount($id)
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
  public function getAllAccounts($where)
  {
    return $this->where($where)->count();
  }
  public  function getWelcome($where){
    return $this->where($where)->value('welcome');
  }
  /**
  * 增加权限
  * @AuthorHTL
  * @DateTime  2016-09-12T10:21:17+0800
  * @param     [type]                   $param [description]
  * @return    [type]                          [description]
  */
  public function insertAccount($param)
  {
    try{        
      $result =  $this->save($param);
      if(false === $result){
        return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
      }
      else{
        return ['code' => 1, 'data' => '', 'msg' => '添加公众号成功'];
      }
    }
    catch( PDOException $e){
      return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
    }
  }


  public function delAccount($id)
  {
    try{
      $this->where('id', $id)->delete();
      return ['code' => 1, 'data' => '', 'msg' => '删除成功'];
    }
    catch( PDOException $e){
      return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
    }
  }
  public function editAccount($param){
    try{
      $result =  $this->save($param, ['id' => $param['id']]);
      if(false === $result){
        return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
      }else{

        return ['code' => 1, 'data' => '', 'msg' => '修改成功'];
      }
    }catch( PDOException $e){
      return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
    }
  }
  /**
   * [editAccount description]
   * @AuthorHTL
   * @DateTime  2016-09-18T12:39:50+0800
   * @param     [type]                   $param [description]
   * @return    [type]                          [description]
   */
  public function insertWelcome($param){
    try{
      $result =  $this->save($param, ['token' => $_SESSION['think']['username']]);
      if(false === $result){
        return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
      }else{

        return ['code' => 1, 'data' => '', 'msg' => '修改成功'];
      }
    }catch( PDOException $e){
      return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
    }
  }

}