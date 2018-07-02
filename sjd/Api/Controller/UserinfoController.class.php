<?php
namespace Api\Controller;
use Think\Controller;
class UserinfoController extends Controller
{
   /**
    * 微信授权
    */
   public function get_user_info(){
        $user_id = $_GET['user_id'];
        $_SESSION['if_user_id'] = $user_id;
        $_SESSION['if_com_id'] = $_GET['com_id'];
        $_SESSION['if_or_id'] = $_GET['or_id'];
        header('Access-Control-Allow-Origin:*');
        $redirect = urlencode(get_host_name()."/index.php/Api/Userinfo/rtuser.html");
        $url1="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".WEIXIN_APPID."&redirect_uri=".$redirect."&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
        Header("Location: $url1");
   }
    //保存获取到用户信息
    public function rtuser(){
    $appid=WEIXIN_APPID;
    $secret=WEIXIN_SECRET;
    $code=$_GET['code'];
    $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
    $date=file_get_contents($url);//openid
    $user=get_object_vars(json_decode($date));
    $access_token=$user['access_token'];
    $openid=$user['openid'];
    $url1="https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
    $date1=file_get_contents($url1);//用户信息
    $json=get_object_vars(json_decode($date1));

    $res['info'] = $json;
    $like = M('customer')->where(array('user_id'=>$_SESSION['if_user_id']))->find();
    if($like){
        if($like['openid'] == null || $like['openid']==''){
            $ck  = M('customer')->where(array('user_id'=>$_SESSION['if_user_id']))->save(array('openid'=>$res['info']['openid'],'user_img'=>$res['info']['headimgurl'],'user_name'=>$res['info']['nickname']));
            if($_SESSION['if_com_id']!=null){
                redirect(get_host_name()."/fankes/bargain.html?user_id=$ck&or_id=".$_SESSION['if_or_id']."&com_id=".$_SESSION['if_com_id']);
                //echo "<script type='text/javascript'>window.location.href=".get_host_name()."/fankes/bargain.html?user_id=$ck&or_id=".$_SESSION['if_or_id']."&com_id=".$_SESSION['if_com_id']."';</script>";
            }else{
                redirect(get_host_name()."/fankes/index.html?user_id=$ck");
                //echo "<script type='text/javascript'>window.location.href=".get_host_name()."/fankes/index.html?user_id=$ck';</script>";
            }

        }
    }else{
        $open = M('customer')->where(array('openid'=>$res['info']['openid']))->find();
        if($open == '' || $open == null){
            $ck  = M('customer')->add(array('openid'=>$res['info']['openid'],'user_img'=>$res['info']['headimgurl'],'user_name'=>$res['info']['nickname']));
        }else{
            $ck = M('customer')->where(['openid'=>$res['info']['openid']])->getField('user_id');

        }
        if($_SESSION['if_com_id']!=null){
            redirect(get_host_name()."/fankes/bargain.html?user_id=$ck&or_id=".$_SESSION['if_or_id']."&com_id=".$_SESSION['if_com_id']);
            //echo "<script type='text/javascript'>window.location.href=".get_host_name()."/fankes/bargain.html?user_id=$ck&or_id=".$_SESSION['if_or_id']."&com_id=".$_SESSION['if_com_id']."';</script>";
        }else{
            redirect(get_host_name()."/fankes/index.html?user_id=$ck");
           //echo "<script type='text/javascript'>window.location.href=".get_host_name()."/fankes/index.html?user_id=$ck';</script>";
        }
    }

    //$this->success('授权完成',U('Index/index'));
}

    /**
     * 手机端扫码授权
     */
    public function s_code(){
        $urls = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".WEIXIN_APPID."&redirect_uri=".get_host_name()."/index.php/Api/Userinfo/s_rtuser.html&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
        $this->scerweima2($urls);
    }

    function scerweima2($url)
    {
        require_once($_SERVER['DOCUMENT_ROOT']."/phpqrcode.php");
        $value = $url;                  //二维码内容
        $errorCorrectionLevel = 'L';    //容错级别
        $matrixPointSize = 5;           //生成图片大小
        //生成二维码图片
        $qr = new \QRcode();
        $QR = $qr::png($value, false, $errorCorrectionLevel, $matrixPointSize, 2);

    }
    public function s_rtuser(){
        $appid=WEIXIN_APPID;
        $secret=WEIXIN_SECRET;
        $code=$_GET['code'];
        $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
        $date=file_get_contents($url);//openid
        $user=get_object_vars(json_decode($date));
        $access_token=$user['access_token'];
        $openid=$user['openid'];
        $url1="https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
        $date1=file_get_contents($url1);//用户信息
        $json=get_object_vars(json_decode($date1));
        $res['openid'] =  $openid;
        $res['info'] = $json;
        $_SESSION['user_info'] = $res['info'];
        echo "<script type='text/javascript'>window.location.href='".get_host_name()."/fanke/land.html';</script>";
    }

    /**
     * 电脑端注册扫码
     */
    public function web_code(){
        $redirect = urlencode(get_host_name()."/index.php/Api/Userinfo/rtuser.html");
        $urls = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".WEIXIN_APPID."&redirect_uri=".$redirect."&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
        $this->scerweima2($urls);
    }
    public function c_rtuser(){
        $appid=WEIXIN_APPID;
        $secret=WEIXIN_SECRET;
        $code=$_GET['code'];
        $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
        $date=file_get_contents($url);//openid
        $user=get_object_vars(json_decode($date));
        $access_token=$user['access_token'];
        $openid=$user['openid'];
        $url1="https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
        $date1=file_get_contents($url1);//用户信息
        $json=get_object_vars(json_decode($date1));
        $res['openid'] =  $openid;
        $res['info'] = $json;
        $_SESSION['user_info'] = $res['info'];
        echo "<script type='text/javascript'>window.location.href=".get_host_name()."/fankeweb/reg.html';</script>";
    }

}
?>