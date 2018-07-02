
var faiEncrypt_key = "fdsa1423";
var sendingVerCode = false;   //0:未发送验证码;  1:正在发验证码;
var resendTime = 60;//60s重新获取验证码
var getCodeTimer = '';//定时器
var returnEmail = "";
var returnPhone = "";


$(function () {
	
	initFun();
	$('#cacct').focus();
	
	$('#cacct').focus(function(){
		autoFocus();
	}).keydown(function(event){
		$(".placeholder_txt").hide();
	}).blur(function(){
		autoFocus();
	});
	
	function autoFocus(){
		if($("#cacct").val() != ""){
			$(".placeholder_txt").hide();
		}else{
			$(".placeholder_txt").show();
		}
	}
});

function placeholder_click(){
	$('#cacct').focus();
}

function initFun () {
	
	$("#cacct").bind("blur", function () {
		checkCacctNew(true);
	}).keydown(function(event){
		if(event.keyCode == 13 || event.which == 13){
			
			$('#verificationCodeSend').focus();
			
		}
	});

	$("#verificationCodeSend").bind("blur", function () {
		if(!sendingVerCode){
			//checkValidateSend();
        }
	}).keydown(function(event){
		if(event.keyCode == 13 || event.which == 13){
			next();
		}
	});
	
	
	$("#pwd").on("keydown",function(event){
		if(event.keyCode == 13 || event.which == 13){
			$('#pwd2').focus();
		}
	});
};

function next (){
	
	var cacct = $.trim($("#cacct").val());
	var verificationCodeSend = $("#verificationCodeSend").val() ;
	
	//var encrypt = new JSEncrypt();
	var acctType_s = checkCacctNewJs(true);
	
	checkValidateSend();
	


   
	if (checkCacctNewJs(true) && checkValidateSend()) {
		if (verificationCodeSend == faiEncrypt_key) {
			pwdStepTwo(cacct);
			$("#pwd").focus();
		} else {
			
			if(!sendingVerCode){
  				showErr($("#verificationCodeSend"), "验证码错误或已失效，请重新输入");
			}else{
				clearInterval(getCodeTimer);
				if($('#verificationCodeSend').val() == "" ){      					
	        		getCodeTimer = setInterval('GetComeDownTime(2)', 1000);
				}else{
	        		getCodeTimer = setInterval('GetComeDownTime(1)', 1000);
				}
			}
			
		}
		
	}
};


function refreshValidateCode () {
	$("#validateCode_img").attr("src", "/validateCode.jsp?" + (Math.random() * 1000));
};

function checkCacctNew (isCheck) {
	var isSuccess = false;
	// 校验帐号名
	var cacct =  $.trim($("#cacct").val()); 
	if(!checkCacctNewJs (true)){
		return ;
	}
	var acctType_s = checkCacctNewJs(true);
	if (isCheck) {
		$.ajax({
			type 	: "post",
			url 	: "/index.php/Api/Add/ifcz" ,
			data:{
				phone:cacct
			},
			error	: function (result) {
				isSuccess = false;
            	showErr($('#cacct'), '系统繁忙。');
			},
			success : function (result) {
				var data = jQuery.parseJSON(result);
				
				if(data == 1){
				
					isSuccess = false;
					
					showErr($('#cacct'), '此帐号不存在！');
					
					$(".correctAcct").hide();
				} else {
        			showErr($('#cacct'), '');
        			isSuccess = true;
					$(".correctAcct").show();  
				}
				
			}
		});
	}
	return isSuccess;
};

function checkCacctNewJs (settle) {
	var acctType_s = 0;
	if(settle == true){
		var cacct = $('#cacct');
		var cacctValue = $.trim(cacct.val()); 
		
		if (cacctValue == "" || typeof cacct == "undefined"){
			showErr(cacct, '请输入已验证的帐号');
			$(".correctAcct").hide();
		}else{
			if(isMobile(cacctValue)){ //纯数字
				acctType_s = 1;
			}else{
				acctType_s = 3;
			}
			showErr($('#cacct'), '');
		}
	}else{
		var cacct = settle;
		if(isMobile(cacct)){ //纯数字
			acctType_s = 1;
		}else{
			acctType_s = 3;
		}
	}	
	return acctType_s;
};

