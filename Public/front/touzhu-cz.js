// var maxnum =  g28=='btc'?parseInt(config_btc_total):parseInt(config_try_total);
var maxnum = 100000000; 
var satoshi = 1;//最小单位
$(document).ready(function() {
	//点击投注模式
	$(".mode_lottery").click(function() {
		var i = $(this).attr("attr");
		clear();
		$(this).removeClass('standard_bg1');
		$(this).addClass('standard_bg2');
		if(i) setValue(i);
		recount_coins();
	}).hover(function() {
		//$(this).css("color", "#FF6600");
	},
	function() {
	});
	
	//点击简易投注模式
	$(".mode_lottery1").click(function() {
		var i = $(this).attr("attr");
		clear();
		if(i) setValue(i);
		recount_coins();
	}).hover(function() {
		//$(this).css("color", "#FF6600");
	},
	function() {
	});

	//点击号码
	$(".click_number").each(function(i) {
		$(this).click(function() {
			var h = i;
			if($(".kaijiang-box").hasClass("kaijiang-js11")){
				h = i + 2;
			}

			if($(".kaijiang-box").hasClass("kaijiang-fk36")){
				h = i + 1;
			}

			if($(".kaijiang-box").hasClass("kaijiang-jnd16")){
				h = i + 3;
			}

			if($(".kaijiang-box").hasClass("kaijiang-fksc")){
				h = i + 1;
			}
			if(!$('#txt'+h).attr("readonly") ){
				$('#txt'+h).val(nub[h]);
				setSelectCss(h);
				recount_coins();				
			}
		})
	}).css("cursor", "pointer");

	//点击反选按钮
	//$(".touzhu2").eq(0).click(function() {
	//	un_select();
	//})
	//点击清除按钮
	$(".touzhu2").eq(0).click(function() {
		clear();
	})
	$(".multiple").click(function() {
		var oneId = $(this).attr('id');
		var peilv = $(this).attr('val');
		if (!$('#txt'+oneId).attr("readonly")) {
			var txt_value = $.trim($('#txt'+oneId).val()).replace(/,/gi, "");
			if (txt_value && !isNaN(txt_value)) {
				var new_value = Math.floor(txt_value * peilv);
				if(new_value>maxnum){
					showmsg("1", limit_msg);
					return false;
				}
				$('#txt'+oneId).val(number_format(new_value + ""));
			}
		}		
		//console.log($(this).attr('id'));
		recount_coins();
	})	
	$(".touzhuclear").click(function() {
		clear();
	})	
	//刷新赔率
	// $(".touzhu1").eq(0).click(function() {
	// 	refresh_odds(lottery_id);
	// })
	//上期投注
	// $(".touzhu1").eq(1).click(function() {
	// 	last_lottery();
	// })
	//点击整体的倍数
	$(".double_insert").click(function() {
		var peilv = parseFloat($(this).text().replace("倍", ""));
		if(peilv>0){
			setAllvalue(peilv);
			recount_coins();			
		}else{//梭哈
			// setSuoha();
		}

	}).hover(function() {
		//$(this).css("color", "#");
	},
	function() {
		//$(this).css("color", "#"); 
	});
	
	//鼠标经过的样式
	/*$("#panel .across_par1_no").hover(function() {
		//$(this).removeClass('mumber_info_green');

	}, function() {
		$(this).find("input[name='mdp_coin']").val() && $(this).children().addClass('mumber_d');
		if($(this).find("input[name='mdp_coin']").val() && !$(this).find("input[name='mdp_coin']").attr('readonly')){
			//$(this).addClass('mumber_info_green');	
			//$(this).children().addClass('mumber_white');
			
		}
	});*/
	
	//输入投注数据
	$("#panel").find("input[name='mdp_coin']").keyup(function() {
		var regex = /^[1-9]\d{0,}$/;
		var val = $(this).val();
		if (!regex.test(val)) {
			val = val.replace(/\D/g, '');
			$(this).val(val);
		}
		if (!regex.test(val)) {
			$(this).val(val.substring(1));
			recount_coins();
		} else {
			// $('#checkboxd'+val).attr("checked", true);
			recount_coins();
		}
		if($(this).val()){
			$(".conhhhh").show();
			$(".conhhhh")
				.css("top",($(this).offset().top-42) + "px")
				.css("left",($(this).offset().left) + "px")
				.fadeIn("slow");	
			$('#format_satoshi').html( (val/satoshi).toFixed(8));	
		}

	}).blur(function() { //移开
		var i = $(this).attr('id').replace('txt','');
		if($(this).val()>maxnum){
			showmsg("1", limit_msg);
			return false;
		}
		// $(this).val(number_format($(this).val()));
		if($(this).val()){  
			setSelectCss(i);	
			$('#txt'+i).removeClass('input_modou_txt_null');
			$('#txt'+i).removeClass('input_modou_txt_sel');
			$('#txt'+i).addClass('input_modou_txt');			
		}else{
			unsetSelectCss(i);
			$('#txt'+i).removeClass('input_modou_txt');
			$('#txt'+i).removeClass('input_modou_txt_sel');
			$('#txt'+i).addClass('input_modou_txt_null');					
		}	
		$(".conhhhh").hide();
				
	}).focus(function() {//选中
		var i = $(this).attr('id').replace('txt','');
		$('#txt'+i).removeClass('input_modou_txt_null');
		$('#txt'+i).removeClass('input_modou_txt');
		$('#txt'+i).addClass('input_modou_txt_sel');	
		if ($(this).val().indexOf(",") > -1) {
			domvalue = $(this).val().replace(/,/gi, "");
			$(this).val(domvalue);
			//$('#format_satoshi').html((domvalue/satoshi).toFixed(8));
		}else{
			//$('#format_satoshi').html( ($(this).val()/satoshi).toFixed(8));
		}
/*		if($(this).val()){
			$(".conhhhh").show();
			$(".conhhhh")
				.css("top",($(o).offset().top-42) + "px")
				.css("left",($(o).offset().left) + "px")
				.fadeIn("slow");	
		}*/
		/*try {
			var obj = event.srcElement;
			var txt = obj.createTextRange();
			txt.moveStart('character', obj.value.length);
			txt.collapse(true);
			txt.select();
		} catch(e) {}*/
	});
	
	$("#use_leave_modou_num").keyup(function() {
		var regex = /[^0-9.]/g;
		var val = $(this).val();
		if (!regex.test(val)) {
			val = val.replace(/[^0-9.]/g, '');
			$(this).val(val);
			$('#used_leave_modou_num').val(val);
		}
	}).blur(function() { //移开
		if($(this).val()>maxnum){
			showmsg("1", limit_msg);
			cancel();
			return false;
		}
		$('#used_leave_modou_num').val($(this).val());		
		$(this).val(number_format($(this).val()));
	}).focus(function() {//选中	
		if ($(this).val().indexOf(",") > -1) {
			domvalue = $(this).val().replace(/,/gi, "");
			$(this).val(domvalue);
			$('#used_leave_modou_num').val(domvalue);
		}
	});	
});


