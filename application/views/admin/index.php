<?php $html_head = array(
	'title'=>'Administration',
	);
$this->load->view('admin/includes/header', $html_head);
$this->load->view('admin/includes/left');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>

	<!-- Main content -->

</div><!-- /.content-wrapper -->
<?php $this->load->view('admin/includes/footer');?>