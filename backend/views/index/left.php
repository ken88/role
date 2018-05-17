<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <a class="active-menu" href="/index/index"><i class="fa fa-dashboard"></i> 首页</a>
            </li>
            <?php foreach ($module as $val){if ($val['pid'] == 0 && in_array($val['id'],$acl)){?>
            <li>
                <a href="#">
                    <i class="fa fa-sitemap"></i> <?=$val['moduleName']?><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level" id="menu">
                    <?php
                        foreach ($module as $v){
                            if ($v['pid'] == $val['id'] && in_array($v['id'],$acl)){
                    ?>
                        <li>
                            <a href="#" onclick="right_('<?=$v['url'];?>')"><?=$v['moduleName'];?></a>
                        </li>
                    <?php }}?>
                </ul>
            </li>
            <?php }}?>
        </ul>

    </div>
</nav>
<script type="text/javascript">
    //var acl = '<?php //echo $acl;?>//';
    //var arr = acl.split(',');
    //console.log(arr);
</script>