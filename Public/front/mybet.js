(function(){
    // 走势图
	var Arr_data = eval($("#container").attr("data-bet"));

	 $('#container').highcharts({
        title: {
            text: ' ',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: [Arr_data[0][0], Arr_data[0][1], Arr_data[0][2], Arr_data[0][3], Arr_data[0][4], Arr_data[0][5], Arr_data[0][6]]
        },
        yAxis: {
            title: {
                text: ''
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: '盈余',
            data: [parseInt(Arr_data[1][0]),parseInt(Arr_data[1][1]), parseInt(Arr_data[1][2]), parseInt(Arr_data[1][3]), parseInt(Arr_data[1][4]), parseInt(Arr_data[1][5]), parseInt(Arr_data[1][6])]
        }]
	});


    $(".J_moshi_save").click(function(e){
        e.preventDefault();

        var _id = $(this).attr("data-id");

        var _html = '<label class="moshi-input-box" for="">'+
                    '<span class="moshi-input-title">模式名称 :</span>'+
                    '<p class="moshi-input"><input class="moshi_name_input" type="text"></p>'+
                '</label>'+
                '<a class="btn-color-red place-left J_moshi_ajax" href="#" data-id="'+ _id +'">确 认</a>'+
                '<a class="btn-color-gray place-right J_fcBtn_cancel" href="#">取 消</a>';

        $(".fuceng-html-box .fc-main-box").html(_html);
        $(".black-cover").show();
        $(".fuceng-html-box").show();

    });

    $(".fc-main-box").delegate(".J_moshi_ajax","click",function(e){
        e.preventDefault();

        var _url = $("#amain").attr("data-url"),
            _id = $(this).attr("data-id"),
            _name = $(".fc-main-box .moshi_name_input").val();

        if(_name == ''){

        }else{
            $.ajax({
                url: _url,
                type: "post",
                dataType: "json",
                data: {
                    name:_name,
                    model_id:'',
                    period_no:_id
                },
                success: function(data){
                    error_fc1(data.msg);
                }
            });
        }
    });


    function error_fc1(msg){
        var _html = '<p class="mn-p">'+ msg +'</p><a class="btn-color-red place-middle J_reload_btn" id="J_errorBtn" href="#">确 认</a>';

        $(".fuceng-html-box .fc-main-box").html(_html);
        $(".black-cover").show();
        $(".fuceng-html-box").show();
    }


    // 关闭按钮
    $(".J_closefc").click(function(e){
        e.preventDefault();

        $(".black-cover").hide();
        $(".fuceng-html-box").hide();
    });

    // 错误提示确定关闭
    $(".fc-main-box").delegate("#J_errorBtn,.J_fcBtn_cancel","click",function(e){
        e.preventDefault();

        $(".black-cover").hide();
        $(".fuceng-html-box").hide();
    });





})(jQuery);