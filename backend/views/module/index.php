<?php include '../views/viewtop.php';?>
<div class="page-content">
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">菜单列表</h3>
        <ul class="breadcrumb">
          <li> <i class="icon-home"></i>首页 <i class="icon-angle-right"></i> </li>
          <li> 系统设置<i class="icon-angle-right"></i> </li>
          <li>菜单管理</li>
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
          <a href="<?=$v['url']?>?pid=0">新增</a><i class="icon-plus"></i>
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
                  <td><?php foreach ($aclList['moduleBut'] as $val){if (in_array($val['id'], $aclList['acl'])) {?>
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
<script type="text/javascript">
    $('.t1').css('background-color','red');
    $('.t2').css('background-color','yellow');
</script>
