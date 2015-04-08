<?php $html_head = array(
	'title'=>'Manager category',
);
$this->load->view('admin/includes/header', $html_head);
$this->load->view('admin/includes/left');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Manager category</h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Manager category</li>
  </ol>
</section>

 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List category</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Priority</th>
                  <th style="width: 100px">Operation</th>
                </tr>
                <?php
                if($category_s){
                	foreach ($category_s as $key => $item) {
                ?>
                <tr>
                  <td><?php echo $key+1; ?></td>
                  <td><?php echo $item->name; ?></td>
                  <td><?php echo $item->priority; ?></td>
                  <td>
                    <a href="/admin/category/edit/<?php echo $item->id; ?>"><i class="fa fa-edit"></i> Edit</a><br />
                    <a href="/admin/category/edit/<?php echo $item->id; ?>"><i class="fa fa-trash-o"></i> Delete</a>
                  </td>
                </tr>
                <?php		
                	}
                }
                ?>
              </table>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div><!-- /.box --> 
        </div><!-- /.col -->
      </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('admin/includes/footer');?>