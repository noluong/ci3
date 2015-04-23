<?php 
if($this->session->userdata("admin")["mail_address"] == "noluong@gmail.com"){ 
	$img = "user";
}else{
	$img = "avatar";
}
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?php echo ADMIN_THEME;?>dist/img/<?php echo $img;?>.jpg" class="img-circle" alt="User Image" />
			</div>
			<div class="pull-left info">
				<p><?php echo $this->session->userdata("admin")["name"];?></p>

				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>

		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">MAIN NAVIGATION</li>
			<li class="active treeview">
				<a href="/admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
			</li>
			<li class="treeview">
				<a href="/" target="_blank"><i class="fa fa-file"></i> <span>Xem website</span></a>
			</li>
			<?php if(isset($a)){ ?>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-table"></i> <span>Category</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="/admin/category"><i class="fa fa-circle-o"></i>Manager Category</a></li>
					<li><a href="/admin/category/edit"><i class="fa fa-circle-o"></i>Add Category</a></li>
				</ul>
			</li>
			<?php } ?>
			<li class="treeview">
				<a href="/admin/news/index/consumer">
				<i class="fa fa-list-alt"></i><span>Vay tín dụng tiêu dùng</span>
				</a>
			</li>
			<li class="treeview">
				<a href="/admin/news/edit/tieudung/10">
				<i class="fa fa-list-alt"></i><span>Bài viết trang chủ vay tín dụng</span>
				</a>
			</li>
			<li class="treeview">
				<a href="/admin/news/index/news">
				<i class="fa fa-list-alt"></i> <span>Tin tức</span>
				</a>
			</li>
			<li class="treeview">
				<a href="/admin/news/index/advisory">
				<i class="fa fa-list-alt"></i> <span>Tư vấn tín dụng tiêu dùng</span>
				</a>
			</li>

			<li class="treeview">
				<a href="/admin/slider/index">
				<i class="fa fa-list-alt"></i> <span>Quản lý slider</span>
				</a>
			</li>
			
			<li class="treeview">
				<a href="#">
					<i class="fa fa-laptop"></i> <span>Users</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="/admin/user"><i class="fa fa-circle-o"></i>Manager Users</a></li>
					<li><a href="/admin/user/add"><i class="fa fa-circle-o"></i>Add User</a></li>
				</ul>
			</li>

			<li class="treeview">
				<a href="/admin/setting/edit/1"><i class="fa fa-files-o"></i><span>Setting</span></a>
			</li>
			
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>