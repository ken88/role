<?php include '..//views/viewtop.php';?>
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
                    <a href="/user/add" class="btn btn-info btn-sm">新增</a>
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