function checkValidate () {
	var isSuccess = true;
	var validate = $("#validateCode").val();
	if (validate == "" || typeof validate == "undefined") {
		isSuccess = false;
		showErr($('#validateCode'), '请输入图片验证码');
	}else {
		showErr($('#validateCode'), '');
	}
	return isSuccess;
};

function checkValidateSend(){
	var isSuccess = true;
	var acctType_s = checkCacctNewJs(true);
	var validate = $("#verificationCodeSend").val();
	if (validate == "" || typeof validate == "undefined") {
		isSuccess = false;
		if(!sendingVerCode){
			showErr($('#verificationCodeSend'), '请输入验证码');
		}else{
        	clearInterval(getCodeTimer);
			getCodeTimer = setInterval('GetComeDownTime("2")', 1000);
		}	
	}else {
		if(!sendingVerCode){
			showErr($('#verificationCodeSend'), '');
		}	
	}
	return isSuccess;
}

function pwdStepTwo(cacctTmp){
	var changePwdTwo = [];
	changePwdTwo.push("<div id='pwdPanel' class='pwdPanel'>");
	changePwdTwo.push("	<div class='progressBar'>");
	changePwdTwo.push("		<div class='progressTwo'></div>");
	changePwdTwo.push("	</div>");
	changePwdTwo.push("	<div class='tipText'>");
	changePwdTwo.push("		<p>请设置你的新密码！</p>");
	changePwdTwo.push("	</div>");
	changePwdTwo.push("	<div class='pwdContent'>");
	changePwdTwo.push("		<div class='pwdContentPanel'>");
	changePwdTwo.push("			<div class='pwdItem'>");
	changePwdTwo.push("				<div class='pwdItemName'>");
	changePwdTwo.push("					<span>新密码：</span>");
	changePwdTwo.push("				</div>");
	changePwdTwo.push("				<div class='pwdItemContent'>");
	changePwdTwo.push("					<input type='password' id='pwd' maxlength='20' autocomplete='new-password' onpaste='return false' onKeyUp='checkPwdStrength(this);'/>");
	changePwdTwo.push("					<div class='correctPwd'></div>");
	changePwdTwo.push("				</div>");
	changePwdTwo.push("				<div class='pwdItemTip pwdItemTip_j'>");
	changePwdTwo.push("					<span class='pwdItemTipIcon'>&nbsp;</span>");
	changePwdTwo.push("					<span class='pwdItemTipErr pwdItemTipErr_j'>不能为空！</span>");
	changePwdTwo.push("				</div>");
	changePwdTwo.push("			</div>");
	changePwdTwo.push("			<div class='pwdStrength'>");
	changePwdTwo.push("				<div style='width: 100px;height:18px;float:left;margin-right: 10px;'></div>");
	changePwdTwo.push("				<div id='weak' class='pwdStrengthItem'>弱</div>");
	changePwdTwo.push("				<div id='medium' class='pwdStrengthItem'>中</div>");
	changePwdTwo.push("				<div id='force' class='pwdStrengthItem'>强</div>");
	changePwdTwo.push("			</div>");
	changePwdTwo.push("			<div class='pwdItem'>");
	changePwdTwo.push("				<div class='pwdItemName'>");
	changePwdTwo.push("					<span>确认新密码：</span>");
	changePwdTwo.push("				</div>");
	changePwdTwo.push("				<div class='pwdItemContent'>");
	changePwdTwo.push("					<input type='password' id='pwd2' onpaste='return false' autocomplete='new-password' maxlength='20' onKeyDown=\"if(event.keyCode==13){changePwdNext('"+cacctTmp+"');}\" >");
	changePwdTwo.push("					<div class='correctPwd2'></div>");
	changePwdTwo.push("				</div>");
	changePwdTwo.push("				<div class='pwdItemTip pwdItemTip_j'>");
	changePwdTwo.push("					<span class='pwdItemTipIcon'>&nbsp;</span>");
	changePwdTwo.push("					<span class='pwdItemTipErr pwdItemTipErr_j'>不能为空！</span>");
	changePwdTwo.push("				</div>");
	changePwdTwo.push("			</div>");
	changePwdTwo.push("		</div>");
	changePwdTwo.push("		<div class='pwdTip'>");
	changePwdTwo.push("			<div class='pwdTipIcon'></div>");
	changePwdTwo.push("			<div class='pwdTipText'>");
	changePwdTwo.push("				<p>1.为保证您的安全，新密码必须与旧密码不同</p>");
	changePwdTwo.push("				<p>2.密码为6-20位字符( 字母、数字、符号 )的组合，区分大小写。</p>");
	changePwdTwo.push("			</div>");
	changePwdTwo.push("		</div>");
	changePwdTwo.push("	</div>");
	changePwdTwo.push("	<div class='btnLine' style='margin-left: 272px;position:relative;'>");
	changePwdTwo.push("		<div class='showMsg'></div>")	
	changePwdTwo.push("		<a id='nextBtn_j' class='nextBtn_pwd' hidefocus='true' href=\"javascript:changePwdNext('"+cacctTmp+"');\">下一步</a>");
	changePwdTwo.push("	</div>");
	changePwdTwo.push("	<div class='foot' style='margin-top:70px;'>");
	changePwdTwo.push("		<div class='copyright'>");
	changePwdTwo.push("		Copyright <font style=''>&copy;</font> 2010 - 2018 凡科互联网科技股份有限公司");
	changePwdTwo.push("		</div>");
	changePwdTwo.push("	</div>");
	changePwdTwo.push("</div>");
	$(".paper").html(changePwdTwo.join(""));
	$(".progressTwo_j").addClass("progressDone");
}

