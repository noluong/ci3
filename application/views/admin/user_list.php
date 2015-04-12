<?php $html_head = array(
	'title'=>'Manager user',
);
$this->load->view('admin/includes/header', $html_head);
$this->load->view('admin/includes/left');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Manager users</h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Manager users</li>
  </ol>
</section>

 <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
			        <div class="box-header">
			          	<h3 class="box-title">Search Users</h3>
			        </div><!-- /.box-header -->
			        <!-- form start -->
			        <?php echo form_open('/admin/user/', ['method' => 'post', 'role' => 'form', 'class' => '']);?>
				        <div class="box-body">
					        <!-- select -->
					        <div class="form-group">
					          <label>Permision</label>
					          <?php echo form_dropdown("role", enum_select("user", "role", "Choose"), set_value("role",@$role), ['class' => 'form-control']); ?>
					        </div>

					        <!-- text input -->
					        <div class="form-group">
					          	<label>Keyword</label>
					          	<input type="text" name="keyword" value="<?php echo set_value('keyword', @$keyword); ?>" class="form-control" />
					        </div>
					    </div><!-- /.box-body -->
					    <div class="box-footer">
				            <button type="submit" name="submit" class="btn btn-primary">Search</button>
				        </div>
			      	<?php echo form_close(); ?>
			    </div>
		    </div><!-- /.col -->
	  	</div><!-- /.row -->  

   		<div class="row">
        	<div class="col-xs-12">
		        <div class="box">
		            <div class="box-header">
		              <h3 class="box-title">List users</h3>
		            </div><!-- /.box-header -->
		            <div class="box-body">
		              <table class="table table-bordered">
		                <tr>
		                  <th style="width: 10px">#</th>
		                  <th>Name</th>
		                  <th>Email</th>
		                  <th>Role</th>
		                  <th style="width: 100px">Operation</th>
		                </tr>
		                <?php
		                if($users_s):
		                	foreach ($users_s as $key => $user):
		                ?>
		                <tr>
		                  <td><?php echo $key+1; ?></td>
		                  <td><?php echo $user->name; ?></td>
		                  <td><?php echo $user->mail_address; ?></td>
		                  <td><?php echo $user->role; ?></td>
		                  <td>
		                    <a href="/admin/user/edit/<?php echo $user->id; ?>"><i class="fa fa-edit"></i> Edit</a><br />
		                    <?php if($user->id != $this->session->userdata("admin")["id"]): ?>
		                    <a data-alert="Do you want delete this user ?" class="confirm" href="/admin/user/delete/<?php echo $user->id; ?>/<?php echo $this->security->get_csrf_token_name(); ?>/<?php echo $this->security->get_csrf_hash(); ?>"><i class="fa fa-trash-o"></i> Delete</a>
		                    <?php endif; ?>
		                  </td>
		                </tr>
		                <?php		
		                	endforeach;
		                endif;
		                ?>
		              </table>
		            </div><!-- /.box-body -->
		            <div class="box-footer clearfix">
		            	<?php echo $pagination; ?>
		            </div>
		        </div><!-- /.box --> 
        	</div><!-- /.col -->
      	</div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('admin/includes/footer');?>