<?php
header('Access-Control-Allow-Origin:*');
	require_once "jssdk.php";
	$appid = 'wxfcaa24e012dc65df';
	$appSecret = '63834ac83f85558c58b048f01971f799';
	$urls = $_POST['urls'];
	$jssdk = new JSSDK($appid, $appSecret, $urls);
	$signPackage = $jssdk->GetSignPackage();
//	 $allsign = array($signPackage["appId"],$signPackage["timestamp"],$signPackage["nonceStr"],$signPackage["signature"],$signPackage["url"]);
	//print_r($signPackage);
	exit(json_encode(array('result'=>$signPackage)));
?>