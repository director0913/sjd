$(function(){
	
	
	var mhthns = ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'];
  	var msShort = ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'];
  	var dayn = ["日","一", "二", "三", "四", "五", "六"];
    $("#beginTime").datetimepicker({
	  dateFormat: 'yy-mm-dd', 
	  inline: true,
      monthNames: mhthns,  
      monthNamesShort: msShort,  
      dayNamesMin: dayn,
      changeMonth: true,
      changeYear: true
    });
    
    $("#endTime").datetimepicker({
	  dateFormat: 'yy-mm-dd', 
	  inline: true,
      monthNames: mhthns,  
      monthNamesShort: msShort,  
      dayNamesMin: dayn,
      changeMonth: true,
      changeYear: true
    });
		    
	$("#dp10").datepicker({
	  dateFormat: 'yy-mm-dd', 
	  inline: true,
      monthNames: mhthns,  
      monthNamesShort: msShort,  
      dayNamesMin: dayn,
      changeMonth: true,
      changeYear: true,
      showButtonPanel: true
    });
    
    $("#dp150").datepicker({
	  dateFormat: 'yy-mm-dd', 
	  inline: true,
      monthNames: mhthns,  
      monthNamesShort: msShort,  
      dayNamesMin: dayn,
      changeMonth: true,
      changeYear: true,
      showButtonPanel: true
    });
    $("#dp11").datepicker({
	  dateFormat: 'yy-mm-dd', 
	  inline: true,
      monthNames: mhthns,  
      monthNamesShort: msShort,  
      dayNamesMin: dayn,
      changeMonth: true,
      changeYear: true,
      showButtonPanel: true
    });
    
    $("#dp151").datepicker({
	  dateFormat: 'yy-mm-dd', 
	  inline: true,
      monthNames: mhthns,  
      monthNamesShort: msShort,  
      dayNamesMin: dayn,
      changeMonth: true,
      changeYear: true,
      showButtonPanel: true
    });
    $("#dp12").datepicker({
	  dateFormat: 'yy-mm-dd', 
	  inline: true,
      monthNames: mhthns,  
      monthNamesShort: msShort,  
      dayNamesMin: dayn,
      changeMonth: true,
      changeYear: true,
      showButtonPanel: true
    });
    
    $("#dp152").datepicker({
	  dateFormat: 'yy-mm-dd', 
	  inline: true,
      monthNames: mhthns,  
      monthNamesShort: msShort,  
      dayNamesMin: dayn,
      changeMonth: true,
      changeYear: true,
      showButtonPanel: true
    });
    $("#dp13").datepicker({
	  dateFormat: 'yy-mm-dd', 
	  inline: true,
      monthNames: mhthns,  
      monthNamesShort: msShort,  
      dayNamesMin: dayn,
      changeMonth: true,
      changeYear: true,
      showButtonPanel: true
    });
    
    $("#dp153").datepicker({
	  dateFormat: 'yy-mm-dd', 
	  inline: true,
      monthNames: mhthns,  
      monthNamesShort: msShort,  
      dayNamesMin: dayn,
      changeMonth: true,
      changeYear: true,
      showButtonPanel: true
    });
    $("#dp14").datepicker({
	  dateFormat: 'yy-mm-dd', 
	  inline: true,
      monthNames: mhthns,  
      monthNamesShort: msShort,  
      dayNamesMin: dayn,
      changeMonth: true,
      changeYear: true,
      showButtonPanel: true
    });
    
    $("#dp154").datepicker({
	  dateFormat: 'yy-mm-dd', 
	  inline: true,
      monthNames: mhthns,  
      monthNamesShort: msShort,  
      dayNamesMin: dayn,
      changeMonth: true,
      changeYear: true,
      showButtonPanel: true
    });
    
   
    
	layui.use('upload', function(){
	  var upload = layui.upload;
	   var socp = $("#sda").scope();
	  
	   	
	 var uploadInst = upload.render({
	    elem: '#selectPicHY0' //绑定元素
	    ,url: '/index.php/Api/Add/up_imgs' //上传接口
	    ,done: function(res){
	    	
	    	socp.params[socp.spindx].spimgs = "http://"+res.src;
	    	$("#gamePreviewPage").contents().find(".theRelateImgBox").eq(0).css("background-image","url(http://"+res.src+")");
	    	$("#gamePreviewPage").contents().find(".autoFitBoxer").css("background-image","url(http://"+res.src+")");
	    	
	    	$("#gamePreviewPage").contents().find(".theItemBox0").attr("src","http://"+res.src);
	    	$(".showImgBox").eq(0).children("img").attr("src","http://"+res.src);
	    	
	     
	    }
	    ,error: function(){
	       alert("失败")
	    }
	  });
	  
	  var uploadInst1 = upload.render({
	    elem: '#selectPicHY1' //绑定元素
	    ,url: '/index.php/Api/Add/up_imgs' //上传接口
	    ,done: function(res){
	    	socp.params[socp.spindx].spimgs = "http://"+res.src;
	    	$("#gamePreviewPage").contents().find(".theRelateImgBox").eq(1).css("background-image","url(http://"+res.src+")");
	    	$("#gamePreviewPage").contents().find(".theItemBox0").attr("src","http://"+res.src);
	    	$(".showImgBox").eq(1).children("img").attr("src","http://"+res.src);
	    }
	    ,error: function(){
	       alert("失败")
	    }
	  });
	  
	  var uploadInst2 = upload.render({
	    elem: '#selectPicHY2' //绑定元素
	    ,url: '/index.php/Api/Add/up_imgs' //上传接口
	    ,done: function(res){
	     	 socp.params[socp.spindx].spimgs = "http://"+res.src;
	    	$("#gamePreviewPage").contents().find(".theRelateImgBox").eq(2).css("background-image","url(http://"+res.src+")");
	    	$("#gamePreviewPage").contents().find(".theItemBox0").attr("src","http://"+res.src);
	    	$(".showImgBox").eq(2).children("img").attr("src","http://"+res.src);
	    }
	    ,error: function(){
	       alert("失败")
	    }
	  });
	  
	  var uploadInst3 = upload.render({
	    elem: '#selectPicHY3' //绑定元素
	    ,url: '/index.php/Api/Add/up_imgs' //上传接口
	    ,done: function(res){
	      	socp.params[socp.spindx].spimgs = "http://"+res.src;
	    	$("#gamePreviewPage").contents().find(".theRelateImgBox").eq(3).css("background-image","url(http://"+res.src+")");
	    	$("#gamePreviewPage").contents().find(".theItemBox0").attr("src","http://"+res.src);
	    	$(".showImgBox").eq(3).children("img").attr("src","http://"+res.src);
	    }
	    ,error: function(){
	       alert("失败")
	    }
	  });
	  
	  var uploadInst4 = upload.render({
	    elem: '#selectPicHY4' //绑定元素
	    ,url: '/index.php/Api/Add/up_imgs' //上传接口
	    ,done: function(res){
	     	socp.params[socp.spindx].spimgs = "http://"+res.src;
	    	$("#gamePreviewPage").contents().find(".theRelateImgBox").eq(4).css("background-image","url(http://"+res.src+")");
	    	$("#gamePreviewPage").contents().find(".theItemBox0").attr("src","http://"+res.src);
	    	$(".showImgBox").eq(4).children("img").attr("src","http://"+res.src);
	    }
	    ,error: function(){
	       alert("失败")
	    }
	  });
	  
	  
	  var uploadInsts = upload.render({
	    elem: '#AtentionBtn0' //绑定元素
	    ,url: '/index.php/Api/Add/up_imgs' //上传接口
	    ,done: function(res){
	     	socp.params[socp.spindx].spgcodimg = "http://"+res.src;
	    	
	    	$(".attentionImg").eq(0).children("img").attr("src","http://"+res.src);
	    }
	    ,error: function(){
	       alert("失败")
	    }
	  });
	  var uploadInsts1 = upload.render({
	    elem: '#AtentionBtn1' //绑定元素
	    ,url: '/index.php/Api/Add/up_imgs' //上传接口
	    ,done: function(res){
	     	socp.params[socp.spindx].spgcodimg = "http://"+res.src;
	    	
	    	$(".attentionImg").eq(1).children("img").attr("src","http://"+res.src);
	    }
	    ,error: function(){
	       alert("失败")
	    }
	  });
	  var uploadInsts2 = upload.render({
	    elem: '#AtentionBtn2' //绑定元素
	    ,url: '/index.php/Api/Add/up_imgs' //上传接口
	    ,done: function(res){
	     	socp.params[socp.spindx].spgcodimg = "http://"+res.src;
	    	
	    	$(".attentionImg").eq(2).children("img").attr("src","http://"+res.src);
	    }
	    ,error: function(){
	       alert("失败")
	    }
	  });
	  var uploadInsts3 = upload.render({
	    elem: '#AtentionBtn3' //绑定元素
	    ,url: '/index.php/Api/Add/up_imgs' //上传接口
	    ,done: function(res){
	     	socp.params[socp.spindx].spgcodimg = "http://"+res.src;
	    	
	    	$(".attentionImg").eq(3).children("img").attr("src","http://"+res.src);
	    }
	    ,error: function(){
	       alert("失败")
	    }
	  });
	  var uploadInsts4 = upload.render({
	    elem: '#AtentionBtn4' //绑定元素
	    ,url: '/index.php/Api/Add/up_imgs' //上传接口
	    ,done: function(res){
	     	socp.params[socp.spindx].spgcodimg = "http://"+res.src;
	    	
	    	$(".attentionImg").eq(4).children("img").attr("src","http://"+res.src);
	    }
	    ,error: function(){
	       alert("失败")
	    }
	  });
	  
	  var uploadInstst = upload.render({
	    elem: '#QRloadButton' //绑定元素
	    ,url: '/index.php/Api/Add/up_imgs' //上传接口
	    ,done: function(res){
	     	socp.gjconf.cndbtnimg = "http://"+res.src;
	    	
	    	$(".QRImg").children("img").attr("src","http://"+res.src);
	    }
	    ,error: function(){
	       alert("失败")
	    }
	  });
	 
	 
	  //执行实例
	 
	});
	
	
	
//	 function select(a){
//      return  $('.theSpecialDesigan').eq(a).click();
//  }
//	 for (var i=0; i<=5; i++){
//	  $("#selectPicHY"+i).on("click", "#file_upload_1-button", clickHandlers);
//	 }
//	 
//	 
//	 $(".theSpecialDesigan").on("change", msfile);
//	 
//	 
//	 function clickHandlers(evt) {
//	 	var socp = $("#sda").scope();
//	 	
//	 	select(socp.spindx);
//	 }
	 

//	function msfile(){
//		var socp = $("#sda").scope();
//		var a = $(this).val();
//		
//		$.ajax({
//	        type: "post",//使用post方法访问后台
//	        url: '/index.php/Api/Add/up_imgs',
//	        data:{
//	        	imgs: a
//	        },
//	        error: function(){
//	            alert("上传失败")
//	            //$("#validateCode").val('');
//	        },
//	        success: function(result){
//	        	alert(result);
//	           socp.params[socp.spindx].spimgs = "//www.baidu.com/image/qrcodeImg.jpg";
//	            
//	        }
//	    });
//		
//	}
	
	var spindx = 0;
	var socps = $("#sda").scope();
	$(".topBar").on("click",".column",function(){
		spindx = $(this).index()
		intonext(spindx);
	})
	$("#changeLeft").click(function(){
		if(spindx < 1){
			spindx = 8;
		}
		var prindx = (spindx-=1);
		intonext(prindx);
	})
	$("#changeRight").click(function(){
		if(spindx > 6){
			spindx = -1;
		}
		var ntindx = (spindx+=1);
		intonext(ntindx);
	})
	$("#activeTab").on("click",".tabSetting",function(){
		$(".tabSetting").removeClass("checked");
		$(this).addClass("checked");
		var mopt = $(this).index();
		$(".settingBox").hide();
		$(".settingBox").eq(mopt).show();
			
	})
	
	$('#name').blur(function() {
		
		if($.trim($(this).val()) == ""){
			$(this).addClass("inputErr");
			socps.inpus = false;
			isdisbled();
		}else{
			$(this).removeClass("inputErr");
			disdisbled();
			socps.inpus = true;
		}
	    
	});
	
	$('.awardDescribe ').blur(function() {
		
		if($.trim($(this).val()) == ""){
			$(this).addClass("inputErr");
			socps.inpus = false;
			isdisbled();
		}else{
			$(this).removeClass("inputErr");
			disdisbled();
			socps.inpus = true;
		}
	    
	});
	$('.awardOptInfo').blur(function() {
		
		if($.trim($(this).val()) == ""){
			$(this).addClass("inputErr");
			socps.inpus = false;
			isdisbled();
		}else{
			$(this).removeClass("inputErr");
			disdisbled();
			socps.inpus = true;
		}
	    
	});
	$('.awardCashSite').blur(function() {
		
		if($.trim($(this).val()) == ""){
			$(this).addClass("inputErr");
			socps.inpus = false;
			isdisbled();
		}else{
			$(this).removeClass("inputErr");
			disdisbled();
			socps.inpus = true;
		}
	    
	}); 
	$('.awartBtnTitle').blur(function() {
		
		if($.trim($(this).val()) == ""){
			$(this).addClass("inputErr");
			socps.inpus = false;
			isdisbled();
		}else{
			$(this).removeClass("inputErr");
			disdisbled();
			socps.inpus = true;
		}
	    
	});
	$('#menuName').blur(function() {
		
		if($.trim($(this).val()) == ""){
			$(this).addClass("inputErr");
			socps.inpus = false;
			isdisbled();
		}else{
			$(this).removeClass("inputErr");
			disdisbled();
			socps.inpus = true;
		}
	    
	});
	
	$('#hideJoinNum').change(function() {
	    $("#gamePreviewPage").contents().find("#joinNumLine").hide();
	});
	$('#showJoinNum').change(function() {
	 	$("#gamePreviewPage").contents().find("#joinNumLine").show();
	});
	
	$('#virtualJoinNum').on('input propertychange', function() {
		$(this).val($(this).val().replace(/[\D]/g, ""));
	  $("#gamePreviewPage").contents().find('#joinNum').html($(this).val());
	}).blur(function(){
		
		if($.trim($(this).val()) == ""){
			
			$(this).val("0");
			
		}
	});
	
	$('#theLimitNum').on('input propertychange', function() {
		$(this).val($(this).val().replace(/[\D]/g, ""));
	  
	}).blur(function(){
		
		if($.trim($(this).val()) == ""){
			
			$(this).val("0");
			
		}
	});
	
	$('#cutDownTotalTimes').on('input propertychange', function() {
		$(this).val($(this).val().replace(/[\D]/g, ""));
	  
	}).blur(function(){
		
		if($.trim($(this).val()) == ""){
			
			$(this).val("0");
			
		}
	});
	
	$('.awardAmount').on('input propertychange', function() {
		$(this).val($(this).val().replace(/[\D]/g, ""));
	  
	}).blur(function(){
		
		if($.trim($(this).val()) == ""){
			$(this).addClass("inputErr");
			socps.inpus = false;
			isdisbled();
		}else{
			$(this).removeClass("inputErr");
			disdisbled();
			socps.inpus = true;
		}
	});
	 
	$('.awardPrice').on('input propertychange', function() {
		$(this).val($(this).val().replace(/[\D]/g, ""));
	  
	}).blur(function(){
		
		if($.trim($(this).val()) == ""){
			$(this).addClass("inputErr");
			socps.inpus = false;
			isdisbled();
		}else{
			$(this).removeClass("inputErr");
			disdisbled();
			socps.inpus = true;
		}
	});
	
	$('.awardTarget').on('input propertychange', function() {
		$(this).val($(this).val().replace(/[\D]/g, ""));
	  
	}).blur(function(){
		
		if($.trim($(this).val()) == ""){
			$(this).addClass("inputErr");
			socps.inpus = false;
			isdisbled();
		}else{
			$(this).removeClass("inputErr");
			disdisbled();
			socps.inpus = true;
		}
	});
	
	$('.needHelpPeople').on('input propertychange', function() {
		$(this).val($(this).val().replace(/[\D]/g, ""));
	  
	}).blur(function(){
		
		if($.trim($(this).val()) == "" || $(this).val() < 1){
			$(this).addClass("inputErr");
			socps.inpus = false;
			isdisbled();
		}else{
			$(this).removeClass("inputErr");
			disdisbled();
			socps.inpus = true;
		}
	});
	
	
	
	$('#activeExplain').on('input propertychange', function() {
	  $("#gamePreviewPage").contents().find('#exlainInfo').html($(this).val());
	});
//	
	$('#beginTime').on('change', function() {
		
	  $("#gamePreviewPage").contents().find('#startDate').html($(this).val());
	});
	$('#endTime').on('change', function() {
	  $("#gamePreviewPage").contents().find('#endDate').html($(this).val());
	});
	

	
	
	
	$('.awardDescribe').on('input propertychange', function() {
	  	var socp = $("#sda").scope();
		
		$("#gamePreviewPage").contents().find('.giftName').eq(socp.spindx).html($(this).val());
		$("#gamePreviewPage").contents().find('.theAwardDetail').html($(this).val());
		$("#gamePreviewPage").contents().find('.theAwardInfo').children("span").html($(this).val());
		$("#gamePreviewPage").contents().find('.award').eq(socp.spindx).html($(this).val());
		$("#gamePreviewPage").contents().find('.awardName').html($(this).val());
		
		if(socp.spindx == 0){
			$("#gamePreviewPage").contents().find('#giftNames').html($(this).val());
		}
		
	});
	
	$('.awardAmount').on('input propertychange', function() {
	  	var socp = $("#sda").scope();
		
		$("#gamePreviewPage").contents().find('.theEdtNms').eq(socp.spindx).html($(this).val());
		if(socp.spindx == 0){
			$("#gamePreviewPage").contents().find('#mtheEditNums').html($(this).val());
			$("#gamePreviewPage").contents().find('.mtheLsNum').html($(this).val());
			
		}
	});
	
	$('.awardPrice').on('input propertychange', function() {
	  	var socp = $("#sda").scope();
		
		$("#gamePreviewPage").contents().find('.amtPrenm').eq(socp.spindx).html($(this).val());
		if(socp.spindx == 0){
			$("#gamePreviewPage").contents().find('.mamtPrenm').html($(this).val());
			$("#gamePreviewPage").contents().find('.theOriginalPrice').html($(this).val());
			
		}
	});
	
	$('.awardTarget').on('input propertychange', function() {
	  	var socp = $("#sda").scope();
		
		$("#gamePreviewPage").contents().find('.theCutnPre').eq(socp.spindx).html($(this).val());
		if(socp.spindx == 0){
			$("#gamePreviewPage").contents().find('.mtheCutnPre').html($(this).val());
			$("#gamePreviewPage").contents().find('.theTargetPrice').html($(this).val());
			
		}
	});
	
	$('.awardOptInfo').on('input propertychange', function() {
	  	var socp = $("#sda").scope();
		
		$("#gamePreviewPage").contents().find('.layerId-28').html($(this).val());
		
	});
	
	$('.awardCashSite').on('input propertychange', function() {
	  	var socp = $("#sda").scope();
		
		$("#gamePreviewPage").contents().find('.address').html($(this).val());
		
	});
	$('.awardSubTile').on('input propertychange', function() {
	  	var socp = $("#sda").scope();
		
		$("#gamePreviewPage").contents().find('.layerId-21').html($(this).val());
		
	});
	$('.servicePhone').on('input propertychange', function() {
	  	var socp = $("#sda").scope();
		
		
		$("#gamePreviewPage").contents().find('.phoneText').html($(this).val());
		
	});
	$('.cashInfoContent').on('input propertychange', function() {
	  	var socp = $("#sda").scope();
		
		$("#gamePreviewPage").contents().find('.notice').children("pre").html($(this).val());
		
	});
	$('.awartBtnTitle').on('input propertychange', function() {
	  	var socp = $("#sda").scope();
		
		$("#gamePreviewPage").contents().find('.textDef1').html($(this).val());
		
	});
	$('.menuName').on('input propertychange', function() {
	  	var socp = $("#sda").scope();
		
		$("#gamePreviewPage").contents().find('.menuName').html($(this).val());
		
	});
	
	
})

