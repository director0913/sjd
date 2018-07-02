<?php
/**
 * @param $url链接
 * 二维码预览
 */
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
?>