function pwdStepThree(cacctTmp){
	var changePwdThree = [];
	changePwdThree.push("<div id='pwdPanel' class='pwdPanel'>");
	changePwdThree.push("	<div class='progressBar'>");
	changePwdThree.push("		<div class='progressThree'></div>");
	changePwdThree.push("	</div>");
	changePwdThree.push("	<div id='pwdSucceContainer'>");
	changePwdThree.push("		<div class='pwdSucce'>");
	changePwdThree.push("			<span class='successIcon'></span>");
	changePwdThree.push("			<span class='reset'>您的密码已重置成功！</span>");
	changePwdThree.push("		</div>");
	changePwdThree.push("		<a class='pwd_login' href=\"javascript:login('"+cacctTmp+"');\">登录</a>");
	changePwdThree.push("	</div>");
	changePwdThree.push("	<div class='foot' style='margin-top:70px;'>");
	changePwdThree.push("		<div class='copyright' style='text-align:center;margin:0px auto'>");
	changePwdThree.push("		Copyright <font style=''>&copy;</font> 2010 - 2018 凡科互联网科技股份有限公司");
	changePwdThree.push("		</div>");
	changePwdThree.push("	</div>");
	changePwdThree.push("</div>");
	$(".paper").html(changePwdThree.join(""));
	$(".progressTwo_j").addClass("progressDone");
}

function getverCode(){
	var valid = true; 	
	var cacct = $.trim($("#cacct").val());	// 校验帐号名
	
	
	if (valid) {
		$.ajax({
			type 	: "post",
			url 	: "/index.php/Api/Add/ifcz",
			data:{
				phone:cacct
			},
			error	: function (result) {
            	showErr($('#cacct'), '系统繁忙');
			},
			success : function (result) {
				
				var data = jQuery.parseJSON(result);
				
				
				if (data == 1) {
					
					showErr($('#cacct'), '此帐号不存在');
					
					$(".correctAcct").hide();
				} else {
        			showErr($('#cacct'), '');
        			
        			sendVerCode(cacct);
					$(".correctAcct").show();  
				}
				
			}
		});
	}
}

