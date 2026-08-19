
<?php
  if($this->session->userdata('user_id') == "") 
  {  
   $user_name = $this->session->userdata('user_id');
	$this->session->unset_userdata('user_id');
	redirect(base_url('Welcome/login'));
  }
  else
  {
    $user_name = $this->session->userdata('user_id');
    $id_user = $user_name['id'];
    $nama_user = $user_name['nama_user'];
	$foto = $user_name['foto'];

 	$menu = $this->Buka_peta->menu($id_user);
  }
	
?>
<nav id="sidebar" class="sidebar-wrapper">

				<!-- Sidebar brand start  -->
				<div class="sidebar-brand">
					<a href="index.html" class="logo">
						<img src="<?=base_url('assets/images/logo1.png')?>" alt="Admin Dashboards" />
					</a>
				</div>
				<!-- Sidebar brand end  -->

				<!-- User profile start -->
				<div class="sidebar-user-details">
					<div class="user-profile">
						<img src="<?=base_url('assets/images/avatar.jpg')?>" class="profile-thumb" alt="Admin Dashboards">
						<h6 class="profile-name"><?=$nama_user?></h6>
						
					</div>
				</div>
				<!-- User profile end -->

				<!-- Sidebar content start -->
				<div class="sidebar-content">

					<!-- sidebar menu start -->
					<div class="sidebar-menu">
						<ul>
							<?php 
							
							foreach($menu as $m) {
								
									if ($m->link == '#') {
										$l = '#';?>
										<li class="sidebar-dropdown <?=$s[$m->default][2]?>">
									<?php }else {
										$l = base_url($m->link);?>
										<li <?=$s[$m->default][0]?>>
									<?php }
									?>
									<a href="<?=$l?>" <?=$s[$m->default][1]?>>
										<i class="<?=$m->icon?>"></i>
										<span class="menu-text"><?=$m->menu?></span>
									</a>
									

								</li>
							<?php }
							
							?>
							
						</ul>
					</div>
					<!-- sidebar menu end -->

				</div>
				<!-- Sidebar content end -->

			</nav>