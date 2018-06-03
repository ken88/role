<?php
use yii\widgets\LinkPager;
include '../views/viewtop.php';
?>
<style type="text/css">
    .fenpei{ height: 60px;}
</style>
<div class="page-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">公海简历列表</h3>
                <ul class="breadcrumb">
                    <li> <i class="icon-home"></i>首页 <i class="icon-angle-right"></i> </li>
                    <li> 简历管理<i class="icon-angle-right"></i> </li>
                    <li>公海简历列表</li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
            <div class="span12">
                <form action="/gong-hai/index" method="get">
                    <input type="hidden" name="moduleId" value="<?=$userInfo['moduleId']?>" />
                    <div class="panel-heading">
                        <table width="100%" border="0" id="seach">
                            <tr>
                                <td width="5%">姓名：</td>
                                <td width="12%"><input class="form-control"  name="userName" value="<?=$userInfo['userName'];?>" placeholder="姓名" /></td>
                                <td width="6%">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</td>
                                <td width="13%"><select class="chosen-with-diselect span4" name="sex" id="sex">
                                        <option value="">请选择</option>
                                        <option value="1">男</option>
                                        <option value="2">女</option>
                                    </select></td>
                                <td width="5%">手机号：</td>
                                <td width="13%"><input class="form-control" name="phone" value="<?=$userInfo['phone'] == 0 ? '' : $userInfo['phone'];?>" maxlength="11" placeholder="手机号" /></td>
                            </tr>
                            <tr>
                                <td>年龄：</td>
                                <td><input class="form-control"  name="age" id="age" value="<?=$userInfo['age'] == 0 ? '' : $userInfo['age'];?>" maxlength="3" placeholder="年龄" /></td>
                                <td>期望薪资：</td>
                                <td><select class="chosen-with-diselect span4" name="qiWangXinZi" id="qiWangXinZi">
                                        <option value="">请选择</option>
                                        <option value="1000~3000">1000~3000</option>
                                        <option value="3000~5000">3000~5000</option>
                                        <option value="5000~7000">5000~7000</option>
                                        <option value="7000以上">7000以上</option>
                                    </select></td>
                                <td>密&nbsp;&nbsp;&nbsp;号：</td>
                                <td><select class="chosen-with-diselect span4" name="isMiHao" id="isMiHao">
                                        <option value="">请选择</option>
                                        <option value="1">是</option>
                                        <option value="0">否</option>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td>学历：</td>
                                <td><select name="xueLi" id="xueLi" class="chosen-with-diselect span4">
                                        <option value="">请选择</option>
                                        <option value="初中">初中</option>
                                        <option value="技校">技校</option>
                                        <option value="高中">高中</option>
                                        <option value="中专">中专</option>
                                        <option value="大专">大专</option>
                                        <option value="本科">本科</option>
                                        <option value="研究生">研究生</option>
                                        <option value="硕士">硕士</option>
                                        <option value="博士">博士</option>
                                    </select></td>
                                <td>岗&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;位：</td>
                                <td colspan="2"><select class="chosen-with-diselect span4" name="rcId1" id="rcId1"  >
                                        <option value="">请选择</option>
                                        <?php  if (!empty($gangwei)){foreach ($gangwei as $v){?>
                                            <option value="<?=$v['id'];?>">
                                                <?=$v['cName'];?>
                                            </option>
                                        <?php }} ?>
                                    </select>
                                    <select class="chosen-with-diselect span4" name="rcId2" id="rcId2" >
                                        <option value="">请选择</option>
                                    </select></td>
                                <td><input name="submit" type="submit" class="btn blue" value="搜索" /></td>
                            </tr>
                        </table>
                    </div>
                </form>
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-cogs"></i>数据列表</div>
                    </div>
                    <div class="portlet-body no-more-tables">
                        <form action="/gong-hai/fen-pei" method="post" enctype="multipart/form-data" id="form1" name="form"  >
                            <input type="hidden" id="num" value="<?=$num;?>" />
                            <div id="fenpei">
                                <?php $flag = false; foreach ($aclList['moduleBut'] as $v){if (in_array($v['id'],$aclList['acl'])){?>
                                    <?php  if ($v['moduleName'] == '分配') {$flag = true;?>
                                        <a id="fenpei" href="#" style="float: left;"><button type="button" class="btn blue">分配</button></a>
                                        <span style="color:red; font-weight:bold; font-size:14px; margin-left:20px;">您部门当前的贡献值为<?=$num;?>,可分配<?=$num;?>条简历信息</span>
                                    <?php }?>
                                <?php }} ?>
                            </div>
                            <?php if ($flag){?>
                                <div style="margin-left:80px;  margin-top:-30px;">部门人员：
                                    <div class="controls">
                                    <?php if(!empty($user)){foreach($user as $v){?>
                                        <label class="radio">
                                            <div class="radio"><span><input type="radio" name="radios" value="<?=$v['id'];?>"></span></div><?=$v['realName'];?>
                                        </label>
                                    <?php }}?>
                                    </div>
                                </div>
                            <?php }?>
                            <table class="table-bordered table-striped table-condensed cf">
                            <thead class="cf">
                            <tr>
                                <th><input type="checkbox" id="selectAll" /></th>
                                <th>姓名</th>
                                <th>性别</th>
                                <th>年龄</th>
                                <th>学历</th>
                                <th>密号</th>
                                <th>岗位分类</th>
                                <th>期望岗位</th>
                                <th>期望薪资</th>
                                <th>期望地点</th>
                                <th>居住地</th>
                                <th>创建时间</th>
                            </tr>
                            </thead>
                            <tbody id="checkBoxList">
                            <?php if (!empty($info)) {foreach ($info as $v) { ?>
                                <tr class="odd gradeX">
                                    <td><input type="checkbox" name="ids[]" value="<?=$v['id'];?>" /></td>
                                    <td><?=$v['userName'];?></td>
                                    <td><?=$v['sex'] == 1 ? '男' : '女';?></td>
                                    <td><?=$v['age'];?></td>
                                    <td><?=$v['xueLi'];?></td>
                                    <td><?=$v['isMiHao'] == 1 ? '是' : '否';?></td>
                                    <td><?=$v['rcName1'];?></td>
                                    <td><?=$v['rcName2'];?></td>
                                    <td><?=$v['qiWangXinZi'];?></td>
                                    <td><?=$v['qiWangDiDian'];?></td>
                                    <td><?=$v['juZhuDiZhi'];?></td>
                                    <td><?=$v['createTime'];?></td>
                                </tr>
                            <?php }}?>
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
                <div class="dataTables_paginate paging_bootstrap pagination"> <?php echo LinkPager::widget([
                        'pagination' => $pages,
                        'nextPageLabel' => '下一页',
                        'prevPageLabel' => '上一页',
                        'firstPageLabel' => '首页',
                        'lastPageLabel' => '尾页',
                    ]);?> </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->
