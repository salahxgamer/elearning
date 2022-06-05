<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
	<div class="container-fluid">
		<button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>

		<!-- Search -->
		<div class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
			<!-- Search bar -->
			<?php include 'components/dashboard_search.php' ?>
		</div>
		<!-- /Search -->

		<ul class="navbar-nav flex-nowrap ms-auto">

			<!-- Dropdown Search -->
			<li class="nav-item dropdown d-sm-none no-arrow">
				<a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
					<i class="fas fa-search"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
					<div class="me-auto navbar-search w-100">
						<!-- Search bar -->
						<?php include 'components/dashboard_search.php' ?>
					</div>
				</div>
			</li>
			<!-- /Dropdown Search -->

			<li class="nav-item dropdown no-arrow mx-1">
				<div class="nav-item dropdown no-arrow">
					<a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
						<span class="badge bg-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i>
					</a>

					<!-- Alerts Center -->
					<?php include 'components/dashboard_alertscenter.php' ?>

				</div>
			</li>
			<li class="nav-item dropdown no-arrow mx-1">
				<div class="nav-item dropdown no-arrow">
					<a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
						<span class="badge bg-danger badge-counter">7</span>
						<i class="fas fa-envelope fa-fw">
						</i>
					</a>

					<!-- Messages Center -->
					<?php include 'components/dashboard_messagescenter.php' ?>

				</div>
				<div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown">
				</div>
			</li>
			<div class="d-none d-sm-block topbar-divider"></div>

			<li class="nav-item dropdown no-arrow">
				<div class="nav-item dropdown no-arrow">
					<a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
						<span class="d-none d-lg-inline me-2 text-gray-600 small">
							<?= $user->get_username() ?>
						</span>
						<img class="border rounded-circle img-profile" src="<?= $user->get_profile_image_src() ?>">
					</a>
					<div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
						<a class="dropdown-item" href="profile.php">
							<i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>
							Profile
						</a>
						<!-- TODO Fill href -->
						<a class="dropdown-item" href="testimonial.php">
							<i class="fas fa-comment fa-sm fa-fw me-2 text-gray-400"></i>
							Testimonial
						</a>
						<a class="dropdown-item" href="dashboard.php">
							<i class="fas fa-gauge fa-sm fa-fw me-2 text-gray-400"></i>
							Dashboard
						</a>
						<div class="dropdown-divider">
						</div>
						<a class="dropdown-item" href="logout.php">
							<i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
							Logout
						</a>
					</div>
				</div>
			</li>
		</ul>
	</div>
</nav>