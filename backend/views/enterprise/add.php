<?php include '../views/viewtop.php';?>
<style type="text/css">
	.form-section{ cursor:pointer;}
</style>
<div class="page-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">新增项目</h3>
        <ul class="breadcrumb">
          <li> <i class="icon-home"></i>首页 <i class="icon-angle-right"></i> </li>
          <li> 项目管理<i class="icon-angle-right"></i> </li>
          <li>项目列表<i class="icon-angle-right"></i></li>
          <li>新增项目</li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
      </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row-fluid">
      <div class="span12">
        <div class="alert alert-success"> <a href="#" onclick="javascript:history.go(-1)" >返回</a> </div>
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
          <div class="portlet-title">
            <div class="caption"><i class="icon-cogs"></i>新增</div>
          </div>
          <div class="portlet-body form">
            <form action="/enterprise/add" class="horizontal-form" enctype="multipart/form-data" id="J_myUploadForm">
              <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="firstName">公司名称<span class="required">*</span></label>
                    <div class="controls">
                      <input class="m-wrap span12" ck="required"  name="name" placeholder="公司名称" maxlength="50" />
                    </div>
                  </div>
                </div>
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="firstName">利润模式<span class="required">*</span></label>
                    <div class="controls">
                      <select class="m-wrap span12" name="profitModel">
                        <option value="社保公积金+服务费">社保公积金+服务费</option>
                        <option value="打包价">打包价</option>
                        <option value="小时工">小时工</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="firstName">法务实体<span class="required">*</span></label>
                    <div class="controls">
                      <select class="m-wrap span12" name="legalEntity">
                        <option value="上海申尊企业管理有限公司">上海申尊企业管理有限公司</option>
                        <option value="上海志俞人力资源有限公司">上海志俞人力资源有限公司</option>
                        <option value="上海千服企业管理有限公司">上海千服企业管理有限公司</option>
                        <option value="上海贤聘企业管理有限公司">上海贤聘企业管理有限公司</option>
                        <option value="上海仁联劳务服务有限公司">上海仁联劳务服务有限公司</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="firstName">社保公积金结算周期<span class="required">*</span></label>
                    <div class="controls">
                      <textarea class="m-wrap span12" name="socialCycle" maxlength=100 ck="required" placeholder='社保公积金结算周期'></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label">项目等级<span class="required">*</span></label>
                    <div class="controls">
                      <select class="m-wrap span12" name="projectGrade">
                        <option value="A">A</option>
                        <option value="A+">A+</option>
                        <option value="B">B</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="span3">
                  <div class="control-group">
                    <label class="control-label">签约城市<span class="required">*</span></label>
                    <div class="controls">
                      <select class="m-wrap span12" name="signProvince" ck="required" id="select1" placeholder='签约城市'>
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
                <div class="span3">
                  <div class="control-group">
                    <label class="control-label">市</label>
                    <div class="controls">
                      <select class="m-wrap span12" name="signCity" ck="required" id="select2" placeholder='签约市'>
                        <option value="">请选择</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row-fluid">
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="firstName">项目状态<span class="required">*</span></label>
                    <div class="controls">
                      <select class="m-wrap span12" name="projectStatus">
                        <option value="1">已签约</option>
                        <option value="2">已解约</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="span6">
                  <div class="control-group">
                    <label class="control-label" for="firstName">合约起止时间<span class="required">*</span></label>
                    <div class="controls">
                      <input class="m-wrap span6" ck="required"  id="startTime" name="startTime" placeholder="开始时间" />
                      ~
                      <input class="m-wrap span6" ck="required" id="endTime" name="endTime" placeholder="结束时间" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row-fluid">
                <div class="span12">
                  <div class="control-group">
                    <label class="control-label" for="firstName">公司环境照片</label>
                    <div class="controls">
                     <input type="file"  name="UploadForm[imageFiles][]" multiple="" accept="image/*">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row-fluid">
                <div class="span12">
                  <div class="control-group">
                    <label class="control-label" for="firstName"></label>
                    <div class="controls">
                      <input type="file"  name="UploadForm[imageFiles][]" multiple="" accept="image/*">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row-fluid">
                <div class="span12">
                  <div class="control-group">
                    <label class="control-label" for="firstName"></label>
                    <div class="controls">
                      <input type="file"  name="UploadForm[imageFiles][]" multiple="" accept="image/*">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row-fluid">
                <div class="span12">
                  <div class="control-group">
                    <label class="control-label" for="firstName"></label>
                    <div class="controls">
                      <input type="file"  name="UploadForm[imageFiles][]" multiple="" accept="image/*">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row-fluid">
                <div class="span12">
                  <div class="control-group">
                    <label class="control-label" for="firstName">公司简介<span class="required">*</span></label>
                    <div class="controls">
                      <textarea style="width:600px; height:60px;" name="synopsis"  ck="required" maxlength=200 placeholder='公司简介'></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">项目负责人</label>
                <div class="controls">
					<?php foreach($user as $v){?>
						<?= $v['realName'];?> <input name="personNames[]" type="checkbox" value="<?= $v['id'].','.$v['realName'];?>">
					<?php }?>
                 
                </div>
              </div>
              <div class="form-actions">
                <button type="button" id="subUpload" class="btn blue">确定</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->
  </div>
</div>
<!-- 模态框（Modal） -->
<div class="modal fade"  id="myModal" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body"> </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">确定 </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal -->
</div>
<script type="text/javascript">
	$('#select1').change(function(){
		var id = $(this).find("option:selected").attr('val');
		if (id > 0) {
			$.post('/provinces/ajax-citi/',{'id':id},function(data){
				$('#select2').html('');
				var strHtml = "<option value=''>请选择</option>";
                var count = data.length;
				 for(var i = 0 ; i < count ; i++) {
					val = data[i]['Name'];
                    strHtml += "<option value='"+val+"' val='"+data[i]['Id']+"'>"+data[i]['Name']+"</option>";
                }
                $('#select2').html(strHtml);
			},'json');
		}
		else  {
            var strHtml = "<option value=''>请选择</option>";
            $('#select2').html(strHtml);
			$('#select3').html(strHtml);
        }
	})


	 //常规用法
    laydate.render({
      elem: '#startTime' //指定元素
    });
	laydate.render({
      elem: '#endTime' //指定元素
    });

	
</script>
