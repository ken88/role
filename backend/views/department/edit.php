<?php include '../views/viewtop.php';?>

<div class="page-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">编辑部门</h3>
        <ul class="breadcrumb">
          <li> <i class="icon-home"></i>首页 <i class="icon-angle-right"></i> </li>
          <li> 系统设置<i class="icon-angle-right"></i> </li>
          <li>部门管理<i class="icon-angle-right"></i></li>
          <li>编辑部门</li>
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
            <div class="caption"><i class="icon-cogs"></i>编辑</div>
          </div>
          <div class="portlet-body form">
            <form action="/department/edit" class="form-horizontal">
              <input type="hidden" value="<?=$info['id']?>" name="id" />
              <div class="control-group">
                <label class="control-label">部门名</label>
                <div class="controls">
                  <input type="text" ck="required" name="departmentName" value="<?=$info['departmentName']?>" placeholder="部门名"  class="span6 m-wrap" />
                </div>
              </div>
              <div class="form-actions">
                <button type="button" id="submit" class="btn blue">确定</button>
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
<div class="modal fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
