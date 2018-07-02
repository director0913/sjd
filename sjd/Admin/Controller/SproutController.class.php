<?php 
namespace Admin\Controller;
use Think\Controller;
class SproutController extends Controller{
    //萌宝 投票
    /**手机创建活动
     */
    public function index(){
        if (IS_POST) {
            $add['title'] = I('post.title');
            $add['participants'] = intval(I('post.participants'));
            $add['participants_score'] = intval(I('post.participants_score'));
            $add['sort_rule'] = json_encode(I('post.sort_rule'));
            $add['button_show'] = intval(I('post.button_show'));

            $add['button_name'] = I('post.button_name');
            $parm['button_url'] = I('post.button_url1');
            if(!empty($_FILES['button_url'])){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  = './Uploads/'; // 设置附件上传根目录
                $upload->savePath  = 'Sprout/'; // 设置附件上传（子）目录
                $info   =   $upload->upload();
                $add['button_url'] = '/Uploads/'.$info['button_url']['savepath'].$info['button_url']['savename'];
            }
            $add['button_url'] = $add['button_show']==2? I('post.button_url1'):$add['button_url'];
            $add['description'] = I('post.description');
            $add['phone_sign'] = intval(I('post.phone_sign'));
            $add['start_at'] = strtotime(I('post.start_at'));
            $add['end_at'] = strtotime(I('post.end_at'));
            $add['sign_description'] = I('post.sign_description');
            $add['link_info'] = json_encode(I('post.link_info'));
            $add['sign_is_limit'] = intval(I('post.sign_is_limit'));
            $add['sign_num'] = intval(I('post.sign_num'));
            $add['is_check'] = intval(I('post.is_check'));
            $add['vote_start_at'] = strtotime(I('post.vote_start_at'));
            $add['vote_end_at'] = strtotime(I('post.vote_end_at'));
            $add['voting_form'] = intval(I('post.voting_form'));
            $add['player_day_num'] = intval(I('post.player_day_num'));
            $add['vote_description_show'] = intval(I('post.vote_description_show'));
            $add['vote_description_show'] = I('post.vote_description_show','投票者每日最多可为5名选手各投1票');
            $add['create_at'] = time();
            $add['sprout_id'] = I('post.sprout_id');
            $res = M('sprout')->add($add);
            if ($res) {
                //添加到项目表
                $project['create_id'] = $_SESSION['user_id'];
                $project['table_name'] = 'Sprout';
                $project['table_id'] = $res;
                $project['table_id_name'] = 'sprout_id';
                $project['create_time'] = $add['create_at'];
                M('Project')->add($project);
                $this->redirect('Admin/Sprout/edit', array('sprout_id' => $res),0);
            }
        }else{
            $this->display();
        }
    }
    public function edit(){
        if (IS_POST) {
            $add['title'] = I('post.title');
            $add['participants'] = intval(I('post.participants'));
            $add['participants_score'] = intval(I('post.participants_score'));
            $add['sort_rule'] = json_encode(I('post.sort_rule'));
            $add['button_show'] = intval(I('post.button_show'));

            $add['button_name'] = I('post.button_name');
            $parm['button_url'] = I('post.button_url1');
            if(!empty($_FILES['button_url'])){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  = './Uploads/'; // 设置附件上传根目录
                $upload->savePath  = 'Sprout/'; // 设置附件上传（子）目录
                $info   =   $upload->upload();
                $add['button_url'] = '/Uploads/'.$info['button_url']['savepath'].$info['button_url']['savename'];
            }
            $add['button_url'] = $add['button_show']==2? I('post.button_url1'):$add['button_url'];
            $add['description'] = I('post.description');
            $add['phone_sign'] = intval(I('post.phone_sign'));
            $add['start_at'] = strtotime(I('post.start_at'));
            $add['end_at'] = strtotime(I('post.end_at'));
            $add['sign_description'] = I('post.sign_description');
            $add['link_info'] = json_encode(I('post.link_info'));
            $add['sign_is_limit'] = intval(I('post.sign_is_limit'));
            $add['sign_num'] = intval(I('post.sign_num'));
            $add['is_check'] = intval(I('post.is_check'));
            $add['vote_start_at'] = strtotime(I('post.vote_start_at'));
            $add['vote_end_at'] = strtotime(I('post.vote_end_at'));
            $add['voting_form'] = intval(I('post.voting_form'));
            $add['player_day_num'] = intval(I('post.player_day_num'));

            $add['vote_description_show'] = intval(I('post.vote_description_show'));
            //var_dump($add['vote_description_show']);die;
            $add['vote_description'] = $add['vote_description_show']?'投票者每日最多可为5名选手各投1票':I('post.vote_description');
            $add['create_at'] = time();
            $where['sprout_id'] = I('get.sprout_id');
            $res = M('Sprout')->where($where)->save($add);
            if ($res) {
                $this->redirect('/Admin/Sprout/edit', array('sprout_id' => $where['sprout_id']),0);
            }
        }else{
            $sprout_id = I('get.sprout_id',0);

            if ($sprout_id) {
                $res = M('Sprout')->where(['sprout_id'=>$sprout_id])->find();
                $res['sort_rule'] = json_decode($res['sort_rule']);
                $this->assign('res',$res);
            }
            $this->display();
        }
    }
	
}