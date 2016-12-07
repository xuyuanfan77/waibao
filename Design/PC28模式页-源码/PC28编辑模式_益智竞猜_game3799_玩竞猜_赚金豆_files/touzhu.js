var Cookies = {};
Cookies.get = function(name){
	var arg = name + "=";
	var alen = arg.length;
	var clen = document.cookie.length;
	var i = 0;
	var j = 0;
	while(i < clen){
		j = i + alen;
		if (document.cookie.substring(i, j) == arg)
			return Cookies.getCookieVal(j);
		i = document.cookie.indexOf(" ", i) + 1;
		if(i == 0)
			break;
	}
	return null;
};

Cookies.set = function(name, value, seconds){
 	seconds = seconds || 0;   
 	var expires = "";  
 	if (seconds != 0 ) {      //设置cookie生存时间  
 		var date = new Date();  
 		date.setTime(date.getTime()+(seconds*1000));  
 		expires = "; expires="+date.toGMTString();  
 	}  
 	document.cookie = name+"="+escape(value)+expires+"; path=/";   //转码并赋值
}

Cookies.getCookieVal = function(offset){
   var endstr = document.cookie.indexOf(";", offset);
   if(endstr == -1){
       endstr = document.cookie.length;
   }
   return unescape(document.cookie.substring(offset, endstr));
};


// 设置cookie的问题************************************************************








