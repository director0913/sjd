<?php
namespace Common\Model;
use Think\Model;
/**
 * 基础model
 */
class VoteModel extends Model{
    /**
     * 排行列表
     * @param    array    $data    数据 
     * @return   integer           新增数据的id 
     */
    public function rankList($parm){

        $data = M('vote')->join('LEFT JOIN sj_customer ON sj_customer.user_id = sj_vote.user_id')
                        ->where(array('sprout_id'=>$parm['sprout_id']))->order("$parm['order'] $parm['desc'] ")->select();

       
        return $data;
    }
}