$(function(){
	
	gethd(getuserid,10,1);
	
	$(".dropDownArea").change(function(){
		pagsa($(this).val());
		gethd(getuserid,$(this).val(),1);
	})
	
	
})	
function getuserid(){
	var lcsess = sessionStorage.getItem("_reguser_id");
	var userxx = JSON.parse(lcsess);
	return userxx.user_id;
}
var pgs = 1;
var a = 1;
var mypags = 10;
function pagsa(a){
	mypags = a;
}

function prvpag(){
	
	
	gethd(getuserid,mypags,--pgs);
}

function nextpag(){
	
	gethd(getuserid,mypags,++pgs);
}

function hdsty(a){
	var b;
	if(a == 0){
		b = "<div style='color:#999;'>未发布</div>";
	}else if( a == 1){
		b = "<div style='color:#64cea6;'>进行中</div>";
	}else{
		b = "<div style='color:#fe896a;'>已结束</div>";
	}
	return b;
}

function hdx(a){
	var b;
	if(a == 0){
		b = "不限制";
		return b;
	}else{
		return a;
	}
	
}
			
function gethd(cods,num,page){
	
	if(pgs < 1){
		pgs = 1;
		return false;
	}else if(pgs > a){
		--pgs;
		return false;
	}
	var pags;
	
	var mpags = num;
	
	$.ajax({
        type:"get",
        url:"/index.php/Api/Cutdown/my_activity_list",
        data: {
        	user_id:cods,
        	num:num,
        	page:page
        },
        error: function(){
        	alert("服务器繁忙");
        },
        success: function(result){
        	var changePwdTwo = [];
        	
        	pags = result.num;
        
        	for(var i = 0; i<result.res.length; i++){
        		changePwdTwo.push("<tr _index='1' class='odd'>");
				changePwdTwo.push("	<td class='textLeft active_activeName ellipsis'>");
				changePwdTwo.push("		<div class='padding ellipsis tdWrap'>");
				changePwdTwo.push("	<div>");
				changePwdTwo.push("	<div class='imgBox'><img src='img/AAEIABACGAAg-qyM0gUo_eqN7QIwwgM4_gE.jpg' style='width:100%;'></div>");
				changePwdTwo.push("	<div style='display: inline-block; vertical-align: middle;max-height: 48px; width: 105px; overflow: hidden;'>"+result.res[i].title+"</div>");
				changePwdTwo.push("	</div></div></td>");
				changePwdTwo.push("	<td class='textCenter ellipsis tmpShowHoverTips'>");
				changePwdTwo.push("	<div class='padding ellipsis tdWrap'>"+result.res[i].ac_create_time+"</div>");
				changePwdTwo.push("</td>");
				changePwdTwo.push("	<td class='textCenter ellipsis tmpShowHoverTips'>");
				changePwdTwo.push("	<div class='padding ellipsis tdWrap'>"+result.res[i].start_time+"<br>"+result.res[i].end_time+"</div>");
				changePwdTwo.push("</td>");
				changePwdTwo.push("	<td class='textCenter ellipsis tmpShowHoverTips'>");
				changePwdTwo.push("	<div class='padding ellipsis tdWrap'>");
				changePwdTwo.push(hdsty(result.res[i].if_send));
				changePwdTwo.push("</div></td>");
				changePwdTwo.push("<td class='textCenter ellipsis tmpShowHoverTips'>");
				changePwdTwo.push("	<div class='padding ellipsis tdWrap'>"+hdx(result.res[i].partic)+"</div>");
				changePwdTwo.push("</td>");
				
				changePwdTwo.push("<td class='textRight ellipsis tmpShowHoverTips'>");
				changePwdTwo.push("<div class='padding ellipsis tdWrap'>");
				changePwdTwo.push("<div class='textRight'>");
				if(result.res[i].if_send == 0){
					changePwdTwo.push("<span style=''>");
					changePwdTwo.push("<a href='#' class='publishStyle highlight' id='publishBtn '  onclick='showPublishBox("+result.res[i].ac_id+","+result.res[i].if_send+");return false;'>发布</a>");
					changePwdTwo.push("</span>");
				}else if(result.res[i].if_send == 1){
					
					changePwdTwo.push("<span >");
					changePwdTwo.push("<a href='#' onclick='showPublishBox("+result.res[i].ac_id+","+result.res[i].if_send+");return false;'>结束</a>");
					changePwdTwo.push("</span>");
				}else{
					changePwdTwo.push("	");
				}
				
				

				changePwdTwo.push("	<a href='#' class='actLink' onclick='fromLink("+result.res[i].ac_id+"); return false;'>预览</a>");
				changePwdTwo.push("	<a href='#' class='actLink' onclick='dlet("+result.res[i].ac_id+"); return false;'>删除</a>");
				changePwdTwo.push("	</div></div></td></tr>");	
        	}
			var myyes = pags/mpags;
			a = Math.ceil(myyes)
			
			if(a <= 1 && page == 1){
				$(".prevPage").removeClass("pointer");
				$(".nextPage").removeClass("pointer");
				$(".prevPage").addClass("disabledBtn");
				$(".nextPage").addClass("disabledBtn"); 
			}else if(a == page){
				$(".prevPage").removeClass("disabledBtn");
				$(".nextPage").removeClass("pointer");
				$(".prevPage").addClass("pointer");
				$(".nextPage").addClass("disabledBtn"); 
			}else if(a > 1 && page == 1){
				$(".prevPage").removeClass("pointer");
				$(".nextPage").removeClass("disabledBtn");
				$(".prevPage").addClass("disabledBtn");
				$(".nextPage").addClass("pointer"); 
			}else{
				$(".prevPage").removeClass("disabledBtn");
				$(".nextPage").removeClass("disabledBtn");
				$(".prevPage").addClass("pointer");
				$(".nextPage").addClass("pointer"); 
			}
			
			$(".currentPage").html(pgs+"/"+a);
			$(".allTotal").html("共有 "+pags+" 条记录 ，每页显示");
			$("#mhds").html(changePwdTwo.join(""));
           
        }
    });
}

