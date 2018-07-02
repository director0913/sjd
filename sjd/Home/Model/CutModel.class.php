<?php
namespace Common\Model;
use Think\Model;
/**
 * 砍价模型
 */
class CutModel extends Model{
    /**
     * 排行列表
     * @param    array    $data    数据 
     * @return   integer           新增数据的id 
     */
    public function rankList($parm){
        $count      = M('Cut') ->where(array('fen_id'=>$parm['fen_id']))->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->firstRow = $parm['page']==1?1:($parm['page']-1)*2;
        $data = M('Cut')->join('LEFT JOIN sj_customer ON sj_customer.user_id = sj_cut.create_id')
                        ->where(array('fen_id'=>$parm['fen_id']))
                        ->order($parm['order']." ".$parm['sort'])
                        ->limit($Page->firstRow.','.$Page->listRows)
                        ->select();
                        // echo M('Cut')->getLastSql();die;
        return $data;
    }
}