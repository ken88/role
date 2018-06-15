<?php include '../views/viewtop.php';?>
<div class="page-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">角色授权</h3>
                <ul class="breadcrumb">
                    <li> <i class="icon-home"></i>首页 <i class="icon-angle-right"></i> </li>
                    <li> 系统设置<i class="icon-angle-right"></i> </li>
                    <li>角色管理<i class="icon-angle-right"></i></li>
                    <li>角色授权</li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
            <div class="span12">
                <div class="alert alert-success"> <a href="#" onclick="javascript:history.go(-1)" >返回</a> </div>
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-cogs"></i>角色授权</div>
                    </div>
                    <div class="form">
                        <form action="/acl/authorization" class="form-horizontal">
                            <input type="hidden" value="<?=$roleId;?>" name="roleId" />
                            <table style="background-color:#ffffff; width: 100%" cellpadding="6">
                                <tbody id="checkBoxList">
                                <tr>
                                    <Td>全选：<input type="checkbox" id="selectAll" /></Td>
                                </tr>
                                <?php if (!empty($info)) {
                                    foreach ($info as $v) {
                                        $arr=explode('-', $v['bpath']);
                                        $num = count($arr);
                                        if ($num <= 2 ){
                                            $count = 0;
                                            ?>
                                            <tr>
                                                <td>
                                                 <span style='margin-left:<?php echo $num?>em; <?php if($num == 1 ){echo 'font-weight:bold;';}?>'>
                                                    <?=$v['moduleName'];?>
                                                     <input  type="checkbox" name="che[]" id='<?=$v["id"]; ?>' value="<?=$v["id"]; ?>" >
                                                    <span class="lbl"></span>
                                                </span>
                                                </td>
                                            </tr>
                                        <?php }else{ if ($count == 0 ){ $count++;?>
                                            <tr>
                                            <td>
                                        <?php }?>

                                            <span style='margin-left:<?php echo $num?>em;'>
                                                        <?=$v['moduleName'];?>
                                                <input style="cursor: pointer" type="checkbox" name="che[]" id='<?=$v["id"]; ?>' value="<?=$v["id"]; ?>" >
                                                        <span class="lbl"></span>
                                                     </span>

                                            <?php if ($count == 0) {?>
                                                </td>
                                                </tr>
                                            <?php }?>
                                        <?php }?>
                                    <?php }}?>
                                </tbody>
                            </table>
                            <div class="form-actions">
                                <button type="button" id="submit" class="btn blue">确定</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
</div>
<!-- 模态框（Modal） -->
<div class="modal fade"  id="myModal" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
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

    var state = "<?php echo $acl;?>";
    if (state !=  '') {
        var rows = state.split(',');
        for (i = 0 ;i< rows.length; i++)
        {
            document.getElementById(rows[i]).checked = true;
        }
    }


</script>