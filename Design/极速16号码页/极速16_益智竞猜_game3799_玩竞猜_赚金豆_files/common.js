(function($){

	//所有游戏浮层
	$(".all-game").hover(function(){
		$(".game-box").show();
	},function(){
		$(".game-box").hide();
	});

	$(".game-box").hover(function(){
		$(".game-box").show();
		$(".all-game").removeClass("hover-color").addClass("hover-color");
	},function(){
		$(".game-box").hide();
		$(".all-game").removeClass("hover-color");
	});


    //form表单提交提示信息
    if($(".form-error").length > 0){
        $(".form-error").css("margin-left",-($(".form-error").width()/2));

        setTimeout(function(){
            $(".form-error").hide();
        },2000);
    }



    function addFavorite2() {
	    var url = window.location;
	    var title = document.title;
	    var ua = navigator.userAgent.toLowerCase();
	    if (ua.indexOf("360se") > -1) {
	        alert("由于360浏览器功能限制，请按 Ctrl+D 手动收藏！");
	    }else if (ua.indexOf("msie 8") > -1) {
	        window.external.AddToFavoritesBar(url, title); //IE8
	    }else if (document.all) {
	  		try{
	  			window.external.addFavorite(url, title);
	  		}catch(e){
	   			alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
	  		}
	    }else if (window.sidebar) {
	        window.sidebar.addPanel(title, url, "");
	    }else {
	  		alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
	    }
	}

	$(".J_shoucang").click(function(e){
		e.preventDefault();

		addFavorite2();
	});

	$(".kefu-box").click(function(){
		if($(this).hasClass("kefu-box-01")) {
			$(this).removeClass("kefu-box-01");
		}else{
			$(this).addClass("kefu-box-01");
		}
	});


	
	

	$("body").delegate(".J_closefc","click",function(e){
		e.preventDefault();

		$(".fuceng-common-box").hide();
		$(".black-cover").hide();
	});

	$("body").delegate(".J_com_cancel","click",function(e){
		e.preventDefault();

		$(".fuceng-common-box").hide();
		$(".black-cover").hide();
	});

	
	$(".J_jiujidou").click(function(e){
		e.preventDefault();

		var _this = $(this),
			_url = _this.attr("data-url");

		$.ajax({
			url: _url,
			dataType: "json",
			type: "post",
			success: function(data){
				var _html = '<p class="mn-p">'+ data.msg +'</p><a class="btn-color-red place-middle J_com_cancel" href="#">确 认</a>';
				$(".fuceng-common-box .fc-main-box").html(_html);
				$(".black-cover").show();
				$(".fuceng-common-box").show();
			}
		});
	});






	$(".J_btnLink").click(function(e){
		e.preventDefault();

		var url = $(this).attr("data-url");
		window.external.ShowWebWnd(url);
	});

	/********喇叭左右滚动公告*******/
	$(".lb-slide").slide({
		mainCell: ".bd ul",
		autoPlay: true,
		effect: "leftMarquee",
		interTime: 50,
		vis: 4
	});

	/********喇叭左右滚动公告end*******/
})(jQuery);