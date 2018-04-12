<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
    <script type="text/javascript" src="/dist/js/jquery-1.9.1.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="/dist/js/form.js" charset="utf-8"></script>
</head>
<body>

    <form  class="form-horizontal col-sm-12" action="/excel/pour-excel" method="post" enctype="multipart/form-data" name="form"  id="J_myUploadForm">
        <input type="file" name="file" id="file" style="height:30px;" />
        <input type="button" id="sub" value="上传">
    </form>

</body>
</html>
<script type="text/javascript">
    $('#sub').click(function () {

        var options = {
            success: function(data){
                alert(data);
            }
        };
        $('#J_myUploadForm').ajaxSubmit(options);

    })
</script>