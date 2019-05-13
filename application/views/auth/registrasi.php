<div class="container">
	<div class="row">
		<div class="col-md-6 mt-3">

			<div class="card">
				<div class="card-header">
					Registrasi
				</div>
				<div class="card-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" name="email" value="<?=set_value('email')?>">
							<small class="form-text text-danger"><?=form_error('email')?></small>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password">
							<small class ="form-text text-danger"><?=form_error('password')?></small>
						</div>
						<div class="form-group">
							<label for="confrimpassword">Konfirmasi Password</label>
							<input type="password" class="form-control" id="confrimpassword" name="confrimpassword">
							<small class ="form-text text-danger"><?=form_error('confrimpassword')?></small>
						</div>
						<div class="form-group form-check">
							<input type="checkbox" class="form-check-input" id="checkbox" name="checkbox">
							<label class="form-check-label" for="checkbox">Setuju dengan syarat dan aturan yang berlaku</label>
							<small class ="form-text text-danger"><?=form_error('checkbox')?></small>
						</div>

						<button type="submit" name="register" class="btn btn-primary">Submit</button>
					</form>

				</div>
			</div>

		</div>
	</div>
</div>