<?php
use yii\widgets\LinkPager;
include '../views/viewtop.php';
?>
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                用户列表
            </h1>
        </div>
    </div>
    <!-- /. ROW  -->

    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">

                <div class="panel-heading">
                    <?php foreach ($aclList['moduleBut'] as $v){if (in_array($v['id'],$aclList['acl'])){?>
                        <?php  if ($v['moduleName'] == '新增') {?>
                        <a href="<?=$v['url']?>" class="btn btn-info btn-sm">新增</a>
                        <?php }?>
                    <?php }} ?>
                </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>登录账号</th>
                                <th>员工姓名</th>
                                <th>所属部门</th>
                                <th>录入时间</th>
                                <th>所属角色</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($info)) {foreach ($info as $v) { ?>
                            <tr class="odd gradeX">
                                <td><?=$v['username'];?></td>
                                <td><?=$v['realName'];?></td>
                                <td><?=$v['departmentName'];?></td>
                                <td><?=$v['createDate'];?></td>
                                <td><?=$v['roleName'];?></td>
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
                        <div style="float: right">
                            <?php echo LinkPager::widget([
                                'pagination' => $pages,
                                'nextPageLabel' => '下一页',
                                'prevPageLabel' => '上一页',
                                'firstPageLabel' => '首页',
                                'lastPageLabel' => '尾页',
                            ]);?>
                        </div>
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