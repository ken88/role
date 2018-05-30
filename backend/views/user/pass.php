<?php include '..//views/viewtop.php';?>
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
              密码修改
            </h1>
        </div>
    </div>
    <!-- /. ROW  -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="/user/pass">
                                <div class="form-group">
                                    <label>原始密码</label>
                                    <input class="form-control" ck="required" type="password" name="password" placeholder="原始密码" >
                                </div>
                                <div class="form-group">
                                    <label>新密码</label>
                                    <input class="form-control" ck="required" type="password" name="newPass" placeholder="新密码" >
                                </div>
                                <div class="form-group">
                                    <label>确认新密码</label>
                                    <input class="form-control" ck="required" type="password" name="newPass1" placeholder="确认新密码" >
                                </div>
                                <button type="button" id="submit"  class="btn btn-danger btn-sm">确定</button>
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