function sendVerCode(cacctTmp){
	resendTime = 60;
	returnEmail = "";
	returnPhone = "";
	var cacct = cacctTmp ;
    showErr($('#verificationCodeSend'), '');
    var validateCode = $("#validateCode").val() ;
	
	
	$.ajax({
		type:"post",
		url:"/index.php/Api/Add/back_password",
		data:{
			phone:cacct
		},
		success: function(result){
			var data = jQuery.parseJSON(result);
			
			if(data != 0){
				$(".item_code").hide();
				$("#verificationCodeSend").focus();
				faiEncrypt_key = data;
				
				clearInterval(getCodeTimer);
	
				getCodeTimer = setInterval('GetComeDownTime(0)', 1000);
				
				sendingVerCode = true ;
//				if($('.item_code').hasClass('resendCode_Type')){
//					
//				 		Portal.logDog(4000015,4); //找回密码-点击重新获取验证码
//					
//				}else{
//					
//				 		Portal.logDog(4000015,3);//找回密码-点击获取验证码
//					
//				}
				
			}else{
				
				
				showErr($('#verificationCodeSend'), data.msg);
				
			}
		}
	})
}

function GetComeDownTime(settle){
	
	
	var $resendCode = $('.item_code');
	if(resendTime>0){
	    
    	
    	$('#verificationCodeSend').parent().parent().find(".item4").addClass("sucMsg").show().html('<div class="sucIcon"></div>已发送验证码到手机'+returnPhone+'，<span class="showTime">'+ resendTime +'s</span> 后可重新发送');		            
        
    	
        
        if(settle == 1){
			$('#verificationCodeSend').parent().parent().find(".item4").removeClass("sucMsg");
	        showErr($('#verificationCodeSend'), '验证码错误或已失效，' + resendTime+'s 后可重新发送');       	
        }
        if(settle == 2){
			$('#verificationCodeSend').parent().parent().find(".item4").removeClass("sucMsg");
	        showErr($('#verificationCodeSend'), '验证码不能为空，' + resendTime+'s 后可重新发送');	
        }
	}else{
		$('#verificationCodeSend').parent().parent().find(".item4").removeClass("sucMsg");
        showErr($('#verificationCodeSend'), '');
        $resendCode.addClass("resendCode_Type");
        $(".item_code").show();
		$(".item_code").html("重新获取验证码");
		clearInterval(getCodeTimer);
        sendingVerCode = false ;
	}
	resendTime--;
}

$("#pwd, #pwd2").on("blur", function () {
	checkValue();
});

$(".pwdFloatTip").on("mouseenter", function () {
	showPwdSafeTip();
}).on("mouseleave", function () {
	$(".floatSafeTip").hide();
});

function changePwdNext(cacctTmp){
	var pwd = $("#pwd").val();
	var isNoPass = checkValue();
	$("#nextBtn_j").attr("disable","disabled");
	if (isNoPass) {
		$("#nextBtn_j").removeAttr("disable");
		return ;
	}	
	var acctType_s = checkCacctNewJs(cacctTmp);
	
	$.ajax({
		type: "post",
		url: '/index.php/Api/Add/edit_password',
		data:{
			phone:cacctTmp,
			password:pwd
		},
		error: function(){
			showMsg("服务繁忙，请稍后重试");
		},
		success: function(result){
			var result = jQuery.parseJSON(result);
			
			if (result) {
				if(result == 1) {
					showMsg("");
					$("#pwdPanel").hide();
					$(".progressBar_j").show();
					$(".progressFour_j").addClass("progressDone");	
					pwdStepThree(cacctTmp);
				} else {
					
					msg = "系统错误";
					
				}
			}else {
				showMsg("连接超时，请重试");
			}
		}
	});
};

