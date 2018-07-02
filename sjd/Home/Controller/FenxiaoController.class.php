<?php 
namespace Home\Controller;
use Think\Controller;
class FenxiaoController extends Controller{
    //萌宝 投票
    /**手机创建活动
     */
    public function index(){
        $fen_id = I('get.fen_id','0');
        $res = M('fenxiao')->where(array('fen_id'=>$fen_id))->find();
       	//处理下json数据
       	$res['images'] = json_decode($res['images']);
       	$res['commodity_images'] = json_decode($res['commodity_images']);
       	$res['discount_info'] = json_decode($res['discount_info']);
       	$res['add_text'] = json_decode($res['add_text']);
       	$res['add_images'] = json_decode($res['add_images']);
       	$res['add_videos'] = json_decode($res['add_videos']);
       	$res['mechanism_text'] = json_decode($res['mechanism_text']);
       	$res['mechanism_images'] = json_decode($res['mechanism_images']);
       	$res['mechanism_videos'] = json_decode($res['mechanism_videos']);
       	$res['store_title'] = json_decode($res['store_title']);
       	$res['store_addr'] = json_decode($res['store_addr']);
       	$res['store_num'] = json_decode($res['store_num']);
       	$res['store_phone'] = json_decode($res['store_phone']);
       	//排序
       	$rankList = D('Cut')->rankList(['order'=>'price','sort'=>'desc','fen_id'=>$fen_id,'page'=>1]);
        $this->assign('res',$res);
        $this->assign('rankList',$rankList);
        $this->display();
    }
    //列表rank
    public function ranking(){
        $fen_id = I('get.fen_id','0');
        $res = M('sprout')->where(array('fen_id'=>$fen_id))->find();
        $parm = ['fen_id'=>$fen_id,'order'=>'vote_num','sort'=>'desc'];
        $vote = D('Sprout')->rankList($parm);
        $this->assign('res',$res);
        $this->assign('vote',$vote);
        $this->display();
    }
    //说明
    public function win(){
        $fen_id = I('get.fen_id','0');
        $res = M('Sprout')->where(array('fen_id'=>$fen_id))->find();
        $this->assign('res',$res);
        $this->display();
    }
    //报名
    public function reports(){
        $fen_id = I('get.fen_id','0');
        //手机端不允许报名
        $sprout = M('sprout')->where(array('fen_id'=>$fen_id))->find();
        if (isMobile()) {
            if (!$sprout['phone_sign']) {
                echo '<script>alert("手机端不允许报名！");history.back(-1);</script>';
            }
        }
        //先查询是否 还可以报名，人数限制
        $sign_count = M('Sign')->where(['fen_id'=>$fen_id])->count();
        if ($sprout['sign_is_limit']==1) {
            if ($sign_count >= $sprout['sign_num']) {
                echo '<script>alert("报名人数已达到最大限度，不能继续报名！");history.back(-1);</script>';
            }
        }
        $sprout['link_info'] = json_decode($sprout['link_info']);
        $fen_id = I('get.fen_id','0');
        $res = M('Sprout')->where(array('fen_id'=>$fen_id))->find();
        $this->assign('res',$res);
        $this->assign('sprout',$sprout);
        $this->display();
    }
    //详情页
    public function detail(){
        $sign_id = I('get.sign_id','0');
        $fen_id = I('get.fen_id','0');
        $sprout = M('sprout')->where(array('fen_id'=>$fen_id))->find();
        $res = M('Sign')->join('LEFT JOIN sj_customer ON sj_customer.user_id = sj_sign.user_id')->where(array('sign_id'=>$sign_id))->find();
        $res['img'] = json_decode($res['img']);
        $this->assign('res',$res);
        $this->assign('sprout',$sprout);
        $this->display();
    }
    //报名
    public function sign(){
        //先查询是否 还可以报名，人数限制
        $sprout = M('sprout')->where(array('fen_id'=>$fen_id))->find();
        $sign_count = M('Sign')->where(['fen_id'=>I('post.fen_id')])->count();
        if ($sprout['sign_is_limit']==1) {
            if ($sign_count >= $sprout['sign_num']) {
                echo '<script>alert("报名人数已达到最大限度，不能继续报名！");history.back(-1);</script>';
            }
        }
        
        $add['title'] = I('post.title');
        $add['description'] = I('post.description');
        $add['name'] = I('post.name');
        $add['phone'] = I('post.phone');
        $add['info'] = I('post.info');
        $add['create_at'] = time();
        $add['fen_id'] = I('post.fen_id');
        if(!empty($_FILES)){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  = './Uploads/'; // 设置附件上传根目录
            $upload->savePath  = 'Sprout/'; // 设置附件上传（子）目录
            $info=array();
            foreach ($_FILES['img']['name'] as $key=>$value){
                $file1=array();
                $file1["img"]['name']=$value;
                $file1["img"]['type']=$_FILES['img']["type"][$key];
                $file1["img"]['tmp_name']=$_FILES['img']["tmp_name"][$key];
                $file1["img"]['error']=$_FILES['img']["error"][$key];
                $file1["img"]['size']=$_FILES['img']["size"][$key];
                $info   =   $upload->upload();
                $imgs[] = '/Uploads/'.$info[0]['savepath'].$info[0]['savename'];
            }
            $add['img'] = json_encode($imgs);
        }
        $res = M('sign')->add($add);
        $this->redirect('Home/Sprout/detail', array('fen_id' => $add['fen_id'],'sign_id' => $res), 0);
        $this->assign('res',$res);
        $this->display();
    }
    //创建活动
    public function add(){
        if (IS_POST) {
            $add['title'] = I('post.title');
            $add['start_at'] = strtotime(I('post.start_at'));
            $add['end_at'] = strtotime(I('post.end_at'));
            $add['is_code'] = intval(I('post.is_code'));
            $add['hours_num'] = intval(I('post.hours_num'));
            $add['is_code'] = intval(I('post.is_code'));
            $add['limit_num'] = intval(I('post.limit_num'));
            $add['hours_num'] = intval(I('post.hours_num'));
            $add['description'] = I('post.description');
            $add['city'] = I('post.city');
            $add['wenben'] = I('post.wenben');
            if(!empty($_FILES['images'])){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  = './Uploads/'; // 设置附件上传根目录
                $upload->savePath  = 'Sprout/'; // 设置附件上传（子）目录
                $info=array();
                foreach ($_FILES['images']['name'] as $key=>$value){
                    $file1=array();
                    $file1["images"]['name']=$value;
                    $info   =   $upload->upload();
                    $imgs[] = '/Uploads/'.$info[0]['savepath'].$info[0]['savename'];
                }
                $add['images'] = json_encode($imgs);
            }
            if(!empty($_FILES['videos'])){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath  = './Uploads/'; // 设置附件上传根目录
                $upload->savePath  = 'Sprout/'; // 设置附件上传（子）目录
                $info=array();
                foreach ($_FILES['videos']['name'] as $key=>$value){
                    $file1=array();
                    $file1["videos"]['name']=$value;
                    $info   =   $upload->upload();
                    $video[] = '/Uploads/'.$info[0]['savepath'].$info[0]['savename'];
                }
                $add['videos'] = json_encode($video);
            }
           
            $add['store_title'] = I('post.store_title');
            $add['store_addr'] = I('post.store_addr');
            $add['store_buliding_num'] = I('post.store_buliding_num');
            $add['store_tel'] = I('post.store_tel');
            $add['create_at'] = time();
            $add['fen_id'] = I('post.fen_id');
            $add['fen_id'] = $_SESSION['user_id'];
            $res = M('sprout')->add($add);
            if ($res) {
                //添加到项目表
                $project['create_id'] = $_SESSION['user_id'];
                $project['table_name'] = 'Sprout';
                $project['table_id'] = $res;
                $project['table_id_name'] = 'fen_id';
                $project['create_time'] = $add['create_at'];
                M('Project')->add($project);
                $this->redirect('Home/Sprout/index', array('fen_id' => $res),0);
            }
        }else{
            $this->display();
        }
    }
	
}