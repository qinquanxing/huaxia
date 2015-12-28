$(function(){
	var b_Width = $(document.body).width();
	if(b_Width < 800){
		$(".indexul li").css("width","32%");
	};
	if(b_Width < 540){
		$(".indexul li").css("width","50%");
	};
	//导航
	$(".nav li").click(function(){
		$(this).siblings().find("a").removeClass("click");
		$(this).find("a").addClass("click");
		
	});
	//首页
	
		$(".main_content li").hover(function(){
			$(this).addClass("hoverbg");
		},function(){
			$(this).removeClass("hoverbg");
		});
	
	
	//左侧导航
	$(".left dl:eq(0)").addClass("l_show").siblings().addClass("l_hide");	
	$(".left dd").hover(function(){
		$(this).addClass("l_bg");
	}, function(){
		$(this).removeClass("l_bg");
	});
	$(".left dt").click(function(){
		$(this).parents("dl").removeClass().addClass("l_show").siblings().removeClass().addClass("l_hide");	
	});
	$(".left dd").click(function(){
		$(this).addClass("l_bg2").siblings("dd").removeClass("l_bg2");;
	});
	//选项卡
//	$(".contents").eq(0).show();
	$(".sub_title li").click(function(index){
		var index = $(this).index();
		$(this).addClass("tab_on").siblings().removeClass("tab_on");
		//$(".contents").eq(index).show().siblings(".contents").hide();
	});
});











