//@charset utf-8
$("document").ready(function(){
	$(".short-btn").click(function(){
			//checkLongUrl();
			sendUrl();
	});
	$(".back-btn").click(function(){
		getUrl();
	});
});
function sendUrl(){   //申请生成短网址
	var short_val = $("#url-short").val();
	var diy_val   = $(".diy-url").val()?$(".diy-url").val():'';
	if(!short_val){
		alert('请输入长链接');
		return false;
	}
	if(diy_val){
		data = {"long_url":short_val,"diy_url":diy_val};
		alert(diy_val);
	}else{
		data = {"long_url":short_val};
	}
	$.ajax({
		url:"./api/getUrl.php",
		dataType:"json",
		data:data,
		success:function(data){
			if(data.msg){
				alert(data.msg);
			}else{
			$('.out-content').append("<p>"+data.url+"</p>");				
			}
		}
	});
}
function getUrl(){ //用短网址查询原网址
	var back_val  = $('#url-back').val();
	if(!back_val){
		alert('请输入短链接');
		return false;
	} 
	var data = {"short_url":back_val};
	$.ajax({
		url:"./api/selectUrl.php",
		dataType:"json",
		data:data,
		success:function(data){
			$('.out-content1').append("<p>"+data.url+"</p>");
		}
	});

}