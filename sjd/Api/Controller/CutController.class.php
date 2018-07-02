<?php 
namespace Api\Controller;
use Think\Controller;
class CutController extends Controller{
    //获取排序列表
    public function getRankList(){
        if(!empty($_GET)){
            $parm = ['order'=>I('get.order'),'sort'=>I('get.sort'),'fen_id'=>I('get.fen_id'),'page'=>I('get.page,1')];
           // var_dump(D('Home/Cut'));die;
            $aa = new \Home\Model\CutModel;
            $data = $aa->rankList($parm);
            $this->ajaxReturn($data);
        }
    }
    //投票
    public function toVote(){
        if(!empty($_GET)){
            $sign_id = I('get.sign_id') ;
            $sprout_id = I('get.sprout_id') ;
            $parm['sign_id'] = $sign_id;
            $parm['sprout_id'] = $sprout_id;
            //$model = new Home\Model\SproutModel;;
            $res = D('Sprout')->toVote($parm);
            $this->ajaxReturn($res);            
        }
    }
}

?>