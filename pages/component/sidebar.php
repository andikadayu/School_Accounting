<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<?php 
				if($_SESSION['profile'] == null || $_SESSION == ''){
					echo '<img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">';
				}else{
					echo '<img src="../image/admin/'.$_SESSION["profile"].'" class="img-circle" alt="User Image">';
				}

				?>
			</div>
			<div class="pull-left info">
				<p><?php echo $_SESSION['nama']; ?></p>
				<small>Online</small>
			</div>
		</div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->

		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			<li class="klik_menu" id="dashboardd">
				<a><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>
			</li>
			<li class="treeview ">
				<a href="#">
					<i class="fa fa-list"></i>
					<span>Master Data</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu c-a">
					<li class="klik_menu" id="m_guru">
						<a><i class="fa fa-gavel"></i> Master Guru </a>
					</li>
					<li class="klik_menu" id="m_siswa">
						<a><i class="fa fa-graduation-cap"></i> Master Siswa </a>
					</li>
					<li class="klik_menu" id="m_admin">
						<a><i class="fa fa-user"></i> Master Admin </a>
					</li>
				</ul>
			</li>
			<li class="klik_menu" id="dana">
				<a>
					<i class="fa fa-money"></i> <span>Dana</span>
				</a>
			</li>
			<li class="klik_menu" id="berita">
				<a>
					<i class="fa fa-newspaper-o"></i> <span>Berita</span>
				</a>
			</li>
			<li class="klik_menu" id="logout">
				<a>
					<i class="fa fa-sign-out"></i> <span>Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>