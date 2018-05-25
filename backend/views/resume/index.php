<?php
use yii\widgets\LinkPager;
include '../views/viewtop.php';
?>
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                简历列表
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
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>姓名</th>
                                <th>性别</th>
                                <th>年龄</th>
                                <th>学历</th>
                                <th>联系方式</th>
                                <th>是否真实</th>
                                <th>岗位分类</th>
                                <th>期望岗位</th>
                                <th>期望薪资</th>
                                <th>期望地点</th>
                                <th>目前居住地</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($info)) {foreach ($info as $v) { ?>
                            <tr class="odd gradeX">
                                <td><?=$v['userName'];?></td>
                                <td><?=$v['sex'] == 1 ? '男' : '女';?></td>
                                <td><?=$v['age'];?></td>
                                <td><?=$v['xueLi'];?></td>
                                <td><?=$v['phone'];?></td>
                                <td><?=$v['isMiHao'] == 1 ? '否' : '是';?></td>
                                <td><?=$v['rcName1'];?></td>
                                <td><?=$v['rcName2'];?></td>
                                <td><?=$v['qiWangXinZi'];?></td>
                                <td><?=$v['qiWangDiDian'];?></td>
                                <td><?=$v['juZhuDiZhi'];?></td>
                                <td><?=$v['createTime'];?></td>
                                <td>
                                    <?php foreach ($aclList['moduleBut'] as $val){if (in_array($val['id'], $aclList['acl'])) {?>
                                        <?php  if ($val['moduleName'] == '编辑') {?>
                                            <a href="<?=$val['url']?>?id=<?=$v['id']?>">编辑</a>
                                        <?php } elseif ($val['moduleName'] == '删除') {?>
                                            <a class="del" href="#" url="<?=$val['url']?>?id=<?= $v['id']?>">删除</a>
                                        <?php } elseif ($val['moduleName'] == '角色授权') {?>
                                            <a href="<?=$val['url']?>?roleId=<?=$v['id']?>">角色授权</a>
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