function checkValue () {
	var pwd_Div = $("#pwd").parent().parent();
	var pwd_Val = $("#pwd").val();
	var pwd_Msg = "";
	var pwd2_Div = $("#pwd2").parent().parent();
	var pwd2_Val = $("#pwd2").val();
	var pwd2_Msg = "";
	var isShowTip = false;

	if (!pwd_Val) {
		$(".correctPwd").hide();
		isShowTip = true;
		pwd_Msg = "不能为空！";
	} else if (pwd_Val.length < 6 || pwd_Val.length > 20) {
		$(".correctPwd").hide();
		isShowTip = true;
		pwd_Msg = "密码由6-20个字符组成，区分大小写！";
	} else {
		$(pwd_Div).find(".pwdItemTip_j").hide();
		$(".correctPwd").show();
	}

	if (!pwd2_Val) {
		$(".correctPwd2").hide();
		isShowTip = true;
		pwd2_Msg = "不能为空！";
	} else if (pwd2_Val.length < 6 || pwd2_Val.length > 20) {
		$(".correctPwd2").hide();
		isShowTip = true;
		pwd2_Msg = "密码由6-20个字符组成，区分大小写！";
	} else {
		$(pwd2_Div).find(".pwdItemTip_j").hide();
		$(".correctPwd2").show();
	}

	if (!isShowTip) {
		if (pwd_Val != pwd2_Val) {
			$(".correctPwd2").hide();
			isShowTip = true;
			pwd2_Msg = "密码和确认密码不一致！";
		} else {
			var pwdStrength = $(".pwdStrength").find(".choice");
			if (pwdStrength.length == 1) {
				isShowTip = true;
				pwd_Msg = "密码强度过于简单，请重新设置！";
				$(".correctPwd,.correctPwd2").hide();
			}
		}
	}

	if (isShowTip) {
		$(".pwdTip").hide();
		if (pwd_Msg.length > 0) {
			var pwdItemTip = $(pwd_Div).addClass("pwdItemShowTip").find(".pwdItemTip_j");
			$(pwdItemTip).show().find(".pwdItemTipErr_j").text(pwd_Msg);
		}
		if (pwd2_Msg.length > 0) {
			var pwdItemTip = $(pwd2_Div).addClass("pwdItemShowTip").find(".pwdItemTip_j");
			$(pwdItemTip).show().find(".pwdItemTipErr_j").text(pwd2_Msg);
		}
	} else {
		$(".pwdTip").show();
		$(pwd_Div).removeClass("pwdItemShowTip").find(".pwdItemTip_j").hide();
		$(pwd2_Div).removeClass("pwdItemShowTip").find(".pwdItemTip_j").hide();
	}

	return isShowTip;
};




function login (cacctTmp) {
	var loginUrl = "/fankeweb/index.html"
	window.open(loginUrl);
};

function checkPwdStrength (obj) {
	var pwd = $(obj).val();
	if (pwd.length < 6 || pwd.length > 20) {
		$(".pwdStrength").find(".pwdStrengthItem").removeClass("choice")
		return ;
	}
	var modes = 0;
	if ( /\d/.test(pwd) ) {
		modes++;
	}
	if ( (/[a-z]/.test(pwd)) || (/[A-Z]/.test(pwd)) ) {
		modes++;
	}
	if ( /\W/.test(pwd) || /[_]/.test(pwd) ) {
		modes++;
	}
	var pwdStrengthItems = $(".pwdStrength").find(".pwdStrengthItem").removeClass("choice");
	for (var i = 0; i < modes; i++) {
		var pwdStrengthItem = pwdStrengthItems[i];
		$(pwdStrengthItem).addClass("choice");
	}
};

function showErr(obj, str){
	if (str != "") {
		obj.parent().parent().find(".item4").css("display","block");
		obj.parent().parent().find(".item4").text(str);
	} else {
		obj.parent().parent().find(".item4").css("display","none");
		obj.parent().parent().find(".item4").text(str);
	}
}

function showMsg(str){
	$(".showMsg").html(str);
}



function isMobile(mobile){
	var pattern = /^1[3456789]\d{9}$/ ;
	return pattern.test(mobile);
}
