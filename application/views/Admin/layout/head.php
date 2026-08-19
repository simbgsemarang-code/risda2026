<header class="header">
						<div class="toggle-btns">
							<a id="toggle-sidebar" href="#">
								<i class="icon-list"></i>
							</a>
							<a id="pin-sidebar" href="#">
								<i class="icon-list"></i>
							</a>
						</div>
						<div class="header-items">
							<!-- Custom search start -->
							
							<!-- Header actions start -->
							<ul class="header-actions">
								
								<li class="dropdown selected">
									<a href="#" id="userSettings" data-toggle="dropdown" aria-haspopup="true">
										<i class="icon-user1"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
										<div class="header-profile-actions">
											<div class="header-user-profile">
												<div class="header-user">
													<img src="<?=base_url('assets/images/avatar.jpg')?>" alt="Admin Template">
												</div>
												<h5><?=$nama_user?></h5>
											
											</div>
											
											<a href="<?=base_url('Ganti')?>"><i class="icon-settings1"></i> Setting Pengguna</a>
											<a href="<?=base_url('Ganti/ganti_password')?>"><i class="icon-user"></i> Ganti Password</a>
											<a href="<?=base_url('Admin/Index/sign_out')?>"><i class="icon-log-out1"></i> Sign Out</a>
										</div>
									</div>
								</li>
								
							</ul>
							<!-- Header actions end -->
						</div>
					</header>