<link href="/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<link href="/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

<link href="/media/css/font-awesome.css" rel="stylesheet" type="text/css"/>

<link href="/media/css/style-metro.css" rel="stylesheet" type="text/css"/>

<link href="/media/css/style.css" rel="stylesheet" type="text/css"/>

<link href="/media/css/style-responsive.css" rel="stylesheet" type="text/css"/>

<link href="/media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

<link href="/media/css/uniform.default.css" rel="stylesheet" type="text/css"/>

<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL STYLES -->

<link rel="stylesheet" href="/media/css/DT_bootstrap.css" />

<!-- END PAGE LEVEL STYLES -->

<link rel="shortcut icon" href="/media/image/favicon.ico" />
<style>
	.portlet-body th{ font-size:14px; font-weight:bold;}
	.portlet-body td{ font-size:14px; text-align:center; }
</style>

<script src="/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>

<script src="/media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

<script src="/media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      

<script src="/media/js/bootstrap.min.js" type="text/javascript"></script>

<!--[if lt IE 9]>

<script src="/media/js/excanvas.min.js"></script>

<script src="/media/js/respond.min.js"></script>  

<![endif]-->   


<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->

<script type="text/javascript" src="/media/js/select2.min.js"></script>

<script type="text/javascript" src="/media/js/jquery.dataTables.js"></script>

<script type="text/javascript" src="/media/js/DT_bootstrap.js"></script>

<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="/media/js/app.js"></script>

<script src="/media/js/table-editable.js"></script>

<script src="/media/js/jquery.uniform.min.js" type="text/javascript" ></script>

<script src="/dist/js/fancyboxcustom.js"></script>
<script src="/dist/js/form.js" charset="utf-8"></script>
<script src="/dist/laydate/laydate.js"></script>

<script type="text/javascript" charset="uft-8">

	jQuery(document).ready(function() {       
	   App.init();
	   TableEditable.init();
	});
	
		
	$(function(){
		$('#province').change(function(){
			var id = $(this).find("option:selected").attr('val');
			if (id > 0) {
				$.post('/provinces/ajax-citi/',{'id':id},function(data){
					$('#city').html('');
					var strHtml = "<option value=''>请选择</option>";
					var count = data.length;
					 for(var i = 0 ; i < count ; i++) {
						val = data[i]['Name'];
						strHtml += "<option value='"+val+"' val='"+data[i]['Id']+"'>"+data[i]['Name']+"</option>";
					}
					$('#city').html(strHtml);
				},'json');
			}
			else  {
				var strHtml = "<option value=''>请选择</option>";
				$('#city').html(strHtml);
			}
		})
		
	})

</script>