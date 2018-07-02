
		
	var faiEncrypt_key = "";
	
	var unionAid = 0;
	var trackApp = 207;
	var trackParam = '-';
	var trackAD = '0 0 0 0';
	var kwId = 0;
	var audience = 0;
	var haoci_rec_word = '';
	var bidurl = '';
	var jump = 0;
	
	
	$(function(){
		
		
		
		mWave.init();

		mRegForm.init();

		$('.u-input .msg').hide();
		$('body').show();
		
		
		//注册页-访问量。注意要在上面的Log.init()完了再log
		//Log.log_visit();
	});
	
	var mMask = (function(){
		return {
			show: function(){
				$('<div class="popupBg"></div>').appendTo($('body'));
			},
			remove: function(){
				$('.popupBg').remove();
			}
		}
	})();
	
	/* 波浪动画模块 */
	var mWave = (function(){
		var $dom = $('.m-wave');
		
		function init(){
			start($dom.find('.wave-item.item1'), 150000);
			start($dom.find('.wave-item.item2'), 140000);
			start($dom.find('.wave-item.item3'), 30000);
		}
		function start($target, speed){
			var halfWidth = parseInt($target.width() / 2);
			$target.animate({'marginLeft': - halfWidth + 'px'}, speed, 'linear', roll);
			function roll(){
				$target.css('marginLeft', 0);
				$target.animate({'marginLeft': - halfWidth + 'px'}, speed, 'linear', roll);
			}
		}
		
		return {
			init: init
		}
	})();
	/* 波浪动画模块 end */
	
	
	
	

	
	var mRegForm = (function(){
		
		var $dom = $('.m-regForm');
		
		var AcctCheckAjax = (function(){
			var isReady = false;
			var xhr = null;
			
			return {
				reset: function(){
					isReady = false;
					xhr && xhr.abort();
					xhr = null;
				},
				ready: function(callback){
					if(isReady){
						if(typeof callback == 'function'){
							callback();
						}
					}else{
						action(callback);
					}
				}
			}
			
			function action(callback){
				if(xhr){
					return false;	//避免重复请求
				}
				var $acct = $('#acct'),
					$uInput = $acct.closest('.u-input');
				var acct = $acct.val();
			
				showSuc($uInput, '正在检查帐号是否可用...');
				isReady = true;
            	
				xhr = $.ajax({
		            type: "post",//使用post方法访问后台
		            url: '/index.php/Api/Add/ifcz',
		            data: {
		            	phone:acct
		            },
		            error: function(){
		            	showErr($uInput, '检验帐号失败，系统繁忙');
		            },
		            success: function(result){
		            	
		                var result = jQuery.parseJSON(result);
		               
		                    if (result == 0) {
		                        showErr($uInput, '手机号码已注册过帐号，请<a hidefocus="true" href="javascript:;" onClick="mRegForm.login();">直接登录</a>');		           
		                    
		                    } else {
		            			isReady = true;
		                    	showSuc($uInput);
		                    	if(typeof callback == 'function'){
		                    		callback();
		                    	}
		                    }
		                
		            }
		        });
			}
		})();
		
		
		
		return {
			init: function(){
				
				initUI();
			},
			login: function(){
				window.location.href = "/fankeweb/index.html";
			   
			}
		}
		
		function initUI(){
		
			$('.u-input .vis').click(function(){
				var $vis = $(this),
					$input = $vis.closest('.u-input').find('input');
				$vis.toggleClass('z-on');
				if($vis.hasClass('z-on')){
					//$input.attr('type', 'text');	//jQ不支持修改type属性
					$input[0].setAttribute('type', 'password');		//IE8也不支持setAttribute
				}else{
					$input[0].setAttribute('type', 'text');
				}
			});
			
			
			$('.u-input input[type="text"]:not("#pwd")').blur(function(){
				$(this).val($.trim($(this).val()));
			});
			
			$('#acct').keyup(function(){
				var $this = $(this);
				var acct = $this.val();
				
			});
			$('#acct').change(function(){
				var $this = $(this);
				$this[0].isChecked = false;
				AcctCheckAjax.reset();
				if(checkAcctJs()){
					AcctCheckAjax.ready(function(){
						$this[0].isChecked = true;
					});
				}
			});
			$('#pwd').change(function(){
				checkPwd();
			});
			
			
			
			
			$('#verifyCodeBtn').click(function(){
				hideMsg($(this).closest('.u-input'));
				if($('#acct')[0].isChecked){
					getCodeBtnClick(false);
				}else{
					checkAcctJs();
				}
			});
			
			
			$('#regBtn').click(register);
			//绑定enter键注册
			$dom.keydown(function(event){
				if(event.keyCode == 13 || event.which == 13){
					register();
		            event.preventDefault();
		        }
			});
			//若有浏览器自动补充内容，则触发change事件检查该值
			$dom.find('.u-input input').each(function(){
				var $this = $(this);
				if($this.val()){
					$this.change();
					if($this.attr('id') == 'acct'){
						$this.keyup();
					}
				}
			});
			
			function getCodeBtnClick(isMailAcct_mobile){
			
			    var $btn = $('#verifyCodeBtn');
			    var timeCtrl = $btn[0]._timeCtrl;
			    var cacct =  $.trim($("#acct").val());
			   				
				if(isMailAcct_mobile){
					$btn = $('#mobileCodeBtn');
					timeCtrl = $btn[0]._timeCtrl;
					cacct =  $.trim($("#mobile").val());
					acctType_s = 1;
				}

			    if(!timeCtrl){
			    	timeCtrl = {
						timer: null,
						second: 60,
						clickCnt: 0
					};
					$btn[0]._timeCtrl = timeCtrl;
			    }
			    if(timeCtrl.timer){
					return false;
				}
			    
			   
			   
		    	$btn.attr('disabled', 'disabled');
		    	
		    	sendValidateCode(isMailAcct_mobile, null, null, function(){
		    		$btn.removeAttr('disabled');
		    	});
			    
			}
		}
		
		function showErr($uInput, msg){
			$uInput.find('.msg').dragIn().addClass('z-err').find('font').html(msg);
		}
		function showSuc($uInput, msg){
			$uInput.find('.msg').show().removeClass('z-err').find('font').html(msg || '');
		}
		function hideMsg($uInput){
			$uInput.find('.msg').hide();
		}
		
		function checkAcctJs(){
			var $acct = $('#acct'),
				$uInput = $acct.closest('.u-input'),
				msg = '';
			var acct = $.trim($acct.val());
			var phreg = /^1[3|4|5|7|8][0-9]{9}$/;
			var flag = phreg.test(acct);
			
			if(!acct){
				msg = '请输入帐号';
			}else if(!flag){
				msg = '请输入正确的手机号码';
				
			}
			
			if(msg){
				showErr($uInput, msg);
				return false;
			}else{
				return true;
			}
		}
		
		function checkPwd(){
			var $pwd = $('#pwd');
				$uInput = $pwd.closest('.u-input'),
				msg = '';
			var pwd = $pwd.val();
			if(!pwd){
				msg = '请输入密码';
			}else if(pwd.length < 4 || pwd.length > 20){
				msg = '密码由4-20个字符组成，区分大小写';
			}
			
			if(msg){
				showErr($uInput, msg);
				return false;
			}else{
				showSuc($uInput);
				return true;
			}
		}
		
		function checkVerifyCode(){
			var $verCode = $('#verifyCode'),
				$uInput = $verCode.closest('.u-input'),
				msg = '';
			var verifyCode = $.trim($verCode.val());
			if(!$('#verifyCodeBtn')[0]._timeCtrl || $('#verifyCodeBtn')[0]._timeCtrl.clickCnt == 0){
				msg = '请先获取验证码';
			}else if(!verifyCode){
				msg = '请输入验证码';
			}else if(verifyCode.length != 4){
				msg = '请输入正确的验证码';
			}else if(verifyCode != faiEncrypt_key){
				msg = '验证码不正确';
			}
			
			if(msg){
				showErr($uInput, msg);
				return false;
			}else{
				showSuc($uInput);
				return true;
			}
		}
		
		
		
		
		
	
		
		function register(){
		    var $regBtn = $('#regBtn');
		   
		    $('#regMsg').text('');
		  
		    var $cacct = $('#acct');			//帐号
		    var cacctVal = $.trim($cacct.val());
		    var $pwd = $('#pwd');			//密码
		    var pwdVal = $pwd.val();
		 	var $verifyCode = $("#verifyCode");	//验证码
			var verifyCodeVal = $verifyCode.val();
		    
		  
		    
		    var valid = true;
		    //检查帐号
		    if(!checkAcctJs() || !$cacct[0].isChecked){
		    	valid = false;
		    	$cacct.focus();
		    	
		    	return false;
		    }
		    //检查密码
		    if(!checkPwd()){
		    	valid = false;
		    	$pwd.focus();
		    	return false;
		    }
		    //检查验证码
		    if($('#verifyCodeLine').is(':visible') && !checkVerifyCode()){
		    	valid = false;
		    	$verifyCode.focus();
		    	return false;
		    }
		   
			

		    $regBtn.attr('disabled', 'disabled');
		    $('#regMsg').text('正在提交注册信息，请稍候...');
		    //注册流程
		    //手机验证：mailReg_mobile
		    $.ajax({
		        type: "post",//使用post方法访问后台
		        url: '/index.php/Api/Add/add_user',
		        data:{
		        	phone: cacctVal,
		        	password: pwdVal
		        },
		        error: function(){
		            $regBtn.removeAttr('disabled');
		            $('#regMsg').text('服务繁忙，请稍候重试');
		            //$("#validateCode").val('');
		        },
		        success: function(result){
		        	
		            $regBtn.removeAttr('disabled');
		            $('#regMsg').text('');
		           
		            if(result == 1){
		                var cacct = $("#cacct").val();

						//注册成功
		              
		                
//			             top.location.href = result.url;//regStat.jsp是在site管理态下的iframe访问的...
						alert("注册成功");
						window.location.href = "/fankeweb/index.html";
		            }else{
		                $('#regMsg').text('验证码错误或已失效，请重新输入');        
		             
		            }
		        }
		    });
		}
	})();
	
	
	$.fn.dragIn = function(){
		var _this = this;
		_this.show().addClass('z-dragIn');
		setTimeout(function(){
			_this.removeClass('z-dragIn');
		}, 1000);
		return _this;
	};
	
	function sendValidateCode(isMailAcct_mobile, imgCode, callbackSuc, callbackErr){
	
    	var $btn = $('#verifyCodeBtn');
    	var $codeInput = $('#verifyCode');
    	var $codeMsg = $('#verifyCodeMsg');
    	var $resendNotice = $('#resendNotice1');
	    var timeCtrl = $btn[0]._timeCtrl;
	    var cacct =  $.trim($("#acct").val());
	
	    if(isMailAcct_mobile){
	    	$btn = $('#mobileCodeBtn');
	    	$codeInput = $('#mobileCode');
	    	$codeMsg = $('#mobileCodeMsg');
    		$resendNotice = $('#resendNotice2');
	    	timeCtrl = $btn[0]._timeCtrl;
	    	cacct =  $.trim($("#mobile").val());
	    }
	    if(!timeCtrl || timeCtrl.timer){
	    	return false;
	    }
    	
	    var cacctCode = '';
	    
	    
	    
    	$.ajax({
	        type:"post",
	        url:"/index.php/Api/Add/register",
	        data: {
	        	phone:cacct
	        },
	        error: function(){
	        	if(typeof callbackErr == 'function'){
                	callbackErr('系统繁忙');
                }
	        },
	        success: function(result){
	        	
	            if(result != ""){
	                faiEncrypt_key = result;
	              
	                //operatePopupVc('false');
	                $btn.attr('disabled', 'disabled');
	                clearInterval(timeCtrl.timer);
	                timeCtrl.clickCnt++;
	                timeCtrl.second = 60;
	                timeCtrl.timer = setInterval(function(){
	                	if(timeCtrl.second > 0){
	                		$btn.html('已发送(' + timeCtrl.second + ')');
	                		timeCtrl.second--;
	                	}else{
	                		$btn.html('重新获取').removeAttr('disabled');
	                		clearInterval(timeCtrl.timer);
	                		timeCtrl.timer = null;
	                	}
	                }, 1000);
	                
	                $btn.closest('.u-input').find('.msg').removeClass('z-err').show();
	                var cacctStr = cacct;
	                
                	var codeMsgHtml = '验证码已发送到' +  '手机' + cacctStr;
                	if(timeCtrl.clickCnt > 1){
                		
                		$resendNotice.html('若仍未收到验证码，请稍后再试');
                	
                		$resendNotice.show();
                	}
                	$codeMsg.html(codeMsgHtml);
	                
	                $codeInput.focus();
	                if(typeof callbackSuc == 'function'){
	                	callbackSuc();
	                }
	            }else{
	            	var msg = result.msg;
        			$btn.closest('.u-input').find('.msg').addClass('z-err').show();
        			$codeMsg.html(result.msg);
                		
                	
                	if(typeof callbackErr == 'function'){
	                	callbackErr(msg);
	                }
	            }
	        }
	    });
    }
	
	
	
	