//千分位分割
function _fenge(s){
    if(/[^0-9\.]/.test(s)) return "invalid value";
    s=s.replace(/^(\d*)$/,"$1.");
    s=s.replace(/(\d*\.\d\d)\d*/,"$1");
    s=s.replace(".",",");
    var re=/(\d)(\d{3},)/;
    while(re.test(s))
            s=s.replace(re,"$1,$2");
    s=s.replace(/,(\d\d)$/,".$1");
    s = s.replace(/^\./,"0.");
	var reg=/,$/gi;
	return s.replace(reg,"");
}

//千分位组合
function _zuhe(s){
    s = s.replace(/,/g,'');                
    return Number(s);
}


function setSelectCss(i){

	if($('#click_number'+i).hasClass('no_left_bg')){
		$('#click_number'+i).removeClass('no_left_bg');	
		$('#click_number'+i).addClass('no_left_bg_02');
	}
	$('#txt'+i).removeClass('input_modou_txt_null');
	$('#txt'+i).addClass('input_modou_txt');
	$('#clear_this_val'+i).removeClass('sack_02');	
	$('#clear_this_val'+i).addClass('sack_03');	
	$('#clear_this_val'+i).show();
	$('#peilv'+i).show();
	$('#checkboxd'+i).attr("checked", true);
	$('#checkboxd'+i).parent().parent().removeClass('across_par1_no');
	$('#checkboxd'+i).parent().parent().addClass('across_par1_bg1');
}

