
function isMobile(mobile){
	var pattern = /^1[3456789]\d{9}$/;
	return pattern.test(mobile);
}
var cacct = "";
var sacct = "";
var lcsess = "";

	$(function(){			
			lcsess = sessionStorage.getItem("_reguser_id");
			
			if(lcsess != null){
				window.location.href = "/fkmain/main.html"
			}
			
			
		$('#log-cacct').focus(function(){
			
			checkFocus( 'log-cacct' );
		}).blur(function(){
			var acctVal = $(this).val().replace(/\s+/g, '');
			$(this).val(acctVal);
			checkFocus( 'log-cacct' );
		}).keydown(function(event){
			checkFocus( 'log-cacct' );
			if( event.keyCode == 13 ){
				var acctVal = $(this).val().replace(/\s+/g, '');
				$(this).val(acctVal);
				login();
			}
		}).keyup(function(){
			checkFocus( 'log-cacct' );
		})
	
		$('#log-sacct').focus(function(){
			checkFocus( 'log-sacct' );
		}).blur(function(){
			checkFocus( 'log-sacct' );
		}).keydown(function(event){
			checkFocus( 'log-sacct' );
			if( event.keyCode == 13 ){
				login();
			}
		}).keyup(function(){
			checkFocus( 'log-sacct' );
		})
		
		$('#log-pwd').focus(function(){
			checkFocus( 'log-pwd' );
		}).blur(function(){
			checkFocus( 'log-pwd' );
		}).keydown(function(event){
			checkFocus( 'log-pwd' );
			if( event.keyCode == 13 ){
				login();
			}
		}).keyup(function(){
			checkFocus( 'log-pwd' );
		})
		
		
		$('#login-button').click(function(){
			login();
		});
		$('#login-button').hover(function(){
			$(this).addClass("loginBtn-hover");
		}, function(){
			$(this).removeClass("loginBtn-hover");
		});
		$('#reg-button, #reg-link').click( reg );
		$('#reg-button').hover(function(){
			$(this).addClass("regBtn-hover");
		}, function(){
			$(this).removeClass("regBtn-hover");
		});
		
		
		
		checkFocus( 'log-cacct' );
		checkFocus( 'log-pwd' );
		setTimeout(autoFocus, 50);
		
});

	function autoFocus(){
		$('#log-cacct, #log-sacct, #log-pwd').filter(':visible').each(function(){
			var $this = $(this);
			if($this.val() == ''){
				$this.focus();
				checkFocus($this.attr('id'));
				return false;
			}
		});
	}
	
	function checkFocus( id ){
		var input = $('#' + id),
			val = input.val();
		if (id != "log-pwd"){
			val = $.trim(val);
		}
		$('#log-form').find('input.log-input').removeClass('input1');
		var txt = input.parent().children('.log-txt');
		$('.log-txt').removeClass("log-txt-hover");
		txt.addClass('log-txt-hover');
		$('.log-line').removeClass("log-line-hover");
		if ( id != "log-valid" ){
			input.parent().addClass("log-line-hover");
		}
		if( val == '' ){
			txt.show();
		
		}else{
			txt.hide();
//		
		}
//		
	}
	
	

	function useSacct() {
		if ( $('#staff-login').prop("checked") ){
			$('#rowCacct .log-txt').text("帐号");
			$('#rowSacct').show();
		} else {
			$('#rowCacct .log-txt').text("帐号/手机号码");
			$('#rowSacct').hide();
		}
		autoFocus();
	}
	
	function login(){
		
		var me = $('#login-button');
		if( me.hasClass('disabled') ){
			return;
		}
		
		cacct = $('#log-cacct').val();
		var sacct = $('#log-sacct').val();
		var pwd = $('#log-pwd').val();
		var valid = $('#log-valid').val();
		var autoLogin = $('#auto-login').prop('checked');
		
		var staffLogin = $('#staff-login').prop("checked");
		if( !cacct ){
			showMsg( '请输入帐号' );
			$('#log-cacct').focus();
			return;
		}
		if(staffLogin){
			if(!checkLoginAcct(cacct)){
				showMsg( '请输入正确的帐号' );
				$('#log-cacct').focus();
				return;
			}
//		}else{
//			if(Fai.isNumber(cacct)){
//				if(cacct.length != 11){
//					showMsg( '请输入正确的手机号码' );
//					$('#log-cacct').focus();
//					return;
//				}
//			}
		}
		
		if( !pwd ){
			showMsg( '请输入密码' );
			$('#log-pwd').focus();
			return;
		}
		
//		
		
		me.addClass( 'disabled' ).html('正在登录...');
		showMsg('');
		
		$.ajax({
			type: 'post',
			url: '/index.php/Api/Add/user_login',
			data: {
				phone: cacct,
				password: pwd
			},
			error: function(){
				me.removeClass( 'disabled' ).html('登&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;录');
				showMsg( '服务繁忙，请稍候重试' );
			},
			success: function(result){
				
				
				
				
				if( result ){
					if( result != 0){
						// ## START success ##
						
						sessionStorage.setItem("_reguser_id",JSON.stringify(result));
						
						
						window.location.href = "/fkmain/main.html";
						// ## END success ##
					}else{
						// ## START error ##
						
						var msg = '密码或者账号错误';
						
						showMsg( msg );
						
						me.removeClass( 'disabled' ).html('登&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;录');
						// ## END error ##
					}
				}else{
					showMsg( '连接超时，请重试' );
					me.removeClass( 'disabled' ).html('登&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;录');
				}
			}
		})
	}
	

	function reg(){
		var reg_url = '/fankeweb/weix.html';
		top.location.href = reg_url;
	}
	
	function showMsg(msg){
		$('#error').text( msg ).show();
		if($.trim(msg) == '' || msg == null){
			$('#error').hide();
		}
	}
	
	function openPassword(){
		var cacct = $('#log-cacct').val();
		window.open("/fankeweb/newspassword.html");
	}

	


	function checkLoginAcct(cacct){
		var checkThrough = true;
		var reg = /[\u4e00-\u9fa5]/g;
		if (reg.test(cacct)){
			checkThrough = false;
			return checkThrough;
		} else {
			reg = /^[a-zA-Z0-9]+$/g;
			if (!reg.test(cacct)){
				checkThrough = false;
				return checkThrough;
			} else {
				reg = /^[0-9]/;
				if (reg.test(cacct)){
					checkThrough = false;
					return checkThrough;
				} else {
					if(cacct.length < 4){
						checkThrough = false;
						return checkThrough;
					}
					if(cacct.length > 30){
						checkThrough = false;
						return checkThrough;
					}
				}
			}
		}
		return checkThrough;
	}

