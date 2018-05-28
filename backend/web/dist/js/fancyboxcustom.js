$(function(){

	//全选
	 $("#selectAll").click(function(){
         var isChecked = $(this).prop('checked');
		$("#checkBoxList :checkbox").prop("checked",isChecked);;
	});  

	//表单提交
	$("#submit").click(function(){
		if (checkform()) {
            var post = $('form').serialize();
            var url = $('form').attr('action');
            $.post(url , post , function(data){
                eval('myjson=' + data + ';');
                if (myjson.statusCode == 200) {
                    $('.modal-body').text(myjson.message);
                    $('#myModal').modal({backdrop:false,show:true});
                    $('.btn').click(function() {
                        history.go(-1);
                    });
                } else if (myjson.statusCode == 300) {
                    $('.modal-body').text(myjson.message);
                    $('#myModal').modal({backdrop:false,show:true});
                }
            });
		}
	});

	//删除
	$('.del').click(function () {
		if (confirm('您确定要删除本条信息吗？')) {
            var url = $(this).attr('url');
            $.get(url , null , function (myjson) {
                if (myjson.statusCode == 200) {
                    $('.modal-body').text(myjson.message);
                    $('#myModal').modal({backdrop:false,show:true});
                    $('.btn').click(function() {
                       window.href = window.location.reload();
                    });
                } else if (myjson.statusCode == 300) {
                    $('.modal-body').text(myjson.message);
                    $('#myModal').modal({backdrop:false,show:true});
                }
            },'json');
		}
    });

	//其他首页操作
	$('.qita').click(function () {
        var url = $(this).attr('url');
        $.get(url, null, function (myjson) {
            if (myjson.statusCode == 200) {
                $('.modal-body').text(myjson.message);
                $('#myModal').modal({backdrop: false, show: true});
                $('.btn').click(function () {
                    window.href = window.location.reload();
                });
            } else if (myjson.statusCode == 300) {
                $('.modal-body').text(myjson.message);
                $('#myModal').modal({backdrop: false, show: true});
            }
        }, 'json');
    });

	//表单提交验证
	function checkform()
	{
			var inputtext = '';
			var name = '';
			var inputhtml = '';
			var ck = '';
			var falg = true;
			$(':input').each(function(){
                $(this).parent().find("#error").remove();
				ck = $(this).attr('ck');
                inputtext = $(this).val();
                inputname = $(this).attr('name');
				if (ck == 'required'){
                    name = $(this).attr('placeholder');
                    if(inputtext == ''){
                        $(this).parent().append(" <span style='color: red;' id='error'>"+name+"不能为空</span>");
                        falg = false;
                        return false;
                    }

                    if(inputname == 'email'){
                        //验证邮箱地址
                        if (inputtext.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1){
                            $(this).parent().append("<span  style='color: red;' id='error'>"+name+"格式错误</span>");
                            falg = false;
                            return false;
                        }
                    }else if(inputname == 'phone'){
                        //验证电话号码手机号码，包含至今所有号段
                        var ab=/^(13[0-9]|15[0-9]|18[2|6|7|8|9])\d{8}$/;

                        if(ab.test(inputtext) == false){
                            $(this).parent().append("<span  style='color: red;' id='error'>"+name+"格式错误</span>");
                            falg = false;
                            return false;
                        }
                    }
				}
			});
			return falg;
		}


	//导入
	$("#subFile").click(function(){
		var options = {
			success: function(data){
				eval('myjson=' + data + ';');

                if (myjson.statusCode == 200) {
                    $('.modal-body').text(myjson.message);
                    $('#myModal').modal({backdrop:false,show:true});
                    $('.btn').click(function() {
                        window.href = window.location.reload();
                    });
                } else if (myjson.statusCode == 300) {
                    $('.modal-body').text(myjson.message);
                    $('#myModal').modal({backdrop:false,show:true});
                }
			}
		}
		$('#J_myUploadForm').ajaxSubmit(options);
	});
});