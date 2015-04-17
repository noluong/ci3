<?php 
if($method == "add"){
	$html_head['title'] = "Confirm add category";
}else{
	$html_head['title'] = "Confirm edit category";
}
$this->load->view('admin/includes/header', $html_head);
$this->load->view('admin/includes/left');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Manager category</h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/category/"><i class="fa fa-table"></i> Manager category</a></li>
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
	        <?php echo form_open("admin/category/confirm"); ?>
		        <div class="box-body">
			        <div class="form-group">
			          	<label>Category parent</label>
						<div><?php if(isset($category->parent_id)){ echo get_name_category($category->parent_id, $category_dropdown);} ?></div>
			        </div>
			        <div class="form-group">
			          	<label>Category name</label>
						<div><?php echo $category->name;?></div>
			        </div>
			        <div class="form-group">
			          	<label>Priority</label>
						<div><?php echo $category->priority;?></div>
			        </div>
			        <div class="form-group">
			          	<label>Status</label>
						<div><?php if($category->is_active) echo 'Active'; else echo 'Deactive';?></div>
			        </div>
			    </div><!-- /.box-body -->
			    <div class="box-footer">
			    	<?php echo form_hidden('id', set_value('id', @$category->id));  ?>
			    	<input type="hidden" name="form_data" value="<?php echo (htmlspecialchars(serialize($category))); ?>"/>
		            <a class="btn btn-default" onclick="document.getElementById('backform').submit()">Back</a>
		            <input type="submit" name="submit[complete]" class="btn btn-primary" />
		        </div>
	      	<?php echo form_close();?>

	      	<?php echo form_open('admin/category/'.$action, array("id"=>"backform")); ?>
				<?php if(isset($category)): ?>
					<?php foreach ($category as $key => $value): ?>
		                <input type="hidden" name = "category[<?php echo $key; ?>]" value = "<?php echo $value; ?>" />
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