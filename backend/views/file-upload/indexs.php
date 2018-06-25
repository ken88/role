<?php
include '../views/viewtop.php';
?>
<form action="/file-upload/adds" class="horizontal-form" enctype="multipart/form-data" id="J_myUploadForm">
	<input type="file"  name="UploadForm[imageFiles][]" multiple="" accept="image/*">
	<input type="file"  name="UploadForm[imageFiles][]" multiple="" accept="image/*">
	<input type="file"  name="UploadForm[imageFiles][]" multiple="" accept="image/*">
	 <button type="button" id="subUpload" class="btn blue">确定</button>
</form>
 



