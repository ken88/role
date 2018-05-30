<?php include '..//views/viewtop.php';?>
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
               编辑角色
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
                            <form action="/role/edit">
                                <input type="hidden" name="id" value="<?=$info['id'];?>">
                                <div class="form-group">
                                    <label>角色名</label>
                                    <input class="form-control" ck="required" value="<?=$info['roleName']?>" name="roleName" placeholder="角色名" >
                                </div>

                                <button type="button" id="submit"   class="btn btn-danger btn-sm">确定</button>
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