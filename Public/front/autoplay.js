(function(){
	// 返回信息提示 弹出提示层
	function back_msg(str){
		var html = '<div class="fuceng-box">' +
						'<div class="fc-ttl-box clear-fix">' +
							'<h6 class="ttl-sp">提示信息</h6>' +
							'<a href="#" class="fc-close J_closefc"></a>' +
						'</div>' +
						'<div class="fc-main-box">' +
							'<p class="mn-p">' + str + '</p>' +
							'<a class="btn-color-red place-middle J_mnbtn" href="#">确 认</a>' +
						'</div>' +
					'</div>' ;

		$(".black-cover").show();
		$(".fuceng-html-box").html(html).show();

	}
	

	// 关闭弹出层
	function msg_close(){
		$(".black-cover").hide();
		$(".fuceng-html-box").html('').hide();
	}


	$(".fuceng-html-box").delegate(".J_mnbtn","click",function(e){
		e.preventDefault();
		msg_close();
	});

	$(".fuceng-html-box").delegate(".J_closefc","click",function(e){
		e.preventDefault();
		msg_close();
	});



	// 文本框输入
	function input_keyup(obj){
		var num = obj.value.replace(/,/g,'').replace(/\D/g,'');
		if(num == "" || num == null){
			num = 0;
		}else{
			num = num *1;
		}
		obj.value = num;
	}

	function input_keyup_xu(obj){
		var num = obj.value.replace(/,/g,'');
		if(IsNum(num)){
			var index = num.indexOf(".");
			if(index != -1){
				num = num.substring(0, index + 9);
			}
			if(num >= 0){
				obj.value = num;
			}else{
				obj.value = Math.abs(num);
			}
		}else{
			obj.value = 0;
		}
	}


	// 下拉框选择模式
	function modes_selected(){
		$("#my_modes").find(".bet-tri").each(function(){
			$(this).html('');

		});

		var id = $("#drop_modes").val();
		$("#lk_tri_"+id).html("<i class=\"tri\"></i>");

	}

	$("#drop_modes").change(function(){
		modes_selected();
	});



	// 载入删除下拉框
	function drop_del_all(){
		drop_replace(); 
		var arr = new Array();
		var i = 0;
		$(".my_modes").find("ul[attr=gray]").each(function(){
			var id = Trim($(this).find("li:eq(2) span").html());
			arr[i] = id;
			i++;
		});

		$("select option").each(function(){
			for(var j = 0;j < arr.length;j++){
				if($(this).val() == arr[j]){
					$(this).remove();
				}
			}
		});

		modes_selected(); 
	}

	drop_del_all();

	// 点击删除下拉框
	function drop_del(obj){
		var id = $.trim($(obj).parents("ul").find("li:eq(2) span").html());
		$("select option").each(function(){
			if($(this).val() == id){
				$(this).remove();
			}
		});

		var str = "<ul attr='gray'>";
		var str_1 = $.trim($(obj).parents("ul").html());
			str_1 = str_1.replace("lk-win","lk-lose");
			str_1 = str_1.replace("k-color1","k-color2");
			str_1 = str_1.replace(/md-sel/g,"md-sel k-color2");
	    	str_1 = str_1.replace("bet-on","bet-off");

	    str += str_1;
	    str += "</ul>";
	    $("#my_modes").append(str);
	    $(obj).parents("ul").remove();

	    modes_selected();

	}


	// 点击添加下拉项
	function drop_add(obj){
		var id = $.trim($(obj).parents("ul").find("li:eq(2) span").html());
		var name = $.trim($(obj).parents("ul").find("li:eq(1) strong").html());
		var op_str = "<option value='"+id+"'>"+name+"</option>";
		$("select").each(function(){
			$(this).append(op_str);
		});

		var str = "<ul>";
		var str_1 = $.trim($(obj).parents("ul").html());
			str_1 = str_1.replace("bet-off","bet-on");
			str_1 = str_1.replace(/md-sel k-color2/g,"md-sel");
			str_1 = str_1.replace("k-color2","k-color1");
        	str_1 = str_1.replace("lk-lose","lk-win");
        str += str_1;
        str += "</ul>";

        $(str).insertBefore($("#my_modes").find("ul[attr=gray]:eq(0)"));
        $(obj).parents("ul").remove();

        drop_selected(id);
        modes_selected();

	}


	$("#my_modes").delegate(".bet-on","click",function(e){
		e.preventDefault();
		drop_del(this);
	});

	$("#my_modes").delegate(".bet-off","click",function(e){
		e.preventDefault();
		drop_add(this);
	});



	// 模式文字替换
	function txt_replace(){
		$("#my_modes ul:gt(0)").each(function(){
			var modes_name = $.trim($(this).find("li:eq(1) strong").html());
			var str = $.trim($(this).find("li:eq(3)").find("label").html()).replace(eval('/^'+modes_name+'$/'),"继续当前投注模式");
			$(this).find("li:eq(3)").find("label").html(str);
			str = $.trim($(this).find("li:eq(4)").find("label").html()).replace(eval('/^'+modes_name+'$/'),"继续当前投注模式");
			$(this).find("li:eq(4)").find("label").html(str);
		});
	}


	// 下拉选项替换模式
	function drop_replace(){
		// $("#my_modes ul:gt(0)").each(function(){
		// 	var id = $.trim($(this).find("li:eq(2) span").html());
		// 	$("#win_"+id+" option[value='"+id+"']").remove();
		// 	$("#lose_"+id+" option[value='"+id+"']").remove();
		// 	var str = "<option value='"+id+"'>继续当前投注模式</option>";
		// 	$("#win_"+id).prepend(str);
		// 	$("#lose_"+id).prepend(str);
		// 	var win = $.trim($(this).find("li:eq(3) span").html());
		// 	var lose = $.trim($(this).find("li:eq(4) span").html());
		// 	$("#win_"+id+" option[value='"+win+"']").attr("selected", true);
		// 	$("#lose_"+id+" option[value='"+lose+"']").attr("selected", true);
		// });
	}


	// 下拉选中项
	function drop_selected(id){
		$("#win_"+id+" option[value='"+id+"']").remove();
		$("#lose_"+id+" option[value='"+id+"']").remove();
		var str = "<option value='"+id+"'>继续当前投注模式</option>";
		$("#win_"+id).prepend(str);
		$("#lose_"+id).prepend(str);
		$("#win_"+id+" option[value='"+id+"']").attr("selected", true);
		$("#lose_"+id+" option[value='"+id+"']").attr("selected", true);
	}



	// 开始自动投注
	function autoPlay(){
		// 选择开始模式
		var id = $("#drop_modes").val();

		if(id == null || id == ''){
			back_msg("请选择开始模式");
		}else{
			// 截止期数
			var play_num = $("#play_num").val();

			if(play_num > 0 && play_num <= 5000){
				var issue = parseInt($("#issue").val());
				var issue_now = parseInt($.trim($("#issue_now").text()));
				if(issue >= issue_now){
					var _url = $(".autobet-btn").attr("data-url"),
						kdou_up = $("#kdou_up").val(),
						kdou_down = $("#kdou_down").val();

					var id_arr = new Array(),
						state_arr = new Array();

					var i = 0;
					$("#my_modes ul:gt(0)").each(function(){
						id_arr[i] = $.trim($(this).find("li:eq(2) span").html());
						state_arr[i] = $.trim($(this).find("li:eq(3) a").hasClass("bet-on"));
						i++;
					});

					$.ajax({
						url:_url,
						dataType:"json",
						type:"post",
						data:{
							start_model_id:id,
							start_no:issue,
							bet_count:play_num,
							max_f:kdou_up,
							min_f:kdou_down,
							id_arr:id_arr,
							state_arr:state_arr,
						},
						success:function(data){
							if(data.code_num == "10000"){
								window.location.reload();
							}else{
								back_msg(data.msg);
							}
						}
					});

				}else{
					back_msg("开始期号必须大于等于"+issue_now);
				}
			}else{
				back_msg("投注期数必须在1至5000之间");
			}
		}
	}


	$(".J_autobtn").click(function(e){
		e.preventDefault();
		autoPlay();
	});



	// 停止自动投注
	$(".J_stopbtn").click(function(e){
		e.preventDefault();
		var _url = $(this).attr("data-url");

		$.ajax({
			url:_url,
			dataType:"json",
			type:"post",
			success:function(data){
				if(data.code_num == '10000'){
					window.location.href = data.reload_url;
				}else{
					back_msg(data.msg);
				}
			}
		});
	});

	

	// 倒计时
	var timer = setInterval(function(){
		var time = $.trim($("#countdown").html());

		time -= 1;
		$("#countdown").html(time);

		if(time == 0){
			clearInterval(timer);
			// 这里要刷新页面吧
		}
	},1000); 




	//添加自动追号

	$(".J_selSet .sel-btn").click(function(e){
		e.preventDefault();

		var _this = $(this),
			_index = _this.parents(".yc-text").index();

		_this.parents(".J_selSet").attr("data-num", _index + 1);
		_this.parents(".J_selSet").find(".yc-text").removeClass("select");
		_this.parents(".J_selSet").find(".yc-text").eq(_index).addClass("select");
	});

	$(".lir-c3 .zn-btn").click(function(e){
		e.preventDefault();

		var _this = $(this),
			now_num = parseFloat($(".lir-c3 .zn-bei").attr("data-num")),
			new_num = '';

		if(_this.hasClass("zn-btn-add")){
			new_num = Number(now_num + 0.1).toFixed(1);
			if(new_num > 10){
				new_num = '10';
			}
		}else{
			new_num = Number(now_num - 0.1).toFixed(1);
			if(new_num < 0.1){
				new_num = 0.1;
			}
		}

		$(".lir-c3 .zn-bei").attr("data-num", new_num);

		$(".lir-c3 .zn-bei").text(new_num + '倍');

	});

})(jQuery);

