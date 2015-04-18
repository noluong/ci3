<?php
if($method == "add"){
	$html_head['title'] = "Add news";
}else{
	$html_head['title'] = "Edit news";
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
	        <div class="mr10 ml10">
				<?php if(validation_errors()){ ?>
					<ul class="error">
					<?php echo validation_errors(); ?>
					</ul>
				<?php } ?>
			</div>
	        <!-- form start -->
	        <?php echo form_open('/admin/news/edit/'.@$news->id, ['role' => 'form', 'class' => '']);?>
		        <div class="box-body">
			        <!-- select -->
			        <div class="form-group">
			          	<label>Category</label>
			          	<?php echo form_dropdown("news[category_id]", select_options($category_dropdown, "Please choose"), set_value("news[category_id]", @$news->category_id), ['class' => 'form-control']); ?>
						<div id="result"></div>
					</div>
			        <!-- text input -->
			        <div class="form-group <?php if(form_error('news[title]')) echo 'has-error'; ?>">
			          <label>Title (max: 60 characters)</label>
			          <input type="text" name="news[title]" value="<?php echo set_value('news[title]', @$news->title); ?>" class="form-control" />
			        </div>
			        <!-- textarea -->
			        <div class="form-group <?php if(form_error('news[summary]')) echo 'has-error'; ?>">
			          <label>Summary</label>
			          <textarea name="news[summary]" class="form-control" rows="3" ><?php echo set_value('news[summary]', @$news->summary); ?></textarea>
			        </div>

			        <div class='box box-info'>
			        	<div class='box-header'>
			        		<h3 class='box-title'>Content</h3>
			        		<!-- tools box -->
			        		<div class="pull-right box-tools">
			        			<button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			        		</div><!-- /. tools -->
			        	</div><!-- /.box-header -->
			        	<div class='box-body pad'>
		        			<textarea id="editor1" name="news[content]" rows="10" cols="80"><?php echo set_value('news[content]', @$news->content); ?></textarea>
			        	</div>
			        </div><!-- /.box -->
					
					<!-- textarea -->
			        <div class="form-group <?php if(form_error('news[keywords]')) echo 'has-error'; ?>">
			          <label>Keywords (max: 160 characters)</label>
			          <textarea name="news[keywords]" class="form-control" rows="3" ><?php echo set_value('news[keywords]', @$news->keywords); ?></textarea>
			        </div>

			        <!-- textarea -->
			        <div class="form-group <?php if(form_error('news[description]')) echo 'has-error'; ?>">
			          <label>Description (max: 160 characters)</label>
			          <textarea name="news[description]" class="form-control" rows="3" ><?php echo set_value('news[description]', @$news->description); ?></textarea>
			        </div>

					<div class="form-group">
						<label>Priority</label>
			            <input type="text" name="news[priority]" value="<?php echo set_value('news[priority]', @$news->priority); ?>" class="form-control" class="col-xs-3">
			        </div>

			        <!-- checkbox -->
			        <div class="form-group">
			          <div class="checkbox">
			            <label>
			              <input type="radio" name="news[is_active]" value="1" <?=set_radio('news[is_active]', 1, TRUE)?> />
			              Active
			            </label>
			             <label>
			              <input type="radio" name="news[is_active]" value="0" <?=set_radio('news[is_active]', 0)?> />
			              Deactive
			            </label>
			          </div>
			        </div>
			    </div><!-- /.box-body -->
			    <div class="box-footer">
			    	<?php echo form_hidden('id', set_value('id', @$news->id));  ?>
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