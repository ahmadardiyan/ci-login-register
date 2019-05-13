<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<title><?=$judul?></title>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<a class="navbar-brand" href="<?=base_url();?>">Web CI</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item active">
								<a class="nav-link" href="<?=base_url();?>">Home <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?=base_url();?>profile">User</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?=base_url();?>registrasi">Registrasi</a>
							</li>
							<li class="nav-item">
								<?php if (!isset($_SESSION['login'])) : ?>
									<a class="nav-link" href="<?=base_url();?>login">Login</a>
									<?php else : ?>
										<a class="nav-link" href="<?=base_url();?>logout">Logout</a>
									<?php endif; ?>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>