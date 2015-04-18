<?php $html_head = array(
	'title'=>'Manager news',
);
$this->load->view('admin/includes/header', $html_head);
$this->load->view('admin/includes/left');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Manager news</h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Manager news</li>
  </ol>
</section>

 <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
			        <div class="box-header">
			          	<h3 class="box-title">Search News</h3>
			        </div><!-- /.box-header -->
			        <!-- form start -->
			        <?php echo form_open('/admin/news/', ['method' => 'post', 'role' => 'form', 'class' => '']);?>
				        <div class="box-body">
					        <!-- select -->
					        <div class="form-group">
					          <label>Category</label>
					          <?php echo form_dropdown("id", select_options($category_dropdown, "Please choose"), set_value("id", @$params["id"]), ['class' => 'form-control']); ?>
					        </div>

					        <!-- text input -->
					        <div class="form-group">
					          	<label>Keyword</label>
					          	<input type="text" name="keyword" value="<?php echo set_value('keyword', @$params['keyword']); ?>" class="form-control" />
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
			      <h3 class="box-title">List news</h3>
			    </div><!-- /.box-header -->
			    <div class="box-body">
			      <table class="table table-bordered">
			        <tr>
			          <th style="width: 10px">#</th>
			           <th>Category</th>
			          <th>Title</th>
			          <th>Priority</th>
			          <th style="width: 100px">Operation</th>
			        </tr>
			        <?php
			        if($news_s){
			        	foreach ($news_s as $key => $item) {
			        ?>
			        <tr>
			          <td><?php echo $key+1; ?></td>
			          <td><?php if(isset($item->category_id)){ echo get_name_category($item->category_id, $category_dropdown);} ?></td>
			          <td><?php echo $item->title; ?></td>
			          <td><?php echo $item->priority; ?></td>
			          <td>
			            <a href="/admin/news/edit/<?php echo $item->id; ?>"><i class="fa fa-edit"></i> Edit</a><br />
			            <a data-alert="Do you want delete this news ?" class="confirm" href="/admin/news/delete/<?php echo $item->id; ?>/<?php echo $this->security->get_csrf_token_name(); ?>/<?php echo $this->security->get_csrf_hash(); ?>"><i class="fa fa-trash-o"></i> Delete</a>
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