function showPublishBox(a,b){
	
	$.ajax({
        type: "post",//使用post方法访问后台
        url: '/index.php/Api/Cutdown/fb',
        data:{
        	ac_id: a,
        	if_send: (b+1)
        },
        error: function(){
            alert("失败")
            //$("#validateCode").val('');
        },
        success: function(result){
        	
          if(result == 1){
          	alert("操作成功");
          	gethd(getuserid,10,1);
          }
            
        }
    });
}
function endActive(a){
	
}

function fromLink(a){
	var lcsess = sessionStorage.getItem("_reguser_id");
	var userxx = JSON.parse(lcsess);
	
	$.ajax({
        type: "get",//使用post方法访问后台
        url: '/index.php/Api/Cutdown/preview_link',
        data:{
        	ac_id: a,
        	user_id: userxx.user_id
        },
        error: function(){
            alert("失败")

        },
        success: function(result){
        	console.log(result);
          var b = "/index.php/Api/Cutdown/preview_ercode?ac_id="+a+"&user_id="+userxx.user_id;
	      parent.$(".bg-mask").show();
	      parent.$("#yl").show();
	      parent.$("#ylimg").attr("src",b);
	      parent.$("#yldz").html("地址:  "+result);
            
        }
    });
    
}
function dlet(a){
	$.ajax({
        type: "post",//使用post方法访问后台
        url: '/index.php/Api/Cutdown/hd_del',
        data:{
        	ac_id: a
        	
        },
        error: function(){
            alert("失败")

        },
        success: function(result){
        	
          if(result == 1){
          	alert("删除成功");
          	gethd(getuserid,10,1);
          }
            
        }
    });
}