</div>



<!--<div id="page-inner">-->
<!--    <div class="row">-->
<!--        <div class="col-md-12">-->
<!--            <h1 class="page-header">-->
<!--                公海简历列表-->
<!--            </h1>-->
<!--        </div>-->
<!--    </div>-->
<!--    <!-- /. ROW  -->-->
<!---->
<!--    <div class="row">-->
<!--        <div class="col-md-12">-->
<!--		 <form action="/gong-hai/index" method="get">-->
<!--				<input type="hidden" name="moduleId" value="--><?//=$userInfo['moduleId']?><!--" />-->
<!--                <div class="panel-heading">-->
<!--                 <table width="100%" border="0" id="seach" >-->
<!--                    <tr>-->
<!--                      <td width="5%">姓名：</td>-->
<!--                      <td width="12%"><input class="form-control"  name="userName" value="--><?//=$userInfo['userName'];?><!--" placeholder="姓名" /></td>-->
<!--                      <td width="6%">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</td>-->
<!--                      <td width="13%"><select class="form-control" name="sex" id="sex">-->
<!--                          <option value="">请选择</option>-->
<!--                          <option value="1">男</option>-->
<!--                          <option value="2">女</option>-->
<!--                      </select></td>-->
<!--                      <td width="5%">学历：</td>-->
<!--                      <td width="13%"><select name="xueLi" id="xueLi" class="form-control">-->
<!--                        <option value="">请选择</option>-->
<!--                        <option value="初中">初中</option>-->
<!--                        <option value="技校">技校</option>-->
<!--                        <option value="高中">高中</option>-->
<!--                        <option value="中专">中专</option>-->
<!--                        <option value="大专">大专</option>-->
<!--                        <option value="本科">本科</option>-->
<!--                        <option value="研究生">研究生</option>-->
<!--                        <option value="硕士">硕士</option>-->
<!--                        <option value="博士">博士</option>-->
<!--                      </select></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                      <td>年龄：</td>-->
<!--                      <td><input class="form-control"  name="age" id="age" value="--><?//=$userInfo['age'];?><!--" maxlength="3" placeholder="年龄" /></td>-->
<!--                      <td>期望薪资：</td>-->
<!--                      <td><select class="form-control" name="qiWangXinZi" id="qiWangXinZi">-->
<!--                          <option value="">请选择</option>-->
<!--                          <option value="1000~3000">1000~3000</option>-->
<!--                          <option value="3000~5000">3000~5000</option>-->
<!--                          <option value="5000~7000">5000~7000</option>-->
<!--                          <option value="7000以上">7000以上</option>-->
<!--                      </select></td>-->
<!--                      <td>密号：</td>-->
<!--                      <td><select class="form-control" name="isMiHao" id="isMiHao">-->
<!--                          <option value="">请选择</option>-->
<!--                          <option value="1">是</option>-->
<!--                          <option value="0">否</option>-->
<!--                        </select>                      </td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                      <td>岗位：</td>-->
<!--                      <td colspan="4"><select class="form-control" name="rcId1" id="rcId1"  style="float:left; margin-right:10px;">-->
<!--                        <option value="">请选择</option>-->
<!--                        --><?php // if (!empty($gangwei)){foreach ($gangwei as $v){?>
<!--                        <option value="--><?//=$v['id'];?><!--">-->
<!--                        --><?//=$v['cName'];?>
<!--                        </option>-->
<!--                        --><?php //}} ?>
<!--                      </select>                        <select class="form-control" name="rcId2" id="rcId2"  style="margin-left:30px;">-->
<!--                        <option value="">请选择</option>-->
<!--                                              </select></td>-->
<!--                      <td><input name="submit" type="submit" class="btn btn-danger" value="搜索" /></td>-->
<!--                    </tr>-->
<!--                  </table>-->
<!---->
<!--                </div>-->
<!--                </form>-->
<!--                <div style="border: solid gainsboro 1px;"></div>-->
<!--            <!-- Advanced Tables -->-->
<!--			<form action="/gong-hai/fen-pei" method="post" enctype="multipart/form-data" id="form1" name="form"  >-->
<!--			<input type="hidden" id="num" value="--><?//=$num;?><!--" />-->
<!--            <div class="panel panel-default">-->
<!--                <div style="border: solid gainsboro 1px;"></div>-->
<!--                    <div class="panel-heading" style="height: 60px;">-->
<!--                        --><?php //foreach ($aclList['moduleBut'] as $v){if (in_array($v['id'],$aclList['acl'])){?>
<!--                            --><?php // if ($v['moduleName'] == '分配') {?>
<!--                                <a id="fenpei" href="#" class="btn btn-info btn-sm" style="float: left;">分配</a>-->
<!--								<span style="color:red; font-weight:bold; font-size:14px; margin-left:20px;">您部门当前的贡献值为--><?//=$num;?><!--,可分配--><?//=$num;?><!--条简历信息</span>-->
<!--                                --><?php //}?>
<!--                        --><?php //}} ?>
<!--                    </div>-->
<!--					<div style="margin-left:80px;  margin-top:-30px; width:auto;">部门人员：-->
<!--						--><?php //if(!empty($user)){foreach($user as $v){?>
<!--							<span style="margin-right:10px;"><input type="radio" name="radios" value="--><?//=$v['id'];?><!--" />--><?//=$v['realName'];?><!--</span>-->
<!--						--><?php //}}?>
<!--					</div>-->
<!--               -->
<!--                <div class="panel-body">-->
<!--                    <div class="table-responsive">-->
<!--                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">-->
<!--                            <thead>-->
<!--                            <tr>-->
<!--								<th><input type="checkbox" id="selectAll" /></th>-->
<!--                                <th>姓名</th>-->
<!--                                <th>性别</th>-->
<!--                                <th>年龄</th>-->
<!--                                <th>学历</th>-->
<!--                                <th>密号</th>-->
<!--                                <th>岗位分类</th>-->
<!--                                <th>期望岗位</th>-->
<!--                                <th>期望薪资</th>-->
<!--                                <th>期望地点</th>-->
<!--                                <th>目前居住地</th>-->
<!--                                <th>创建时间</th>-->
<!--                            </tr>-->
<!--                            </thead>-->
<!--                            <tbody id="checkBoxList">-->
<!--                            --><?php //if (!empty($info)) {foreach ($info as $v) { ?>
<!--                            <tr class="odd gradeX">-->
<!--								<td><input type="checkbox" name="ids[]" value="--><?//=$v['id'];?><!--" /></td>-->
<!--                                <td>--><?//=$v['userName'];?><!--</td>-->
<!--                                <td>--><?//=$v['sex'] == 1 ? '男' : '女';?><!--</td>-->
<!--                                <td>--><?//=$v['age'];?><!--</td>-->
<!--                                <td>--><?//=$v['xueLi'];?><!--</td>-->
<!--                                <td>--><?//=$v['isMiHao'] == 1 ? '是' : '否';?><!--</td>-->
<!--                                <td>--><?//=$v['rcName1'];?><!--</td>-->
<!--                                <td>--><?//=$v['rcName2'];?><!--</td>-->
<!--                                <td>--><?//=$v['qiWangXinZi'];?><!--</td>-->
<!--                                <td>--><?//=$v['qiWangDiDian'];?><!--</td>-->
<!--                                <td>--><?//=$v['juZhuDiZhi'];?><!--</td>-->
<!--                                <td>--><?//=$v['createTime'];?><!--</td>-->
<!--                            </tr>-->
<!--                            --><?php //}}?>
<!--                            </tbody>-->
<!--                        </table>-->
<!--                        <div style="float: right">-->
<!--                            --><?php //echo LinkPager::widget([
//                                'pagination' => $pages,
//                                'nextPageLabel' => '下一页',
//                                'prevPageLabel' => '上一页',
//                                'firstPageLabel' => '首页',
//                                'lastPageLabel' => '尾页',
//                            ]);?>
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--			 </form>-->
<!--            <!--End Advanced Tables -->-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- 模态框（Modal） -->
<div class="modal fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">确定
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<script type="text/javascript">
$('#fenpei').click(function(){
	var num = $('#num').val();
	var count = $("#checkBoxList input:checkbox:checked").length; 
	var redio = $("input[name='radios']:checked").val();
	if(count == 0) {
		alert('请选择简历信息！');
		return false;
	} else if(count > num) {
		alert('分配数量大于贡献值，当前分配数'+count+'贡献值'+num);
		return false;
	} else if(redio == null){
		alert("请选择部门人员！");
		return false;
	}
	
	var post = $('#form1').serialize();
    var url = $('#form1').attr('action');
	$.post(url , post , function(data){
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
	});
})
</script>
<script type="text/javascript">
var xueLi = '<?=$userInfo['xueLi'];?>';
var sex = '<?=$userInfo['sex'];?>';
var qiWangXinZi = '<?=$userInfo['qiWangXinZi'];?>';
var isMiHao = '<?=$userInfo['isMiHao'];?>';
var rcId1 = '<?=$userInfo['rcId1'];?>';
var rcId2 = '<?=$userInfo['rcId2'];?>';
$("#xueLi option[value='"+xueLi+"']").attr("selected",true);
$("#sex option[value='"+sex+"']").attr("selected",true);
$("#qiWangXinZi option[value='"+qiWangXinZi+"']").attr("selected",true);
$("#isMiHao option[value='"+isMiHao+"']").attr("selected",true);
$("#rcId1 option[value='"+rcId1+"']").attr("selected",true);



