<?php

use yii\widgets\LinkPager;

include '../views/viewtop.php';
?>
<link href="/media/css/jquery.fileupload-ui.css" rel="stylesheet"/>
<div class="page-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">项目列表</h3>
        <ul class="breadcrumb">
          <li><i class="icon-home"></i>首页 <i class="icon-angle-right"></i></li>
          <li> 项目管理<i class="icon-angle-right"></i></li>
          <li>项目列表</li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
      </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
	<div class="portlet-body form">
      <!-- BEGIN FORM-->
      <form action="/enterprise/index" method="get" class="form-horizontal">
	   <input type="hidden" name="moduleId" value="<?= $userInfo['moduleId'] ?>"/>
        <div class="row-fluid">
          <div class="span6 ">
            <div class="control-group">
              <label class="control-label">公司名称</label>
              <div class="controls">
                <input type="text" class="m-wrap span12"  name="name" value="<?= $userInfo['name']; ?>" placeholder="公司名称">
              </div>
            </div>
          </div>
		  
          <div class="span6 ">
            <div class="control-group">
              <label class="control-label">法务实体</label>
              <div class="controls">
                <select class="m-wrap span12" name="legalEntity" id="legalEntity">
                  <option value="">请选择</option>
                    <option value="上海申尊企业管理有限公司">上海申尊企业管理有限公司</option>
                    <option value="上海志俞人力资源有限公司">上海志俞人力资源有限公司</option>
                    <option value="上海千服企业管理有限公司">上海千服企业管理有限公司</option>
                    <option value="上海贤聘企业管理有限公司">上海贤聘企业管理有限公司</option>
                    <option value="上海仁联劳务服务有限公司">上海仁联劳务服务有限公司</option>
                </select>
              </div>
            </div>
          </div>
        </div>
		
		<div class="row-fluid">
         <div class="span6 ">
            <div class="control-group">
              <label class="control-label">项目状态</label>
              <div class="controls">
                <select class="m-wrap span12" name="projectStatus" id="projectStatus">
                 	<option value="">请选择</option>
                    <option value="1">已签约</option>
                    <option value="2">已解约</option>
                </select>
              </div>
            </div>
          </div>
		  
          <div class="span6 ">
            <div class="control-group">
              <label class="control-label">项目等级</label>
              <div class="controls">
                <select class="m-wrap span12" name="projectGrade" id="projectGrade">
                  <option value="">请选择</option>
                    <option value="A">A</option>
					<option value="A+">A+</option>
					<option value="B">B</option>
                </select>
              </div>
            </div>
          </div>
        </div>
		
		<div class="row-fluid">
          <div class="span6 ">
            <div class="control-group">
              <label class="control-label">创建人</label>
              <div class="controls">
                <input type="text" class="m-wrap span12"  name="userName" value="<?= $userInfo['userName']; ?>" placeholder="公司名称">
              </div>
            </div>
          </div>
		  
          <div class="span6 ">
            <div class="control-group">
              <label class="control-label">项目负责人</label>
              <div class="controls">
               <input type="text" class="m-wrap span12"  name="personNames" value="<?= $userInfo['personNames']; ?>" placeholder="项目负责人" />
              </div>
            </div>
          </div>
        </div>
		
		<div class="row-fluid">
         <div class="span6 ">
            <div class="control-group">
              <label class="control-label">签约城市</label>
              <div class="controls">
                <select class="m-wrap span12" name="signProvince" id="province">
                 	<option value="">请选择</option>
					  <?php foreach($prov as $v) { ?>
                        <option value="<?= $v['Name'];?>" val='<?= $v['Id'];?>'>
                        <?= $v['Name'];?>
                        </option>
                       <?php }?>
                </select>
              </div>
            </div>
          </div>
		  
          <div class="span6 ">
            <div class="control-group">
              <label class="control-label"></label>
              <div class="controls">
                <select class="m-wrap span12" name="signCity" id="city">
                  <option value="">请选择</option>
                </select>
              </div>
            </div>
          </div>
        </div>
		
		<div class="row-fluid">
          <div class="span6 ">
            <div class="control-group">
              <label class="control-label">创建时间</label>
              <div class="controls">
                <input type="text" class="m-wrap span5" id="createTime"  name="createTime" value="<?= $userInfo['createTime']; ?>" placeholder="创建时间"> ~ 
				<input type="text" class="m-wrap span5" id="createTime1"  name="createTime1" value="<?= $userInfo['createTime1']; ?>" placeholder="创建时间">
              </div>
            </div>
          </div>
		  
          <div class="span6 ">
            <div class="control-group">
              <label class="control-label"></label>
              <div class="controls">
               <input name="submit" type="submit" class="btn blue" value="搜索"/>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="alert alert-success">
          <?php foreach ($aclList['moduleBut'] as $v){if (in_array($v['id'],$aclList['acl'])){ ?>
          <?php  if ($v['moduleName'] == '新增') {?>
          <a href="<?=$v['url']?>">新增</a><i class="icon-plus"></i>
          <?php }?>
          <?php }} ?>
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
                  <th>公司名称</th>
                  <th>项目等级</th>
                  <th>签约城市</th>
                  <th>法务实体</th>
                  <th>项目状态</th>
                  <th>项目负责人</th>
                  <th>创建人</th>
				  <th>创建时间</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($info)) {
                                foreach ($info as $v) { ?>
                <tr class="odd gradeX">
                  <td><?= $v['name']; ?></td>
                  <td><?= $v['projectGrade']; ?></td>
                  <td><?= $v['signProvince'].'-'.$v['signCity']; ?></td>
                  <td><?= $v['legalEntity']; ?></td>
                  <td><?= $v['projectStatus'] == 1 ? '已签约' : '已解约'; ?></td>
                  <td><?= $v['personNames']; ?></td>
                  <td><?= $v['userName']; ?></td>
				  <td><?= $v['createTime']; ?></td>
                  <td>
				  <?php foreach ($aclList['moduleBut'] as $val) {if (in_array($val['id'], $aclList['acl'])) { ?>
                    <?php if ($val['moduleName'] == '编辑') { ?>
                    	<a href="<?= $val['url'] ?>?id=<?= $v['id'] ?>">编辑</a>
                    <?php } elseif ($val['moduleName'] == '删除') { ?>
                    	<a class="del" href="#" url="<?= $val['url'] ?>?id=<?= $v['id'] ?>">删除</a>
                    <?php }?>
					<?php }}?>
                  </td>
                </tr>
                <?php }} ?>
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
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">确定</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal -->
</div>
<!-- 模态框备注编辑（Modal） -->
<div class="modal fade" id="myModal1" style="top: 50%" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="/resume/edit-beizhu" id="upBeizhu">
        <input type="hidden" name="bid" id="bid">
        <div class="modal-body"> 备注：
          <input type="text" id="beiZhu" name="beiZhu" style="width: 80%;" maxlength="100">
        </div>
        <div class="modal-footer">
          <input type="button" id="submitup" value="确定">
          <input type="button" id="cen" value="取消">
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal -->
</div>
<script type="text/javascript">
	
 //常规用法
    laydate.render({
      elem: '#createTime' 
    });
	 laydate.render({
      elem: '#createTime1' 
    });

	$(function(){
		var legalEntity = '<?= $userInfo['legalEntity'];?>';
		var projectStatus = '<?=$userInfo['projectStatus'];?>';
		var projectGrade = '<?=$userInfo['projectGrade'];?>';
		var province = '<?=$userInfo['signProvince'];?>';
		var signCity = '<?=$userInfo['signCity'];?>';
	
		$("#legalEntity option[value='" + legalEntity + "']").attr("selected", true);
		$("#projectStatus option[value='" + projectStatus + "']").attr("selected", true);
		$("#projectGrade option[value='" + projectGrade + "']").attr("selected", true);
		
		if(province != '') {
			$("#province option[value='" + province + "']").attr("selected", true);
			var id = $('#province').find("option:selected").attr('val');
			getCity(id,signCity);
		}
    })
	
	function getCity(id,signCity)
	{
		if (id > 0) {
			$.post('/provinces/ajax-citi/',{'id':id},function(data){
				$('#city').html('');
				var strHtml = "<option value=''>请选择</option>";
				var count = data.length;
				 for(var i = 0 ; i < count ; i++) {
					val = data[i]['Name'];
					strHtml += "<option value='"+val+"' val='"+data[i]['Id']+"'>"+data[i]['Name']+"</option>";
				}
				$('#city').html(strHtml);
				if(signCity != '') {
					$("#city option[value='" + signCity + "']").attr("selected", true);
				}
				
			},'json');
			
		}
		else  {
			var strHtml = "<option value=''>请选择</option>";
			$('#city').html(strHtml);
		}
	}
</script>