function unsetSelectCss(i){
	$('#click_number'+i).removeClass('no_left_bg_02');
	$('#click_number'+i).addClass('no_left_bg');	
	$('#txt'+i).removeClass('input_modou_txt');
	$('#txt'+i).addClass('input_modou_txt_null');
	$('#clear_this_val'+i).removeClass('sack_03');
	$('#clear_this_val'+i).addClass('sack_02');	
	$('#clear_this_val'+i).hide();
	$('#peilv'+i).hide();
	$('#checkboxd'+i).attr("checked", false);
	$('#checkboxd'+i).parent().parent().removeClass('across_par1_bg1');
	$('#checkboxd'+i).parent().parent().addClass('across_par1_no');
}

//标准投注模式设定方法
function setValue(num) {
	for (var i = 0; i < mode[num].length; i++) {
		var id_num = mode[num][i];
		var id_name = "#txt" + mode[num][i];
		if (!$(id_name).attr("readonly")) {
			$(id_name).val(nub[id_num]);			
			setSelectCss(id_num);
			if(!$(id_name).val()){
				unsetSelectCss(id_num);
			}			
		}else{
			if(!$(id_name).val()){
				unsetSelectCss(id_num);
			}
		}
	}
}

//清除方法
function clear() {
	$("#panel").find("input[name='mdp_coin']").each(function() {
		if (!$(this).attr("readonly")) {
			$(this).val("");
			unsetSelectCss($(this).attr('id').replace('txt',''));	
		}		
	});
	$("#panel").find("input[name='checkboxd']").attr("checked", false);
	$("#totalvalue").val("0");
	$("#totalvalue2").val("0");
	$("#total_md_lottery").html("0");
	$("#total_md_lottery2").html("0");	
	$("#now_total").val("0");
	$(".new_standard a").each(function() {
		$(this).removeClass('standard_bg2');
		$(this).addClass('standard_bg1');
	});
}

//数字加千分符号
function number_format(n) {
	return n;
	// if(g28!='mdp') {
	// 	return n;
	// }
	// re = /(\d{1,3})(?=(\d{3})+(?:$|\.))/g
	// return n.replace(re, "$1,");
}

//设置所有投注
function setAllvalue(peilv) {
	$("#panel").find("input[name='mdp_coin']").each(function() {
		if (!$(this).attr("readonly")) {
			var txt_value = $.trim($(this).val()).replace(/,/gi, "");
			if (txt_value && !isNaN(txt_value)) {
				var new_value = Math.floor(txt_value * peilv);
				if(new_value>maxnum){
					showmsg("1", limit_msg);
					return false;
				}
				$(this).val(number_format(new_value + ""));
			}
		}
	});
}

//反选		  
function un_select() {
	$("input[name='checkboxd']").each(function(i) {
		if($("#txt0").length < 1){
			i = i + 1;
		}

		if($("#txt2").length < 1){
			i = i + 2;
		}
		if (!$(this).attr("disabled")) {
			if (!$(this).attr("checked")) {
				
				$('#txt'+i).val(nub[i]);
				setSelectCss(i);
				// console.log(i);
			} else {
				$('#txt'+i).val("");
				unsetSelectCss(i);
			}
		}
	}); 
	recount_coins();
}
//上期投注
function last_lottery() {
	$.ajax({
		type: "get",
		url: "index.php?do=lastLottery&g28="+g28,
		error: function() {
		},
		success: function(data, textStatus) {
			data && lottery_mode(data.split(","));
		}
	});
}
//自定义模式 
function personmode(url,id) {
	$.ajax({
		type: "post",
		dataType: "json",
		url: url,
		data: {model_id:id},
		success: function(data) {
			if(data.code_num == 10000){
				lottery_mode(data.bet_num.split(","));
				$(".J_moshi_save").each(function(){
					if($(this).hasClass("mode_save")){
						$(this).attr("data-id",id);
					}
				});
			}
		}
	});
}

