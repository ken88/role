<div class="page-sidebar nav-collapse collapse">
	<ul class="page-sidebar-menu">
		<li>
			<div class="sidebar-toggler hidden-phone"></div>
		</li>
		<li class="start ">
			<a href="/index/index">
			<i class="icon-home"></i> 
			<span class="title">首页</span>
			</a>
		</li>
		<?php foreach ($module as $val){if ($val['pid'] == 0 && in_array($val['id'],$acl)){?>
		<li class="">
			<a href="javascript:;">
			<i class="icon-cogs"></i> 
			<span class="title"><?=$val['moduleName']?></span>
			<span class="arrow "></span>
			</a>
			<ul class="sub-menu">
			 <?php
				foreach ($module as $v){if ($v['pid'] == $val['id'] && in_array($v['id'],$acl)){?>
				<li >
					<a href="#" onclick="right_('<?=$v['url'];?>?moduleId=<?=$v['id'];?>')"><?=$v['moduleName'];?></a>

				</li>
			<?php }}?>
			</ul>
		</li>
		<?php }}?>
	</ul>
</div>