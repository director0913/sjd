$(function(){
	var lcsess = sessionStorage.getItem("_reguser_id");
	var userxx = JSON.parse(lcsess);
	$(".searchBtn").click(function(){
		gethx(userxx.user_id,$(".searchInput").val());
	});
	
	$('.searchInput').bind('keypress',function(event){ 
         
          
         if(event.keyCode == 13){  
           gethx(userxx.user_id,$(".searchInput").val());
         }  

     });
     
})

function gethx(a,b){
	 $.ajax({
        type: "post",//使用post方法访问后台
        url: '/index.php/Api/Cutdown/write_off',
        data:{
        	userid: a,
        	code: b
        	
        },
        error: function(){
            alert("失败")
           

        },
        success: function(result){
        	console.log(result)
        	
        	var changePwdTwo = [];
        	if(result.order != null){
        		changePwdTwo.push("<tr class='queryIngTr odd' style='border-top: 1px solid #e7e7e7;'>");
				changePwdTwo.push("<td class='padding' >"+result.order.get_code+"</td>");
				changePwdTwo.push("	<td class='padding' >"+result.order.com_name+"</td>");
				changePwdTwo.push("	<td class='padding' >"+result.customer.user_name+"</td>");
				changePwdTwo.push("	<td class='padding' >"+result.order.success_time+"</td>");
				changePwdTwo.push("	<td class='padding' >"+jmcod(result.order.if_prize)+"</td>");
				if(result.order.if_prize == 1){
					changePwdTwo.push("	<td class='padding' >--</td>");
					
				}else{
					changePwdTwo.push("	<td class='padding' ><a href='#' class='actLink' style='color: #74b7e6;' onclick='hexet("+result.order.or_id+"); return false;'>核销</a></td>");
				}
				
				changePwdTwo.push("	</tr>");
        	}else{
        		changePwdTwo.push("<tr class='queryIngTr odd' style='border-top: 1px solid #e7e7e7;'>");
				changePwdTwo.push("<td class='padding'  colspan='6' >没有数据</td>");
			
				changePwdTwo.push("	</tr>");
        	}
        	
			
         	$("#hxnr").html(changePwdTwo.join(""));
            
        }
    }); 
}

function jmcod(a){
	var b;
	if(a == 0){
		b = "<div style='color:#64cea6;'>未核销</div>";
	}else{
		b = "<div style='color:#fe896a;'>已核销</div>";
	}
	return b;
}

function hexet(a){
	var lcsess = sessionStorage.getItem("_reguser_id");
	var userxx = JSON.parse(lcsess);
	
	$.ajax({
        type: "post",//使用post方法访问后台
        url: '/index.php/Api/Cutdown/do_write_off',
        data:{
        	or_id: a
        },
        error: function(){
            alert("失败")
        },
        success: function(result){
        	console.log(result)
        	if(result == 1){
        		alert("核销成功");
        		gethx(userxx.user_id,$(".searchInput").val());
        	}else{
        		alert("核销失败");
        	}
        	
            
        }
    }); 
}
