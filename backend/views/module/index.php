<?php include '..//views/viewtop.php';?>
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
                    <a href="/module/add?pid=0" class="btn btn-info btn-sm">新增</a>
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
                                        <td style="padding-left:<?= $num;?>0px;"><?= $v['moduleName'];?></td>
                                        <td><?= $v['url'];?></td>
                                        <td>
                                            <?php if ($num < 3) {?>
                                            <a href="/module/add?pid=<?= $v['id']?>">新增</a>
                                            <?php }?>
                                            <a href="#">编辑</a> |
                                            <a href="#">删除</a>
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