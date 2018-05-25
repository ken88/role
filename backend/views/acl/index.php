<?php include '..//views/viewtop.php';?>
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
               角色授权
            </h1>
        </div>
    </div>
    <!-- /. ROW  -->

    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="#" onclick="javascript:history.go(-1)" class="btn btn-info btn-sm">返回</a>
                </div>
                <form action="/acl/authorization">
                    <input type="hidden" value="<?=$roleId;?>" name="roleId" />
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTables-example">
                                <tbody>
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
                                                     <input style="cursor: pointer" type="checkbox" name="che[]" id='<?=$v["id"]; ?>' value="<?=$v["id"]; ?>" >
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
                        </div>
                        <button type="button" id="submit"  class="btn btn-danger btn-lg">确定</button>
                    </div>
                </form>
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

    var state = "<?php echo $acl;?>";
    if (state !=  '') {
        var rows = state.split(',');
        for (i = 0 ;i< rows.length; i++)
        {
            document.getElementById(rows[i]).checked = true;
        }
    }


</script>