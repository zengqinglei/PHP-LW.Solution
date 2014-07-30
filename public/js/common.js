// 全局配置
var LW = {
    Url: {
        getValidCode: '/index.php/service/getvalidcode'
    },
    ajaxError: function (XMLHttpRequest, callback) {
        switch (XMLHttpRequest.status) {
            case 401:
                {
                    // show login dialog
                    if (XMLHttpRequest.responseText) {
                        var data = $.parseJSON(XMLHttpRequest.responseText);
                        if (data.url) {
                            window.location = data.url;
                        }
                    }
                }
                break;
            case 403:
                {
                    showMsg({ icon: "error", msg: "很抱歉，无权限执行此操作！" });
                }
                break;
            case 404:
                {
                    showMsg({ icon: "error", msg: "很抱歉，您所访问的地址不存在！" });
                }
                break;
            case 408:
                {
                    showMsg({ icon: "error", msg: "很抱歉，请求超时！" });
                }
                break;
            case 500:
                {
                    showMsg({ icon: "error", msg: "很抱歉，服务器错误，请稍后重试！" });
                }
                break;
            default:
                {
                    showMsg({ icon: "error", msg: "很抱歉，数据加载失败，请稍后重试！" });
                }
                break;
        }
    }
};
// 日期格式化
Date.prototype.format = function (format) {
    var o = {
        "M+": this.getMonth() + 1, //month
        "d+": this.getDate(),    //day
        "H+": this.getHours(),   //hour
        "m+": this.getMinutes(), //minute
        "s+": this.getSeconds(), //second
        "q+": Math.floor((this.getMonth() + 3) / 3),  //quarter
        "S": this.getMilliseconds() //millisecond
    }
    if (/(y+)/.test(format)) format = format.replace(RegExp.$1,
    (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o) if (new RegExp("(" + k + ")").test(format))
        format = format.replace(RegExp.$1,
        RegExp.$1.length == 1 ? o[k] :
        ("00" + o[k]).substr(("" + o[k]).length));
    return format;
}

// 刷新验证码
function refreshValidCode(control) {
    $(control).attr('src', LW.Url.getValidCode + "?random=" + new Date());
}

// 返回 级数
function goHistory(i) {
    window.history.go(i);
}

//省市县三级联动
function areaLinkage(isLoad) {
    var loadArea = function (domSelect, parentId) {
        $.get("/service/getareachilds", { parentid: parentId }, function (data) {
            $(data).each(function () {
                $(domSelect).append("<option value=\"" + this.area_id + "\">" + this.title + "</option>");
            });
        }, "json");
    }
    $(".select-province,.select-city").change(function () {
        var siblings_selects = $(this).find("~select");
        siblings_selects.find("option:gt(0)").remove();
        var parentId = $(this).val();
        if (siblings_selects.length > 0 && $.trim(parentId).length > 0) {
            var next_select = siblings_selects.eq(0);
            loadArea(next_select, parentId);
        }
    });

    if (isLoad) { loadArea($(".select-province"), ""); }
}

// 获取账户余额
function getBalance(target,callback){
	$(target).text('...');
	$.get('/service/getbalance',function(balance){
		$(target).text(balance);
		if(typeof callback == 'function'){
			callback(balance);
		}
	});
}

// 计算快递运费
function postCouriercharges(target,province,express,weight,callback){
	$(target).text('...');
	$.post('/service/postcouriercharges',
	{
		province:province,
		express:express,
		weight:weight
	},function(couriercharges){
		$(target).text(couriercharges);
		if(typeof callback == 'function'){
			callback(couriercharges);
		}
	});
}