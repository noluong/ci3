<?php 
if($method == "add"){
	$html_head['title'] = "Confirm add news";
}else{
	$html_head['title'] = "Confirm edit news";
}
$this->load->view('admin/includes/header', $html_head);
$this->load->view('admin/includes/left');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Manager news</h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/news/"><i class="fa fa-table"></i> Manager news</a></li>
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
	        <?php echo form_open("admin/news/confirm"); ?>
		        <div class="box-body">
			        <div class="form-group">
			          	<label>Category name</label>
						<div><?php if(isset($news->category_id)){ echo get_name_category($news->category_id, $category_dropdown);} ?></div>
			        </div>
			        <div class="form-group">
			          	<label>Title</label>
						<div><?php echo $news->title;?></div>
			        </div>
			        <div class="form-group">
			          	<label>Summary</label>
						<div><?php echo $news->summary;?></div>
			        </div>
			        <div class="form-group">
			          	<label>Content</label>
						<div class="ba1 wordBreak pa5"><?php echo $news->content;?></div>
			        </div>
			        <div class="form-group">
			          	<label>Keywords </label>
						<div<?php echo $news->keywords;?></div>
			        </div>
			        <div class="form-group">
			          	<label>Description </label>
						<div><?php echo $news->description;?></div>
			        </div>
			        <div class="form-group">
			          	<label>Priority</label>
						<div><?php echo $news->priority;?></div>
			        </div>
			        <div class="form-group">
			          	<label>Status</label>
						<div><?php if($news->is_active) echo 'Active'; else echo 'Deactive';?></div>
			        </div>
			    </div><!-- /.box-body -->
			    <div class="box-footer">
			    	<?php echo form_hidden('id', set_value('id', @$news->id));  ?>
			    	<input type="hidden" name="form_data" value="<?php echo (htmlspecialchars(serialize($news))); ?>"/>
		            <a class="btn btn-default" onclick="document.getElementById('backform').submit()">Back</a>
		            <input type="submit" name="submit[complete]" class="btn btn-primary" />
		        </div>
	      	<?php echo form_close();?>

	      	<?php echo form_open('admin/news/'.$action, array("id"=>"backform")); ?>
				<?php if(isset($news)): ?>
					<?php foreach ($news as $key => $value): ?>
		                <input type="hidden" name = "news[<?php echo $key; ?>]" value = "<?php echo $value; ?>" />
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