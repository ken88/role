<?php
use yii\widgets\LinkPager;
include '../views/viewtop.php';
?>
<div class="page-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">账号列表</h3>
        <ul class="breadcrumb">
          <li> <i class="icon-home"></i>首页 <i class="icon-angle-right"></i> </li>
          <li> 系统设置<i class="icon-angle-right"></i> </li>
          <li>账号管理</li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
      </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row-fluid">
      <div class="span12">
        <div class="alert alert-success">
          <?php foreach ($aclList['moduleBut'] as $v){if (in_array($v['id'],$aclList['acl'])){ ?>
          <?php  if ($v['moduleName'] == '新增') {?>
          <a href="<?=$v['url']?>">新增</a><i class="icon-plus"></i>
          <?php }?>
          <?php }} ?>
        </div>
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
          <div class="portlet-title">
            <div class="caption"><i class="icon-cogs"></i>数据列表</div>
          </div>
          <div class="portlet-body no-more-tables">
            <table class="table-bordered table-striped table-condensed cf">
              <thead class="cf">
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
                  <td><?php foreach ($aclList['moduleBut'] as $val){if (in_array($val['id'], $aclList['acl'])) {?>
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
        <div class="dataTables_paginate paging_bootstrap pagination"> <?php echo LinkPager::widget([
								'pagination' => $pages,
								'nextPageLabel' => '下一页',
								'prevPageLabel' => '上一页',
								'firstPageLabel' => '首页',
								'lastPageLabel' => '尾页',
							]);?> </div>
        <!-- END SAMPLE TABLE PORTLET-->
      </div>
    </div>
    <!-- END PAGE CONTENT-->
  </div>
  <!-- END PAGE CONTAINER-->
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
