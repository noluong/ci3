<?php $html_head = [
	'title'=>'Add user',
];
if($method == "add"){
	$html_head['title'] = "Add user";
}else{
	$html_head['title'] = "Edit user";
}
$this->load->view('admin/includes/header', $html_head);
$this->load->view('admin/includes/left');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Manager user</h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="/admin/user/"><i class="fa fa-table"></i> Manager user</a></li>
    <li class="active">Add user</li>
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
	        <?php echo form_open('/admin/user/edit', ['role' => 'form', 'class' => ''], ['user_id' => @$data['id']]);?>
		        <div class="box-body">
			        <!-- select -->
			        <div class="form-group">
			          <label>Category parents</label>
			          <select class="form-control" name="user[parent_id]">
			          	<option value="0">Choose</option>
			            <option>option 1</option>
			            <option>option 2</option>
			            <option>option 3</option>
			            <option>option 4</option>
			            <option>option 5</option>
			          </select>
			        </div>

			        <!-- text input -->
			        <div class="form-group">
			          <label>Category name</label>
			          <input type="text" name="user[name]" value="<?php echo set_value('user[name]'); ?>" <?php if(form_error('user[name]')) echo 'id="inputError"'; ?> class="form-control" placeholder="Enter ..." />
			          <?php echo form_error('user[name]'); ?>
			        </div>
					<div class="form-group">
						<label>Priority</label>
			            <input type="text" name="user[priority]" class="form-control" class="col-xs-3">
			        </div>

			        <!-- checkbox -->
			        <div class="form-group">
			          <div class="checkbox">
			            <label>
			              <input type="checkbox" name="user[is_active]" checked="checked" />
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