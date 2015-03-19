<?php



?>
<div class="container-fluid">
<form class="form-horizontal" method="post" enctype="multipart/form-data" id="form-jadwal" action="jadwal.upload.act.php">
<div class="control-group">
		<label class="control-label" for="nim">Import Data Excel</label>
		<div class="controls">
			<input type="file" class="btn btn-sm" name="file" >
		</div>
	</div>
    <div class="control-group">
		<label class="control-label" for="template">Unduh Template</label>
		<div class="controls">
			<a href="../../template/jadwal.xlsx">jadwal.xlsx</a>
		</div>
	</div>
    <div class="modal-footer">
    <input type="submit" class="btn btn-success" name="import" value="import" />
    </form>
</div>
<?php 

?>
