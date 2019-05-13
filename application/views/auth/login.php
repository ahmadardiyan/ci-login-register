<div class="container">
	<div class="row">
		<div class="col-md-6 mt-4">
			
			<div class="card">
				<div class="card-header">
					Login
				</div>
				<div class="card-body">
					<form action=""  method="post">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" name="email" value="<?=set_value('email')?>">
							<small class="form-text text-danger" ><?= form_error('email'); ?></small>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password">
							<small class="form-text text-danger"><?= form_error('password'); ?></small>
						</div>

						<div class="form-group">
							<a href="<?php base_url();?>forgotPassword">Lupa password ?</a>
						</div>

						<button type="submit" name="login" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>