//刷新赔率 
function refresh_odds(id) {
	$.ajax({
		type: "get",
		url: "index.php?do=odds&g28="+g28+"&issue=" + id,
		error: function() {
		},
		success: function(data, textStatus) {
			set_odds("", data.split(",")); //当前赔率
		}
	});
}

//页面载入时执行
function set_lottery_val(arr, flag) {
	if (left_time_out == "-1") {
		showmsg("1", "该期已经截止投注！", last_issue_id);
		return false;
	} 
	else if (is_clear_mdp == "1") {

	}
	// clear();
	$.each(arr,
		function(i) {
			if (this != "" && this!=0) {
				if ($("#txt" + i).attr("readonly")) {
					unsetSelectCss(i);
					return;
				}
				if (flag) {
					unsetSelectCss(i);
					$("#checkboxd" + i).attr("disabled", true);
					$("#txt" + i).attr("readonly", true).attr("disabled", true);
					$('#click_number'+i).removeClass('no_left_bg');
					$('#click_number'+i).addClass('no_left_bg_02');						
				} else {
					setSelectCss(i);
					$("#checkboxd" + i).attr("checked", true);
				}
				$("#txt" + i).val(number_format(this));
			}else{
				unsetSelectCss(i);
			}
		});
	recount_coins();
}

//自定义投注模式
function lottery_mode(arr, flag) {
	// if (left_time_out == "-1") {
	// 	showmsg("1", "该期已经截止投注！", last_issue_id);
	// 	return false;
	// }
	clear();
	$.each(arr,
	function(i) {
		if (this != "" && this!=0) {
			if ($("#txt" + i).attr("readonly")) {
				unsetSelectCss(i);
				return;
			}
			if (flag) {
				unsetSelectCss(i);
				$("#checkboxd" + i).attr("disabled", true);
				$("#txt" + i).attr("readonly", true).attr("disabled", true);
				$('#click_number'+i).removeClass('no_left_bg');
				$('#click_number'+i).addClass('no_left_bg_02');						
			} else {
				setSelectCss(i);
				$("#checkboxd" + i).attr("checked", true);
			}
			$("#txt" + i).val(number_format(this));
		}
	});
	recount_coins();
}

var first = 0;
//取总的投注比特币
function recount_coins() {
	var total = 0;
	var now_total = 0;
	$("#panel").find("input[name='mdp_coin']").each(function() {
		var txt_value = $.trim($(this).val()).replace(/,/gi, "");
		if (txt_value && !isNaN(txt_value)) {
			total += parseInt(txt_value);
			if (!$(this).attr("readonly")) {
				now_total += parseInt(txt_value);
			}
		}
	})
	// if(total>0) total = (total/satoshi).toFixed(8);
	if(now_total>0)  now_total = (now_total/satoshi).toFixed(8);
	$("#totalvalue").val(total);
	$("#totalvalue2").val(total);
	$("#total_md_lottery").html(_fenge(total.toString()));
	$("#total_md_lottery2").html(_fenge(total.toString()));		
	$("#now_total").val(now_total); //now throw		
	// if((total*satoshi)>(maxnum*27)){
	// 	showmsg("1", limit_msg);
	// 	return false;
	// }

/*	if (readcookie("handflag") == "1") {
		if ($("#totalvalue").val() != 0 && first == 0) {
			first = 1;
		}
	}*/

}

function set_odds(last_odds_ary, this_odds_ary) {
	if (last_odds_ary != "") {
		$.each(last_odds_ary,
			function(i) {
				var v = this + "";
				$("#last_lottery_odds" + i).text(v); //上期赔率
			})
	}
	if (this_odds_ary != "") {
		$.each(this_odds_ary,
			function(i) {
				var v = this + "";
				$("#this_lottery_odds" + i).text(v); //当前赔率
			})

	}
}

