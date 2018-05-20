<?php include '..//views/viewtop.php';?>
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                部门列表
            </h1>
        </div>
    </div>
    <!-- /. ROW  -->

    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">

                <div class="panel-heading">
                    <?php foreach ($aclList['moduleBut'] as $v){if (in_array($v['id'],$aclList['acl'])){ ?>
                        <?php  if ($v['moduleName'] == '新增') {?>
                            <a href="<?=$v['url']?>" class="btn btn-info btn-sm">新增</a>
                        <?php }?>
                    <?php }} ?>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>部门名</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($info)) {foreach ($info as $v) { ?>
                            <tr class="odd gradeX">
                                <td><?=$v['departmentName'];?></td>
                                <td>
                                <?php foreach ($aclList['moduleBut'] as $val){if (in_array($val['id'], $aclList['acl'])) {?>
                                    <?php  if ($val['moduleName'] == '编辑') {?>
                                        <a href="<?=$val['url']?>?id=<?=$v['id']?>">编辑</a>
                                    <?php } elseif ($val['moduleName'] == '删除') {?>
                                        <a class="del" href="#" url="<?=$val['url']?>?id=<?= $v['id']?>">删除</a>
                                     <?php }?>
                                <?php }} ?>
                                </td>
                            </tr>
                            <?php }}?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
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