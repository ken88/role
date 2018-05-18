<?php include '../views/viewtop.php';?>
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                菜单列表
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
                            <a href="<?=$v['url']?>?pid=0" class="btn btn-info btn-sm">新增</a>
                        <?php }?>
                    <?php }} ?>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>菜单名</th>
                                <th>url</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($info)) {
                                    foreach ($info as $v) {
                                        $arr=explode('-', $v['bpath']);
                                        $num = count($arr);
                                        ?>
                                    <tr>
                                        <td class="t<?= $num;?>" style="padding-left:<?= $num;?>0px;"><?= $v['moduleName'];?></td>
                                        <td><?= $v['url'];?></td>
                                        <td>
                                            <?php foreach ($aclList['moduleBut'] as $val){if (in_array($val['id'], $aclList['acl'])) {?>
                                                    <?php if ($num < 3) {?>
                                                    <?php  if ($val['moduleName'] == '新增') {?>
                                                    <a href="<?=$val['url']?>?pid=<?= $v['id']?>">新增</a>
                                                    <?php }?>
                                                    <?php }if ($val['moduleName'] == '编辑') {?>
                                                    <a href="<?=$val['url']?>?id=<?= $v['id']?>">编辑</a>
                                                    <?php } elseif ($val['moduleName'] == '删除') {?>
                                                    <a class="del" href='#' url="<?=$val['url']?>?id=<?= $v['id']?>">删除</a>
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
<script type="text/javascript">
    $('.t1').css('background-color','red');
    $('.t2').css('background-color','yellow');
</script>