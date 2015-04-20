<?php $html_head = array(
	'title'=>'Manager slider',
);
$this->load->view('admin/includes/header', $html_head);
$this->load->view('admin/includes/left');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Manager slider</h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Manager slider</li>
  </ol>
</section>

 <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
				    <div class="box-footer">
			            <a href="/admin/slider/edit/" class="btn btn-primary">Thêm mới</a>
			        </div>
			    </div>
		    </div><!-- /.col -->
	  	</div><!-- /.row -->  

		<div class="row">
			<div class="col-xs-12">
			  <div class="box">
			    <div class="box-header">
			      <h3 class="box-title">List slider</h3>
			    </div><!-- /.box-header -->
			    <div class="box-body">
			      <table class="table table-bordered">
			        <tr>
			          <th style="width: 10px">#</th>
			          <th>Images</th>
			          <th>Priority</th>
			          <th style="width: 100px">Operation</th>
			        </tr>
			        <?php
			        if($slider_s){
			        	foreach ($slider_s as $key => $item) {
			        ?>
			        <tr>
			          <td><?php echo $key+1; ?></td>
			          <td><img src="<?php echo UPLOAD_SLIDER.@$item->photo;?>" width="200" /></td>
			          <td><?php echo $item->priority; ?></td>
			          <td>
			            <a href="/admin/slider/edit/<?php echo $item->id; ?>"><i class="fa fa-edit"></i> Edit</a><br />
			            <a data-alert="Do you want delete this slider ?" class="confirm" href="/admin/slider/delete/<?php echo $item->id; ?>/<?php echo $this->security->get_csrf_token_name(); ?>/<?php echo $this->security->get_csrf_hash(); ?>"><i class="fa fa-trash-o"></i> Delete</a>
			          </td>
			        </tr>
			        <?php		
			        	}
			        }
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