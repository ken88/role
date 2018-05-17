<?php include '..//views/viewtop.php';?>
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
               新增账号
            </h1>
        </div>
    </div>
    <!-- /. ROW  -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="#" onclick="javascript:history.go(-1)" class="btn btn-info btn-sm">返回</a>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="/user/add">
                                <div class="form-group">
                                    <label>账号</label>
                                    <input class="form-control" ck="required" name="username" placeholder="账号" >
                                </div>
                                <div class="form-group">
                                    <label>员工姓名</label>
                                    <input class="form-control" ck="required" name="realName" placeholder="员工姓名" >
                                </div>
                                <?php if (!empty($department)) {?>
                                <div class="form-group">
                                    <label>部门</label>
                                    <select class="form-control" name="department" id="departmen">
                                        <?php foreach ($department as $v) { ?>
                                        <option value="<?=$v['id']; ?>,<?=$v['departmentName'];?>"><?=$v['departmentName'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <?php }?>
                                <?php if (!empty($role)) {?>
                                    <div class="form-group">
                                        <label>角色</label>
                                        <select class="form-control" name="role" id="role">
                                            <?php foreach ($role as $v) { ?>
                                                <option value="<?=$v['id']; ?>,<?=$v['roleName'];?>"><?=$v['roleName'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                <?php }?>
                                <button type="button" id="submit"  class="btn btn-danger btn-lg">确定</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>

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