//判断是否当前正在投注的期数 
function judge_issue(issue) {
	var now_issue;
	$.ajax({
		type : "get",
		async:false, //同步
		url: "index.php?do=judge&g28="+g28+"&issue=" + issue+"&n="+Math.random(),
		error: function() {},
		success: function(data) {
			now_issue = parseInt(data);
		}
	});
	return now_issue;
}

//实时获取现有的比特币
function check_md() {
	var flag;
	$.ajax({
		type : "get",
		async:false, //同步
		url: "index.php?do=checkMd&g28="+g28+"&n="+Math.random(),
		error: function() {},
		success: function(data) {
			flag = data;
		}
	});
	return flag;
}

function check_auto() {
	var flag;
	$.ajax({
		type : "get",
		async:false, //同步
		url: "banker.php?do=judgeAutoBanker&type=3&g28="+g28+"&n="+Math.random(),
		//error: function() {},
		success: function(data) {
			flag = parseInt(data);
		}
	});
	return flag;
}

//确认投注	
function comform() {
	var t        = $("#totalvalue").val().replace(/,/gi, "");
	var throwing = $("#now_total").val().replace(/,/gi, "");
	var str = [];
	var soonIssue = judge_issue($('#_issue').val());
	
	if(soonIssue ){//过期
		showmsg("3", "对不起，当前投注已过期，是否进入最近一期？",soonIssue);
		return false;
	}else if (throwing == 0.00000000 || throwing ==0) {
		showmsg("1", "对不起，请先投注！");
		return false;
	}else if ((t*satoshi)>(maxnum*27)) {
		showmsg("1", limit_msg);
		return false;
	} else if (parseFloat(throwing) > parseFloat(check_md())) {
		showmsg("1", "您的比特币余额不足！");
		return false;
	} else {
		for (var i = 0; i < 28; i++) {
			var txt_value = $.trim($("#txt" + i).val()).replace(/,/gi, "");
			str.push(txt_value);
		}
		var checkFlag = check_auto();
		var extmsg = checkFlag?'本操作将会停止自动或坐庄投注模式！':'';
		$("#str_mdp_coin").val(str.join(","));
		showmsg("2", "确认投注<b class='lightred base_jg' style='color:red;'>"+throwing+"</b>个比特币！"+extmsg, last_issue_id);
		//t = number_format(String(t)); //将数字转字符串后千分位 
		//$("#total_lottery_coins").val(t);
	}
}



function sum_val(){
	var _val = '';
	for (var i = 0; i < 28; i++) {
		var txt_value = $.trim($("#txt" + i).val()).replace(/,/gi, "");
		if($("#txt" + i).length > 0){
			if(txt_value){
				_val = _val + txt_value + ',';
			}else{
				_val = _val + '0,';
			}
		}
	}
	_val = _val.substring(0,_val.length-1);
	return _val;
}



//取消投注
function cancel() {
	$('#depend_parent').val('0');
	$('#shade_div_id').hide();
	$('#message_box').hide();
	$('#message_casesave').hide();
	$('#message_modesh').hide();
	$('#used_leave_modou_num').val('');
}

//确认投注
function save_data() {
	$('#save_28data').removeAttr('onclick');
	$('#save_28data').unbind('click');
	$("input[name='mdp_coin']").attr("disabled", false);
	var form1 = document.getElementById("form1"); //父层
	form1.submit();
}

//滚动
function set_boxsize(id) {
	document.getElementById(id).style.top = (document.documentElement.scrollTop + document.body.scrollTop + (document.documentElement.clientHeight - document.getElementById(id).offsetHeight) / 2) + "px";
	document.getElementById(id).style.left = (document.documentElement.scrollLeft + (document.documentElement.clientWidth - document.getElementById(id).offsetWidth) / 2) + "px";
}

//window.onscroll = set_boxsize;

function showshade(){
	//弹出笼罩层
	var bodyheight = 1002;
	var shade_div_id = document.getElementById("shade_div_id");
	shade_div_id.style.display = 'block';
	shade_div_id.style.height  = parseInt(bodyheight) + 'px';	
}