(function($){

var reload_num = parseInt(Cookies.get('19dou_reload')),
	voice_num = parseInt(Cookies.get('19dou_voice_isopen'));




$(document).ready(function() {
	
	if(voice_num == 0){
		$('.shengyin-ts').removeClass("shengyin-ts-close");
	}else{
		$('.shengyin-ts').addClass("shengyin-ts-close");		
	}
	if(reload_num == 0){
		$(".shuaxin-btn").removeClass("shuaxin-btn-close");
	}else{
		$(".shuaxin-btn").addClass("shuaxin-btn-close");
	}
});


function close_reload(flag){
	if(flag){
		Cookies.set('19dou_reload',1,604800);	//open
		window.location.reload();
	}else{
		Cookies.set('19dou_reload',0,604800);	//close
		window.location.reload();
	}	
}

function close_voice_reload(flag){
	if(flag){
		Cookies.set('19dou_voice_isopen',1,604800);	//open
		window.location.reload();
	}else{
		Cookies.set('19dou_voice_isopen',0,604800);	//close
		window.location.reload();
	}	
}


$(".shengyin-ts,.shengyin-ts-close").click(function(e){
	e.preventDefault();

	if($(this).hasClass("shengyin-ts-close")){
		close_voice_reload(false);
	}else{
		close_voice_reload(true);
	}
});

$(".shuaxin-btn,.shuaxin-btn-close").click(function(e){
	e.preventDefault();

	if($(this).hasClass("shuaxin-btn-close")){
		close_reload(false);
	}else{
		close_reload(true);
	}
});

//获取服务器时间

	var _time;
	timeAJAX = function(){
		$.ajax({
        	url: serverTime_url,
        	// url: "json/json5.php",
        	dataType: "json",
        	type: "post",
        	success: function(data){
        		clearInterval(timeAnim);
    			_time(Number(data.hour),Number(data.min),Number(data.sec));		   
    		}
        });
	}

	var z = $(".J_ServerTime"),
		serverTime_url = z.attr("data-url");
    if (z.length > 0){
    	var timeAnim;
    	var _time = function(hour,min,sec){
    		timeAnim = setInterval(function(){

    			sec = sec + 1;
	        	if(sec == 60){
	        		sec = 0;
	        		min = min + 1;
	        	}


	        	if(min == 60){
	        		min = 0;
	        		hour = hour + 1;
	        	}
	        	
	        	var _html = (hour < 10? '0' + hour :hour) +':'+ (min < 10? '0' + min :min) + ':'+ (sec < 10? '0' + sec :sec);

	        	$(".J_ServerTime").text(_html);


    		},1000);
    	}

        setInterval(function(){
	        timeAJAX();
        },300000);

        timeAJAX();
    }



// 关闭和添加声音提示
// function showPlayer(id,url){
// 	var vhtml = '<object id="wmp"';
// 	var userAg = navigator.userAgent;
// 	if(-1 != userAg.indexOf("MSIE")){
// 		vhtml+='classid="clsid:6BF52A52-394A-11d3-B153-00C04F79FAA6"';
// 	}else if(-1!=userAg.indexOf("Firefox")||-1!=userAg.indexOf("Chrome")||-1!=userAg.indexOf("Opera")||-1!= userAg.indexOf("Safari")){
// 		vhtml+='type="application/x-ms-wmp"';
// 	}
// 	vhtml +='width="0" height="0">';
// 	vhtml +='<param name="URL" value="'+url+'"/>';
// 	vhtml +='<param name="autoStart" value="true" />';
// 	vhtml +='<param name="invokeURLs" value="false">';
// 	vhtml +='<param name="playCount" value="1">';
// 	vhtml +='<param name="Volume" value="100">';
// 	vhtml +='<param name="defaultFrame" value="datawindow">';
// 	vhtml +='</object>';
// 	$("#"+id).html(vhtml);
// }
	
// function stopPlayer(){
// 	$('#28startPlayer').html('');	
// 	clearTimeout(stop_auto_reload);
// }












//投注倒计时
$(document).ready(function(){
	if($(".J_kjTime").length > 0){
		var _lastTime = $(".J_jcTime").attr("data-lastTime"),
			_lastTime2 = $(".J_kjTime").attr("data-lastTime");

		var closebet = false;
		function _cDown1(){
		    if (_lastTime > 0) {
		        _lastTime = _lastTime - 1;
		        $(".J_jcTime").text(_lastTime);
		        setTimeout(_cDown1, 1000);
		        closebet = true;
		    }
		    else {
		        if (closebet) {
		            window.location.reload();
		            closebet = false;
		        }
		    }
		}
		var drawRefresh = false;
		function _cDown2(){
			if(_lastTime2 > 0){
				_lastTime2 = _lastTime2 - 1;
				$(".J_kjTime").text(_lastTime2);
				setTimeout(_cDown2, 1000);
				if (_lastTime2 == 2) {
				    drawRefresh = true;
				}
			} else {
			    if (drawRefresh) {
			        window.location.reload();
			        drawRefresh = false;
			    }
				if(voice_num == 0){
					swfobject.embedSWF('http://116.31.115.37/19dou/swf/security.swf', 'sound_bet', '0', '0', '8.0.0');
				}
				$(".J_kjTimeBox").hide();
				$(".J_kjIng").show();

				if(reload_num == 0){
					setTimeout(function(){
						window.location.reload();
					},15000);
					setTimeout(function(){
						window.location.reload();
					},70000);
				}
			}
		}
		_cDown1();
		_cDown2();
	}
});

// 投注出现错误浮层

function error_fc(msg){
	var _html = '<p class="mn-p">'+ msg +'</p><a class="btn-color-red place-middle" id="J_errorBtn" href="#">确 认</a>';

	$(".fuceng-html-box1 .fc-main-box").html(_html);
	$(".black-cover").show();
	$(".fuceng-html-box1").show();
}


function error_fc1(msg){
	var _html = '<p class="mn-p">'+ msg +'</p><a class="btn-color-red place-middle J_reload_btn" id="J_errorBtn" href="#">确 认</a>';

	$(".fuceng-html-box1 .fc-main-box").html(_html);
	$(".black-cover").show();
	$(".fuceng-html-box1").show();
}

$(".fc-main-box").delegate(".J_reload_btn","click",function(e){
	e.preventDefault();

	window.location.reload();
});

// 关闭按钮
$(".J_closefc").click(function(e){
	e.preventDefault();

	$(".black-cover").hide();
	$(".fuceng-html-box").hide();
	$(".fuceng-html-box1").hide();
	$(".suoha-html-box").hide();
});


// 错误提示确定关闭
$(".fc-main-box").delegate("#J_errorBtn,.J_fcBtn_cancel","click",function(e){
	e.preventDefault();

	$(".black-cover").hide();
	$(".fuceng-html-box1").hide();
	$(".fuceng-html-box").hide();
	$(".suoha-html-box").hide();
});



// 投注成功
$(".J_TZBtn").click(function(e){
	e.preventDefault();

	var _val = $("#total_md_lottery2").text();

	var _html = '<p class="mn-p">确认投注<strong class="kdou-color">'+ _val +'</strong><span class="kdou"></span></p><a class="btn-color-red place-left" id="J_touzhuBtn" href="#">确 认</a><a class="btn-color-gray place-right J_fcBtn_cancel" href="#">取 消</a>';
	$(".fuceng-html-box1 .fc-main-box").html(_html);

	$(".black-cover").show();
	$(".fuceng-html-box1").show();
});


var touzhu_key = 1;
$(".fc-main-box").delegate("#J_touzhuBtn","click",function(e){
	e.preventDefault();

	var	_url = $(".suer_insert").attr("data-url"),
		_pid = $(".suer_insert").attr("data-pid"),
		_id = $("#rwnum").attr("data-id"),
		all_val = sum_val();
	    _val = parseInt($("#total_md_lottery2").text());

	if(_val > 0 ){
		if(touzhu_key == 1){
			touzhu_key = 0
			$.ajax({
				url: _url,
				dataType: "json",
				type: "post",
				data: {total:_val,bet_num:all_val,period_no:_pid,race_id:_id},
				success: function(data){

					if(data.code_num <= 10001){
						var _html = '<p class="mn-p">'+ data.msg +'</p><a class="btn-color-red place-middle" href="'+ data.reload_url +'" target="_self">确 认</a>';
						$(".fuceng-html-box1 .fc-main-box").html(_html);

					}else{
						error_fc(data.msg);
					}

					touzhu_key = 1;
				}
			});
		}
	}else{
		var msg = '请正确投注';
		error_fc(msg);
	}
});







function pc28_pl(node,data,index){
	var h_01 = parseInt(Math.random()*6+5);
	var h_02 = parseInt(Math.random()*3+1);
	var h_03 = parseFloat(Math.random()*0.5).toFixed(1);
	var h_04 = parseInt(Math.random()*2);

	if(h_04 == 1){
		h_01 = -(h_01);
		h_02 = -(h_02);
		h_03 = -(h_03);
	}

	

	if(index < 3 || index > 22){
		node.html(parseFloat(parseFloat(data) + parseFloat(h_01)).toFixed(2));
	}

	if(index >= 3 && index <= 6 ){
		node.html(parseFloat(parseFloat(data) + parseFloat(h_02)).toFixed(2));
	}

	if(index >= 19 && index <= 22 ) {
		node.html(parseFloat(parseFloat(data) + parseFloat(h_02)).toFixed(2));
	}

	if(index > 6 && index < 19){
		node.html(parseFloat(parseFloat(data) + parseFloat(h_03)).toFixed(2));
	}
}



//刷新当前赔率
function refresh_odds(obj,_pid,url,_id) {
	$(obj).html("刷新中...");
	$(obj).removeAttr('onclick');
	$(obj).unbind('click');
	$.ajax({
		type:"post",
		url:url,
		data:{period_no:_pid,race_id:_id},
		success: function(data){
			var data_list = data.bet_rate.split(',');
			var i = 0;
			

			$(".across_par1_no_right .color_02").each(function(index){

				
				if($(".game-two-nav").hasClass("js28-nav-box")){
					pc28_pl($(this),data_list[i],index);
				}else{
					$(this).html(data_list[i]);
				}

				i++;
			});
			$(obj).html("刷新赔率");
			$(obj).bind('click', function(){
				refresh_odds(this,_pid,url,_id);
		    });
		}
	});
}

$(".J_refresh_odds").click(function(e){
	e.preventDefault();
	
	var pid = $(".suer_insert").attr("data-pid"),
		_id = $("#rwnum").attr("data-id"),
		url = $(this).attr("data-url");
	refresh_odds(this,pid,url,_id);
});


//上期投注

$(".J_last_lottery").click(function(e){
	e.preventDefault();

	var	_url = $(this).attr("data-url");

	$.ajax({
		type: "post",
		url: _url,
		success: function(data) {
			lottery_mode(data.bet_num.split(","));
		}
	});

});


// 投注模式编辑错误浮层
var moshi_key = 1;
$(".J_moshi_save").click(function(e){
	e.preventDefault();

	if($(this).hasClass("mode_save_anthor")){
		moshi_key = 2;
	}else{
		moshi_key = 1;
	}
	var _val = $("#total_md_lottery2").text(),
		_id = $(this).attr("data-id"),
		_name = $("#modes_name_2").text();

	if(_zuhe(_val) > 0){

		var _html = '<label class="moshi-input-box" for="">'+
					'<span class="moshi-input-title">模式名称 :</span>'+
					'<p class="moshi-input"><input class="moshi_name_input" type="text"></p>'+
				'</label>'+
				'<a class="btn-color-red place-left J_moshi_ajax" href="#">确 认</a>'+
				'<a class="btn-color-gray place-right J_fcBtn_cancel" href="#">取 消</a>';

		$(".fuceng-box .fc-main-box").html(_html);
		$(".black-cover").show();
		$(".fuceng-html-box1").show();

		if(_id){ //区分是新模式还是已有模式
			$(".fuceng-html-box1 input").val(_name);
		}else{
			$(".fuceng-html-box1 input").val("新模式");
		}

	}else{
		var msg = '保存失败，投注总额必须大于0';
		error_fc(msg);
	}
});


var moshi_save_key = 1;
$(".fc-main-box").delegate(".J_moshi_ajax","click",function(e){
	e.preventDefault();

	var all_val = sum_val(),
		_url = $(".J_moshi_save").eq(0).attr("data-url"),
		_val = parseInt($("#total_md_lottery2").text()),
		_id = $(".J_moshi_save").eq(0).attr("data-id"),
		_name = $(".fuceng-box .moshi_name_input").val();

	if(moshi_key == 2){
		_id = '';
	}

	if(_name == ''){

	}else{
		if(moshi_save_key == 1){
			moshi_save_key = 0;
			$.ajax({
				url: _url,
				type: "post",
				dataType: "json",
				data: {name:_name,bet_num:all_val,total:_val,model_id:_id},
				success: function(data){
					error_fc1(data.msg);
					moshi_save_key = 1;
				}
			});
		}
	}
});








// 选择投注模式

$(".J_moshi_list").click(function(e){
	e.preventDefault();

	var _this = $(this),
		_url = _this.attr("data-url"),
		_id = _this.attr("data-id");

	$("#modes_name_2").text(_this.text());
	personmode(_url,_id);
});

var moshi_del_key = 1;
$(".J_delMoshi").click(function(e){
	var _this = $(this),
		_url = _this.attr("data-url"),
		_id = _this.parents("li").find(".J_moshi_list").attr("data-id");

	if(moshi_del_key == 1){
		moshi_del_key = 0;
		$.ajax({
			url: _url,
			dataType: "json",
			type: "post",
			data: {model_id:_id},
			success: function(data){
				if(data.code_num == 10000){
					window.location.reload();
				}

				moshi_del_key = 1;
			}
		});
	}
});



$(".J_suohaBtn").click(function(e){
	e.preventDefault();
	var val_all = $("#total_md_lottery2").text();

	if(_zuhe(val_all) > 0){
		var _val = $(this).attr("data-val");
		var _html = '<div class="fuceng-box-01 fuceng-suoha">'+
						'<div class="fc-ttl-box clear-fix">'+
							'<h6 class="ttl-sp">梭哈模式</h6>'+
							'<a href="#" class="fc-close J_closefc"></a>'+
						'</div>'+
						'<div class="fc-main-box">'+
							'<p class="you-zhanghu">您的账户余额<strong class="udou-num">'+ _fenge(_val) +'</strong><span class="kdou"></span></p>'+
							'<label class="suoha-num-box clear-fix" for="">'+
								'<span class="suoha-num-title">梭哈总额:</span>'+
								'<input class="suoha-num-input" type="text" value="'+ _val +'">'+
							'</label>'+
							'<div class="suoha-fenbox clear-fix">'+
								'<a class="suoha-fen-list selected" data-attr="1" href="#">全部</a>'+
								'<a class="suoha-fen-list" data-attr="2" href="#">1/2</a>'+
								'<a class="suoha-fen-list" data-attr="3" href="#">1/3</a>'+
								'<a class="suoha-fen-list" data-attr="4" href="#">1/4</a>'+
								'<a class="suoha-fen-list" data-attr="5" href="#">1/5</a>'+
							'</div>'+
							'<a class="btn-color-red place-left J_suohaAJAX" href="#">确 认</a>'+
							'<a class="btn-color-gray place-right J_fcBtn_cancel" href="#">取 消</a>'+
						'</div>'+
					'</div>';

		$(".suoha-html-box").html(_html).show();
		$(".black-cover").show();
	}else{
		var msg = '梭哈失败，请先投注';
		error_fc(msg);
	}
});

$(".suoha-html-box").delegate(".J_fcBtn_cancel,.J_closefc","click",function(e){
	e.preventDefault();

	$(".suoha-html-box").hide();
	$(".black-cover").hide();
});


$(".suoha-html-box").delegate(".suoha-fen-list","click",function(e){
	e.preventDefault();

	var _val = $(".J_suohaBtn").attr("data-val"),
		_key = $(this).attr("data-attr");
	$(".suoha-html-box .suoha-fen-list").removeClass("selected");
	$(this).addClass("selected");
	$(".suoha-num-input").val(parseInt(_val/_key));
});


$(".suoha-html-box").delegate(".J_suohaAJAX","click",function(e){
	e.preventDefault();

	var _val = $(".suoha-num-input").val();

	var total = 0;
	var _key = 0;

	$("#panel").find("input[name='mdp_coin']").each(function() {
		var txt_value = $.trim($(this).val()).replace(/,/gi, ""),
			_this = $(this);
		if (txt_value && !isNaN(txt_value)) {
			total += parseInt(txt_value);
		}
	});

	$("#panel").find("input[name='mdp_coin']").each(function() {
		var txt_value = $.trim($(this).val()).replace(/,/gi, ""),
			_this = $(this);
		if (txt_value && !isNaN(txt_value)) {
			_this.val(parseInt(_val*(txt_value/total)));
		}
	});

	recount_coins();

	$(".suoha-html-box").hide();
	$(".black-cover").hide();
});



/*左侧漂浮问题*/
var x = 50,y =90,t = 200;
	var xin = true, yin = true; 
	var step = 1;
	var delay = 50;

var obj=$("#jxy_div_warning");

function foverTop(){ 
	var L=T=90;
	var R= document.body.clientWidth-obj.offsetWidth;
	var B = $(window).height()-t;
	
	var top = y + $(document).scrollTop();
	obj.css('top',top);
	x = x + step*(xin?1:-1)
	if (x < L) { xin = true; x = L}
	if (x > R){ xin = false; x = R}
	y = y + step*(yin?1:-1);

	if (y < T) { yin = true; y = T }
	if (y > B) { yin = false; y = B;}
} 
var itl= setInterval(function(){
	foverTop();
}, delay);
obj.mouseover(function(){clearInterval(itl)});
obj.mouseout(function(){
	itl=setInterval(function(){
		foverTop()
	}, delay)
});


/*左侧漂浮问题*/


})(jQuery);