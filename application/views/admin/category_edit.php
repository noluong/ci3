<?php
if($method == "add"){
	$html_head['title'] = "Add category";
}else{
	$html_head['title'] = "Edit category";
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
    <li class="active">Add category</li>
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
	        <?php echo form_open('/admin/category/edit', ['role' => 'form', 'class' => ''], ['category_id' => @$data['id']]);?>
		        <div class="box-body">
			        <!-- select -->
			        <div class="form-group">
			          	<label>Category parents</label>
			          	<dl id="sample" class="dropdown">
					        <dt><a href="#"><span>Please select category </span></a></dt>
					        <dd>
					        	<ul>
					            <?php echo html_dropdown_ul($all_category); ?>
								</ul>
					        </dd>
					    </dl>
						<div id="result"></div>
					</div>
			        <!-- text input -->
			        <div class="form-group <?php if(form_error('category[name]')) echo 'has-error'; ?>">
			          <label>Category name</label>
			          <input type="text" name="category[name]" value="<?php echo set_value('category[name]'); ?>" class="form-control" placeholder="Enter ..." />
			        </div>
					<div class="form-group">
						<label>Priority</label>
			            <input type="text" name="category[priority]" class="form-control" class="col-xs-3">
			        </div>

			        <!-- checkbox -->
			        <div class="form-group">
			          <div class="checkbox">
			            <label>
			              <input type="checkbox" name="category[is_active]" checked="checked" />
			              Show
			            </label>
			          </div>
			        </div>
			    </div><!-- /.box-body -->
			    <div class="box-footer">
		            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
		        </div>
	      </form>
	    </div>
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('admin/includes/footer');?>