function isdisbled(){
	$("#savePubButon").addClass("disabled");
	$("#saveButon").addClass("disabled");
}

function disdisbled(){
	$("#savePubButon").removeClass("disabled");
	$("#saveButon").removeClass("disabled");
}

function intonext(scindx){
		$(".column").removeClass("checked");
		$(".column").eq(scindx).addClass("checked");
		$("#topBardSlide").css("left",scindx*90);
		if(scindx == 0){
			$("#gamePreviewPage").contents().find(".myDetailPage").show();
			$("#gamePreviewPage").contents().find(".cutDownPriceDetail").hide();
			$("#gamePreviewPage").contents().find(".myRealDetailPage").hide();
			$("#gamePreviewPage").contents().find(".cutDownPriceHelperList").hide();
			$("#gamePreviewPage").contents().find(".gameBox").hide();
			  
		}
		if(scindx == 1){
			$("#gamePreviewPage").contents().find(".myRealDetailPage").show();
			$("#gamePreviewPage").contents().find(".myDetailPage").hide();
			$("#gamePreviewPage").contents().find(".timeTipsShowBox").hide();
			$("#gamePreviewPage").contents().find(".cutDownPriceDetail").hide();
			$("#gamePreviewPage").contents().find(".gameBox").hide();
			 
		}else{
			$("#gamePreviewPage").contents().find(".timeTipsShowBox").show();
		}
		
		if(scindx == 2){
			$("#gamePreviewPage").contents().find(".cutDownPriceDetail").show();
		}
		
		if(scindx == 3){
			$("#gamePreviewPage").contents().find(".myRealDetailPage").hide();
			$("#gamePreviewPage").contents().find(".myDetailPage").hide();
			$("#gamePreviewPage").contents().find(".cutDownPriceDetail").hide();
			$("#gamePreviewPage").contents().find(".gameBox").show();
			$("#gamePreviewPage").contents().find(".myCutDownPriceList").show();
			$("#gamePreviewPage").contents().find(".cutDownPriceHelperList").hide();
		}
		if(scindx == 4){
			$("#gamePreviewPage").contents().find(".myRealDetailPage").hide();
			$("#gamePreviewPage").contents().find(".myDetailPage").hide();
			$("#gamePreviewPage").contents().find(".cutDownPriceDetail").hide();
			$("#gamePreviewPage").contents().find(".myCutDownPriceList").hide();
			$("#gamePreviewPage").contents().find(".gameBox").show();
			$("#gamePreviewPage").contents().find(".cutDownPriceHelperList").show();
		}
		if(scindx == 5){
			$("#gamePreviewPage").contents().find("#popTabBox").css("left","0px");
			$("#gamePreviewPage").contents().find("#actionExpBtn").addClass("checked");
			$("#gamePreviewPage").contents().find("#prizeBtn").removeClass("checked");
			$("#gamePreviewPage").contents().find("#poupInfoBox").show();
			$("#gamePreviewPage").contents().find(".slideBarTip").css("left","1.7rem");
		}else if(scindx != 5 || scindx != 6){
			$("#gamePreviewPage").contents().find("#poupInfoBox").hide();
		}
		if(scindx == 6){
			$("#gamePreviewPage").contents().find("#poupInfoBox").show();
			$("#gamePreviewPage").contents().find("#actionExpBtn").removeClass("checked");
			$("#gamePreviewPage").contents().find("#prizeBtn").addClass("checked");
			$("#gamePreviewPage").contents().find("#popTabBox").css("left","-320px");
			$("#gamePreviewPage").contents().find(".slideBarTip").css("left","8.325rem");
			
		}
		if(scindx == 7){
			$("#gamePreviewPage").contents().find("#awardDetailBox").show();
		}else{
			$("#gamePreviewPage").contents().find("#awardDetailBox").hide();
		}
	}

function hdback(){  		

	parent.$("#hdcontent").show();
	parent.$("#editActive").hide();
	
}
