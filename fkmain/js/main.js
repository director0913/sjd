$(function(){
	var lcsess = sessionStorage.getItem("_reguser_id");
	
	var userxx = JSON.parse(lcsess);
	if(lcsess == null){
		window.location.href = "/fankeweb/index.html";
	}
	console.log(userxx)
	$(".corpAccount").html(userxx.phone)
	$(".cityName").html(userxx.city)
	$(".sexName").html(userxx.sex==1?'男':'女')
	
	 
	$('#hdManageLeft').on('click','.leftUtil',function(){
		$('.leftUtil').removeClass('hoverChecked checked');
		$(this).addClass("hoverChecked checked");
	
		load($(this).index());
	})
	$(".companySummary").hover(function(){
		$(".companySummaryWindow").show();
	},function(){
		$(".companySummaryWindow").hide();
	})
	
	var taburl= [];
	function load(index){
		taburl = ['/fkmain/newprj.html',
				  '/fkmain/myhd.html',
				  '/fkmain/hexiao.html'
				 
		]
		$("#manageFramePage").attr('src',taburl[index]);
		
	}
})
function ext(){
	
	sessionStorage.clear();
	window.location.href = "/fankeweb/index.html"
}