$('#rcId1').change(function () {
    var id = $(this).val();
    if (id != '') {
        $.post('/resume-category/ajax-category',{'id':id},function (data) {
            $('#rcId2').html('');
            var strHtml = "<option value=''>请选择</option>";
            var count = data.length;
            var val = null;
            for(var i = 0 ; i < count ; i++) {
                val = data[i]['id'];
                strHtml += "<option value='"+val+"'>"+data[i]['cName']+"</option>";
            }
            $('#rcId2').html(strHtml);

        },'json')
    } else  {
        var strHtml = "<option value=''>请选择</option>";
        $('#rcId2').html(strHtml);
    }
})

if (rcId1 != '') {
    $.post('/resume-category/ajax-category',{'id':rcId1},function (data) {
        $('#rcId2').html('');
        var strHtml = "<option value=''>请选择</option>";
        var count = data.length;
        var val = null;
        for(var i = 0 ; i < count ; i++) {
            val = data[i]['id'];
            strHtml += "<option value='"+val+"'>"+data[i]['cName']+"</option>";
        }
        $('#rcId2').html(strHtml);

        $("#rcId2 option[value='"+rcId2+"']").attr("selected",true);

    },'json')
}

var falg = <?=$flag?>;
if(falg) {
    $('#fenpei').addClass('fenpei');
}
</script>