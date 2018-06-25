<?php

include '../views/viewtop.php';
?>
 <form action="/file-upload/add" class="horizontal-form" enctype="multipart/form-data" id="J_myUploadForm">
 	<input type="file" id="uploadform-imagefile" name="UploadForm[imageFile]" />
	 <button type="button" id="subUpload" class="btn blue">确定</button>
 </form>