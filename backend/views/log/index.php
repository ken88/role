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
                <h3 class="page-title">日志列表</h3>
                <ul class="breadcrumb">
                    <li><i class="icon-home"></i>首页 <i class="icon-angle-right"></i></li>
                    <li> 日志管理<i class="icon-angle-right"></i></li>
                    <li>日志列表</li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
            <div class="span12">
                
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-cogs"></i>数据列表</div>
                    </div>
                    <div class="portlet-body no-more-tables">
                        <table class="table-bordered table-striped table-condensed cf">
                            <thead class="cf">
                            <tr>
                                <th>操作人</th>
                                <th>操作时间</th>
                                <th>操作记录</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($info)) {
                                foreach ($info as $v) { ?>
                                    <tr class="odd gradeX">
                                        <td><?= $v['username']; ?></td>
                                        <td><?= $v['createtime']; ?></td>
                                        <td><?= $v['messages']; ?></td>
                                    </tr>
                                <?php }
                            } ?>
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
                    ]); ?> </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->
</div>