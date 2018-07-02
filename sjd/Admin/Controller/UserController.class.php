<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController{
	/**
	 * 参与的砍价
	 *   1.后台查看该用户参与的砍价（帮人砍价）
	 *   2.获取用户id（user_id）
	 *   3.根据user_id查询参与列表
	 *   4.渲染列表
	 */
	public function join(){
        $id = $_GET['user_id'];
        $customer = M('actor'); // 实例化User对象
        $count = $customer->where(array('cus_id'=>$id))->join("sj_order on sj_order.or_id=sj_actor.or_id")->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
       $list = $customer->where(array('cus_id'=>$id))->join("sj_order on sj_order.or_id=sj_actor.or_id")->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('order',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
		$this->view('User/join');
	}
	/**
	 * 创建的砍价活动
	 *   1.管理员查看用户创建的活动列表
	 *   2.get获取用户的id（user_id）
	 *   3.根据user_id查询所创建的活动列表
	 *   4.渲染列表
	 */
	public function activity(){
        $id = $_GET['user_id'];
        $customer = M('activity'); // 实例化User对象
        $count = $customer->where(array('create_id'=>$id))->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $customer->where(array('create_id'=>$id))->order('ac_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();

      for($i=0;$i<$count;$i++){
          $rel = M('actor')->where(array('ac_id'=>$list[$i]['ac_id']))->count();
          $rels = M('order')->where(array('ac_id'=>$list[$i]['ac_id']))->count();
          $list[$i]['nums'] =$rel+$rels;
      }
        $this->assign('activity',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
		$this->view('User/activity');
	}
	/**
	 * 发起砍价的活动（我需要别人帮我砍价）
	 *   1.管理员查看用户发起砍价活动列表
	 *   2.get获取该用户的user_id
	 *   3.根据user_id查询我的砍价订单列表
	 *   4.渲染列表
	 */
	public function order(){
        $id = $_GET['user_id'];
        $customer = M('order'); // 实例化User对象
        $count = $customer->where(array('user_id'=>$id))->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $customer->where(array('user_id'=>$id))->order('or_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('order',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
		$this->view('User/order');
	}
}
?>