//投注后信息返回
function showmsg(flag, msg, issue_id) {
	$("#message_box").css("display", "");
	set_boxsize("message_box");
	switch (flag) {
		case "0":
			if (readcookie("handflag") == "1") {
				setcookie("handflag", "2");
			}
			window.location.href = "index.php?g28="+g28;
			break;
		case "1":
			//投注失败
			$("#box_title").html('提示信息');
			$("#box_contents").html(msg);
			$("#box_confirm").html($.trim('<a href="javascript:;" onClick="cancel();"  class="a1">确定</a>') );
			//$("#submit_ok").addClass('mode_box_btn');
			break;
		case "4":
			$("#box_title").html('提示信息');
			$("#box_contents").html(msg);
			$("#box_confirm").html($.trim('<a href="javascript:;" onClick="cancel();document.location.reload();"  class="a1">确定</a>') );
			//$("#submit_ok").addClass('mode_box_btn');
			break;			
		case "2":
			//确认投注
			$("#box_contents").html(msg);
			$("#box_confirm").html($.trim('<a href="javascript:;" id="save_28data" onClick="save_data();"  class="a1">确定</a><a href="javascript:;" onclick="cancel();" class="a2">取消</a>') );
			//$("#submit_ok").addClass('mode_box_btn');
			//$("#submit_no").addClass('mode_box_btn');
			break;	
		case "3":
			//提示过期
			$("#box_contents").html(msg);
			$("#box_confirm").html($.trim('<a href="javascript:;" onclick="go_url('+issue_id+');"  class="a1">确定</a><a href="javascript:;" onclick="cancel();" class="a2">取消</a>') );
			//$("#submit_ok").addClass('mode_box_btn');
			//$("#submit_no").addClass('mode_box_btn');
			break;
	}
	showshade();
}



function go_url(id){
	document.location.href= 'index.php?do=add&g28='+g28+'&issue='+id;
}

function setSuoha(){
	var lotteryVal = $("#totalvalue").val().replace(/,/gi, "");
	if(lotteryVal>0){
		$("#message_modesh").show();
		var used_md = $('#used_leave_modou_num').val();
		var md = check_md();
		$('#old_leave_modou_num').val(md);
		$('#leave_modou_num').html(md);
		var md = used_md?used_md:md;
		$('#use_leave_modou_num').val(md);
		$('#used_leave_modou_num').val(md);
		set_boxsize('message_modesh');
		showshade();		
	}
}

function setSmallSuoha(val,sel){
	for(var i=0;i<=4;i++){
		$('#suoha'+i).removeClass('sel');
		if(sel==i){
			$('#suoha'+i).addClass('sel');
		}
	}
	var old_md = $('#old_leave_modou_num').val();
	var md     = old_md?old_md:check_md();
	var after_md = (md*val).toFixed(8);//format 8 point
	$('#use_leave_modou_num').val(after_md);
	$('#used_leave_modou_num').val(after_md);		
}

function checkSuoha(){
	var used_md = ($('#used_leave_modou_num').val())*satoshi;
	var sel_md  = ($("#totalvalue").val().replace(/,/gi, ""))*satoshi;
	var total   = compare_md = 0;
	$("#panel").find("input[name='mdp_coin']").each(function() {
		if (!$(this).attr("readonly")) {
			var txt_value = $.trim($(this).val()).replace(/,/gi, "");
			if (txt_value && !isNaN(txt_value)) {
				var new_value = parseInt((txt_value/sel_md)*used_md);
				if(new_value>maxnum){
					showmsg("1", limit_msg);
					cancel();
					return false;
				}
				//total +=new_value;
				$(this).val(new_value);
			}
		}
	});		
	//if(compare_md = parseInt(used_md-total)){}
	recount_coins();
	cancel();
}

/**
 * 简易/标准模式切换
 * @param i
 */
function modes_easy_all(i) {
	if (i == 1) {
		$("#m_a0").removeClass("sel");
		$("#m_a1").addClass("sel");
		$("#modes_easy").hide();
		$("#modes_all").show();
	} else {
		$("#m_a0").addClass("sel");
		$("#m_a1").removeClass("sel");
		$("#modes_easy").show();
		$("#modes_all").hide();
	}
}