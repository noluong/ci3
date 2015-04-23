<?php
if($method == "add"){
	$html_head['title'] = "Add slider";
}else{
	$html_head['title'] = "Edit slider";
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
	        <div class="mr10 ml10">
				<?php if(validation_errors()){ ?>
					<ul class="error">
					<?php echo validation_errors(); ?>
					</ul>
				<?php } ?>
				<?php if(isset($error) && $error){ echo '<ul class="error"><li>'.$error.'</li></ul>'; }?>
			</div>
	        <!-- form start -->
	        <?php echo form_open_multipart('/admin/slider/edit/'.@$slider->id, ['role' => 'form', 'class' => '']);?>
		        <div class="box-body">
			        <!-- text input -->
			        <div class="form-group <?php if(form_error('slider[link]')) echo 'has-error'; ?>">
			          <label>Link </label>
			          <input type="text" name="slider[link]" value="<?php echo set_value('slider[link]', @$slider->link); ?>" class="form-control" />
			        </div>
					 <!-- file input -->
			        <div class="form-group">
			          <label>Upload photo</label><br />
			        	<?php if(isset($slider->photo) && $slider->photo){ ?>
						<img src="/uploads/slider/<?php echo $slider->photo; ?>" width="200" /><br /><br />
			          	<?php } ?>
			          <input type="file" name="userfile" class="form-control" />
			        </div>

					<div class="form-group">
						<label>Priority</label>
			            <input type="text" name="slider[priority]" value="<?php echo set_value('slider[priority]', @$slider->priority); ?>" class="form-control" class="col-xs-3">
			        </div>

			        <!-- checkbox -->
			        <div class="form-group">
			          <div class="checkbox">
			            <label>
			              <input type="radio" name="slider[is_active]" value="1" <?=set_radio('slider[is_active]', 1, TRUE)?> />
			              Active
			            </label>
			             <label>
			              <input type="radio" name="slider[is_active]" value="0" <?=set_radio('slider[is_active]', 0)?> />
			              Deactive
			            </label>
			          </div>
			        </div>
			    </div><!-- /.box-body -->
			    <div class="box-footer">
			    	<?php echo form_hidden('id', set_value('id', @$slider->id));  ?>
		            <input type="submit" name="submit[confirm]" class="btn btn-primary" />
		        </div>
	      	<?php echo form_close();?>
	    </div>
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('admin/includes/footer');?>
<!-- CK Editor -->
<script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script type="text/javascript">
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
  });
</script>