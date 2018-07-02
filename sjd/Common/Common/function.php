<?php
/**
 * Created by PhpStorm.
 * User: YangeraYR
 * Date: 2017/9/26
 * Time: 9:45
 */
 function getRandCode($leng)  
    {  
        $charts = "ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz0123456789";  
        $max = strlen($charts);  
        $noncestr = "";  
        for($i = 0; $i < $leng; $i++)  
        {  
            $noncestr .= $charts[mt_rand(1, $max)];
        }  
        return $noncestr;
    }

    function sendMsg($phone){
        $code = rand(1000,9999);//验证码
        $host = "https://feginesms.market.alicloudapi.com";//api访问链接
        $path = "/codeNotice";//API访问后缀
        $method = "GET";
        $appcode = "a7155429978941afbf2bcdc407e1e53c";//替换成自己的阿里云appcode
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "param=".$code."&phone=".$phone."&sign=1&skin=8";  //参数写在这里
        $url = $host . $path . "?" . $querys;//url拼接

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        curl_exec($curl);
        echo $code;
    }
    /**
     * 计算剩余天时分。
     * $unixEndTime string 终止日期的Unix时间
     * @author tangxinzhuan
     * @version 2016-10-28
     */
    function ShengYu_Tian_Shi_Fen($unixEndTime=0)
    {
        if ($unixEndTime <= time()) { // 如果过了活动终止日期
            return '0天0时0分';
        }
        
        // 使用当前日期时间到活动截至日期时间的毫秒数来计算剩余天时分
        $time = $unixEndTime - time();
        
        $days = 0;
        if ($time >= 86400) { // 如果大于1天
            $days = (int)($time / 86400);
            $time = $time % 86400; // 计算天后剩余的毫秒数
        }
        
        $xiaoshi = 0;
        if ($time >= 3600) { // 如果大于1小时
            $xiaoshi = (int)($time / 3600);
            $time = $time % 3600; // 计算小时后剩余的毫秒数
        }
        
        $fen = (int)($time / 60); // 剩下的毫秒数都算作分
        
        return $days.'天'.$xiaoshi.'时'.$fen.'分';
    }
    // 获取当前域名
    function get_host_name(){
        return "http://".$_SERVER['HTTP_HOST'];
    }
    //是否是手机端
    function isMobile() { 
  // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
      if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
        return true;
      } 
      // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
      if (isset($_SERVER['HTTP_VIA'])) { 
        // 找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
      } 
      // 脑残法，判断手机发送的客户端标志,兼容性有待提高。其中'MicroMessenger'是电脑微信
      if (isset($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array('nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile','MicroMessenger'); 
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
          return true;
        } 
      } 
      // 协议法，因为有可能不准确，放到最后判断
      if (isset ($_SERVER['HTTP_ACCEPT'])) { 
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
          return true;
        } 
      } 
      return false;
    }
?>