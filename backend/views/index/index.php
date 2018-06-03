<?php include_once 'top.php'?>
<?php include_once 'left.php'?>

    <iframe frameborder="0" src="/index/indexs" name="rightcontent"  id="rightcontent" onload="Javascript:SetWinHeight()" width="100%"scrolling="no"></iframe>
	
</div>
<script src="/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>

<script src="/media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

<script src="/media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      

<script src="/media/js/bootstrap.min.js" type="text/javascript"></script>



<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->

<script type="text/javascript" src="/media/js/select2.min.js"></script>

<script type="text/javascript" src="/media/js/jquery.dataTables.js"></script>


<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="/media/js/app.js"></script>

<script src="/media/js/table-editable.js"></script>    

<script>

	jQuery(document).ready(function() {       

	   App.init();

	   TableEditable.init();

	});

</script>
<script type="text/javascript">
	function SetWinHeight(obj)
	{
		var frm = document.getElementById("rightcontent"); //将iframe1替换为你的ID名
          var subWeb = document.frames ? document.frames["iframe1"].document : frm.contentDocument;
          if(frm != null && subWeb !=null)
          {
           frm.style.height="0px";//初始化一下,否则会保留大页面高度
           frm.style.height = subWeb.documentElement.scrollHeight+"px";
           frm.style.width = subWeb.documentElement.scrollWidth+"px";
           subWeb.body.style.overflowX="auto";
           subWeb.body.style.overflowY="auto";
          }
		window.scrollTo(0,0); // how far to scroll on each step
		
	}
	function right_(url){
		$('#rightcontent').attr('src',url);
	};

</script>
</body>
</html>