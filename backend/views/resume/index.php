<?php

use yii\widgets\LinkPager;

include '../views/viewtop.php';
?>
<style type="text/css">
    .ceng{z-index: 9999;width:200px;height:200px;margin-bottom: 2px;position: absolute;background: #FFF;border: solid 1px #6e8bde; display:none;}
</style>
<link href="/media/css/jquery.fileupload-ui.css" rel="stylesheet"/>

<div class="page-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">简历列表</h3>
                <ul class="breadcrumb">
                    <li><i class="icon-home"></i>首页 <i class="icon-angle-right"></i></li>
                    <li> 简历管理<i class="icon-angle-right"></i></li>
                    <li>简历列表</li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
            <div class="span12">
                <form action="/resume/index" method="get">
                    <input type="hidden" name="moduleId" value="<?= $userInfo['moduleId'] ?>"/>
                    <div class="panel-heading">
                        <table width="100%" border="0" id="seach">
                            <tr>
                                <td width="5%">姓名：</td>
                                <td width="12%"><input class="form-control" name="userName"
                                                       value="<?= $userInfo['userName']; ?>" placeholder="姓名"/></td>
                                <td width="6%">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</td>
                                <td width="13%"><select class="chosen-with-diselect span4" name="sex" id="sex">
                                        <option value="">请选择</option>
                                        <option value="1">男</option>
                                        <option value="2">女</option>
                                    </select></td>
                                <td width="5%">手机号：</td>
                                <td width="13%"><input class="form-control" name="phone"
                                                       value="<?= $userInfo['phone'] == 0 ? '' : $userInfo['phone']; ?>"
                                                       maxlength="11" placeholder="手机号"/></td>
                            </tr>
                            <tr>
                                <td>年龄：</td>
                                <td><input class="form-control" name="age" id="age"
                                           value="<?= $userInfo['age'] == 0 ? '' : $userInfo['age']; ?>" maxlength="3"
                                           placeholder="年龄"/></td>
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
                                <td colspan="2"><select class="chosen-with-diselect span4" name="rcId1" id="rcId1">
                                        <option value="">请选择</option>
                                        <?php if (!empty($gangwei)) {
                                            foreach ($gangwei as $v) { ?>
                                                <option value="<?= $v['id']; ?>">
                                                    <?= $v['cName']; ?>
                                                </option>
                                            <?php }
                                        } ?>
                                    </select>
                                    <select class="chosen-with-diselect span4" name="rcId2" id="rcId2">
                                        <option value="">请选择</option>
                                    </select>
                                   </td>
                                <td></td>
                            </tr>
							<tr>
								<td> 操作人：</td>
								<td><input class="form-control" name="uName"
                                                       value="<?= $userInfo['uName']; ?>" placeholder="操作人"/></td>
								<td><input name="submit" type="submit" class="btn blue" value="搜索"/></td>
							</tr>
                        </table>
                    </div>
                </form>


                <div class="row-fluid fileupload-buttonbar">
                    <div class="span7" style="height: 60px">
                        <form action="/resume/pour-excel" method="post" enctype="multipart/form-data" name="form"
                              id="J_myUploadForm">
                            <div class="panel-heading" style="height: 60px;">
                                <?php foreach ($aclList['moduleBut'] as $v) {
                                    if (in_array($v['id'], $aclList['acl'])) { ?>
                                        <?php if ($v['moduleName'] == '新增') { ?>
                                            <a href="<?= $v['url'] ?>">
                                      <span class="btn green fileinput-button">
                                          <i class="icon-plus"></i>
                                          <span>新增简历</span>
                                      </span>
                                            </a>
                                        <?php }
                                        if ($v['moduleName'] == '导入') { ?>
                                            <span class="btn green fileinput-button">
									<i class="icon-plus icon-white"></i>
									<span>导入简历</span>
                                      <input type="file" name="file" id="file">
                                  </span>
                                            <span id="fileVal"></span>
                                            <a href="#" id="subFile" val="<?= $v['url'] ?>">
                                                <button type="button" class="btn red delete">
                                                    <span>确定导入</span>
                                                </button>
                                            </a>
                                            <a href="/模板/简历标准版.xlsx">
                                                <button type="button" class="btn yellow">
                                                    <span>模板下载</span>
                                                </button>
                                            </a>
                                            <br>
                                            <span style="color: red;">说明：每次导入不可大于300条数据，已经录入过的号码或号码为空将被过滤</span>
                                        <?php } ?>
                                    <?php }
                                } ?>
                            </div>
                        </form>

                    </div>
                </div>

                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-cogs"></i>数据列表</div>
                    </div>
                    <div class="portlet-body no-more-tables">
                        <table class="table-bordered table-striped table-condensed cf">
                            <thead class="cf">
                            <tr>
                                <th>姓名</th>
                                <th>性别</th>
                                <th>年龄</th>
                                <th>学历</th>
                                <th>联系方式</th>
                                <th>密号</th>
                                <th>岗位分类</th>
                                <th>期望岗位</th>
                                <th>期望薪资</th>
                                <th>期望地点</th>
                                <th>居住地</th>
                                <th>备注</th>
                                <th>操作人</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($info)) {
                                foreach ($info as $v) { ?>
                                    <tr class="odd gradeX">
                                        <td><?= $v['userName']; ?></td>
                                        <td><?= $v['sex'] == 1 ? '男' : '女'; ?></td>
                                        <td><?= $v['age']; ?></td>
                                        <td><?= $v['xueLi']; ?></td>
                                        <td><?= $v['phone']; ?></td>
                                        <td><?= $v['isMiHao'] == 1 ? '是' : '否'; ?></td>
                                        <td><?= $v['rcName1']; ?></td>
                                        <td><?= $v['rcName2']; ?></td>
                                        <td><?= $v['qiWangXinZi']; ?></td>
                                        <td><?= $v['qiWangDiDian']; ?></td>
                                        <td><?= $v['juZhuDiZhi']; ?></td>
                                        <td><a class="ver" href="#" id="<?=$v['id']?>"><?= !empty($v['beiZhu']) ? mb_substr($v['beiZhu'],0,5,'UTF-8') : '无'; ?></a><div class="ceng"><?=$v['beiZhu'];?></div></td>
                                        <td><?= $v['uName']; ?></td>
                                        <td><?= $v['createTime']; ?></td>
                                        <td>
                                            <?php foreach ($aclList['moduleBut'] as $val) {
                                                if (in_array($val['id'], $aclList['acl'])) { ?>
                                                    <?php if ($val['moduleName'] == '编辑') { ?>
                                                        <a href="<?= $val['url'] ?>?id=<?= $v['id'] ?>">编辑</a>
                                                    <?php } elseif ($val['moduleName'] == '删除') { ?>
                                                        <a class="del" href="#"
                                                           url="<?= $val['url'] ?>?id=<?= $v['id'] ?>">删除</a>
                                                    <?php } elseif ($val['moduleName'] == '角色授权') { ?>
                                                        <a href="<?= $val['url'] ?>?roleId=<?= $v['id'] ?>">角色授权</a>
                                                    <?php } elseif ($val['moduleName'] == '投放公海') { ?>
                                                        <a class="qita" href="#"
                                                           url="<?= $val['url'] ?>?id=<?= $v['id'] ?>">投放公海</a>
                                                    <?php } ?>
                                                <?php }
                                            } ?>
                                        </td>
                                    </tr>
                                <?php }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="dataTables_paginate paging_bootstrap pagination"> <?php echo LinkPager::widget([
                        'pagination' => $pages,
                        'nextPageLabel' => '下一页',
                        'prevPageLabel' => '上一页',
                        'firstPageLabel' => '首页',
                        'lastPageLabel' => '尾页',
                    ]); ?> </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->
</div>
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<!-- 模态框备注编辑（Modal） -->
<div class="modal fade" id="myModal1" style="top: 50%" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/resume/edit-beizhu" id="upBeizhu">
                <input type="hidden" name="bid" id="bid">
                <div class="modal-body">
                    备注：<input type="text" id="beiZhu" name="beiZhu" style="width: 80%;" maxlength="100">
                </div>
                <div class="modal-footer">
                    <input type="button" id="submitup" value="确定">
                    <input type="button" id="cen" value="取消">
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<script type="text/javascript">
    var xueLi = '<?=$userInfo['xueLi'];?>';
    var sex = '<?=$userInfo['sex'];?>';
    var qiWangXinZi = '<?=$userInfo['qiWangXinZi'];?>';
    var isMiHao = '<?=$userInfo['isMiHao'];?>';
    var rcId1 = '<?=$userInfo['rcId1'];?>';
    var rcId2 = '<?=$userInfo['rcId2'];?>';
    $("#xueLi option[value='" + xueLi + "']").attr("selected", true);
    $("#sex option[value='" + sex + "']").attr("selected", true);
    $("#qiWangXinZi option[value='" + qiWangXinZi + "']").attr("selected", true);
    $("#isMiHao option[value='" + isMiHao + "']").attr("selected", true);
    $("#rcId1 option[value='" + rcId1 + "']").attr("selected", true);


    $('#rcId1').change(function () {
        var id = $(this).val();
        if (id != '') {
            $.post('/resume-category/ajax-category', {'id': id}, function (data) {
                $('#rcId2').html('');
                var strHtml = "<option value=''>请选择</option>";
                var count = data.length;
                var val = null;
                for (var i = 0; i < count; i++) {
                    val = data[i]['id'];
                    strHtml += "<option value='" + val + "'>" + data[i]['cName'] + "</option>";
                }
                $('#rcId2').html(strHtml);

            }, 'json')
        } else {
            var strHtml = "<option value=''>请选择</option>";
            $('#rcId2').html(strHtml);
        }
    })

    if (rcId1 != '') {
        $.post('/resume-category/ajax-category', {'id': rcId1}, function (data) {
            $('#rcId2').html('');
            var strHtml = "<option value=''>请选择</option>";
            var count = data.length;
            var val = null;
            for (var i = 0; i < count; i++) {
                val = data[i]['id'];
                strHtml += "<option value='" + val + "'>" + data[i]['cName'] + "</option>";
            }
            $('#rcId2').html(strHtml);
            $("#rcId2 option[value='" + rcId2 + "']").attr("selected", true);

        }, 'json')
    }

    $('#file').change(function () {
        $('#fileVal').text($(this).val());
    })

    $('.ver').mousemove(function () {
		$(this).siblings().show();
    });
	$('.ver').mouseout(function () {
        $('.ceng').hide();
    })
    $('.ver').click(function () {
		var val = $(this).siblings().text();
		$('#beiZhu').val(val);
		$('#bid').val($(this).attr('id'));
        $('#myModal1').addClass('in');
		$('#myModal1').modal({backdrop:false,show:true});
    })
    $('#cen').click(function () {
        $('#myModal1').removeClass('in');
    })
    $('#submitup').click(function () {
        var url = $('#upBeizhu').attr('action');
        var id = $('#bid').val();
        var beiZhu = $('#beiZhu').val();
        $.post(url,{'id':id,'beiZhu':beiZhu},function (myjson) {
            if (myjson.statusCode == 200) {
                $('#myModal1').removeClass('in');
                $('#'+id).siblings().text(beiZhu);
                $('#'+id).text(beiZhu.substring(0,5));
                alert(myjson.message)
            }else {
                alert(myjson.message)
            }
        },'json')
    })
</script>
