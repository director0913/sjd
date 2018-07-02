<?php
namespace Admin\Controller;
use Think\Controller;
class ActivityController extends CommonController{
	public function activity_list(){
        $customer = M('activity'); // 实例化User对象
        $count = $customer->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $customer->join("sj_customer on sj_customer.user_id=sj_activity.create_id")->order('ac_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        //rint_r($list);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
		$this->view();
	}

	/**
     * 参与者列表
     */
	public function actor_list(){
	    $id = $_GET['id'];
        $customer = M('actor'); // 实例化User对象
        $count = $customer->where(array('ac_id'=>$id))->join("sj_customer on sj_customer.user_id=sj_actor.cus_id")->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $customer->where(array('ac_id'=>$id))->join("sj_customer on sj_customer.user_id=sj_actor.cus_id")->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        //rint_r($list);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->view();
    }

    /**
     * 搜索
     */
    public function search(){
        $condition = $_POST['condition'];
        $if_end = $_POST['if_end'];
        $content = $_POST['dosearch'];
        $Search = M('activity');
        if($condition == 'phone'){
            $cbd['phone'] = array('like','%'.$content.'%');
        }else{
            $cbd['user_name'] = array('like','%'.$content.'%');
        }
        $cbd['if_send'] = $if_end;
        $count = $Search->join("sj_customer on sj_customer.user_id=sj_activity.create_id")->where($cbd)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Search->join("sj_customer on sj_customer.user_id=sj_activity.create_id")->where($cbd)->order('ac_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        //rint_r($list);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->view('Activity/activity_list');

    }
}
?>