<?php 
if($method == "add"){
	$html_head['title'] = "Confirm add slider";
}else{
	$html_head['title'] = "Confirm edit slider";
}
$this->load->view('admin/includes/header', $html_head);
$this->load->view('admin/includes/left');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Manager slider</h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/slider/"><i class="fa fa-table"></i> Manager slider</a></li>
    <li class="active"><?php echo $html_head['title']; ?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
	        <div class="box-header">
	          	<h3 class="box-title"><?php echo $html_head['title']; ?></h3>
	        </div><!-- /.box-header -->
	        <!-- form start -->
	        <?php echo form_open("admin/slider/confirm/"); ?>
		        <div class="box-body">
			        <div class="form-group">
			          	<label>Link</label>
						<div><?php echo $slider->link;?></div>
			        </div>
			        <div class="form-group">
			          	<label>Photo</label>
						<div><img src="<?php echo UPLOAD_SLIDER.$slider->photo;?>" width="200" /></div>
			        </div>
			        <div class="form-group">
			          	<label>Priority</label>
						<div><?php echo $slider->priority;?></div>
			        </div>
			        <div class="form-group">
			          	<label>Status</label>
						<div><?php if($slider->is_active) echo 'Active'; else echo 'Deactive';?></div>
			        </div>
			    </div><!-- /.box-body -->
			    <div class="box-footer">
			    	<?php echo form_hidden('id', set_value('id', @$slider->id));  ?>
			    	<input type="hidden" name="form_data" value="<?php echo (htmlspecialchars(serialize($slider))); ?>"/>
		            <a class="btn btn-default" onclick="document.getElementById('backform').submit()">Back</a>
		            <input type="submit" name="submit[complete]" class="btn btn-primary" />
		        </div>
	      	<?php echo form_close();?>

	      	<?php echo form_open('admin/slider/'.$action, array("id"=>"backform")); ?>
				<?php if(isset($slider)): ?>
					<?php foreach ($slider as $key => $value): ?>
		                <input type="hidden" name = "slider[<?php echo $key; ?>]" value = "<?php echo $value; ?>" />
		            <?php endforeach; ?>
				<?php endif; ?>
				<input type="hidden" name="action" value="back" />
			<?php echo form_close();?>

	    </div>
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('admin/includes/footer');?>