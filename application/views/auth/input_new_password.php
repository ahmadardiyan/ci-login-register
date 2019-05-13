<div class="container">
	<div class="row">
		<div class="col-md-6 mt-4">
			
			<div class="card">
				<div class="card-header">
					Pebaruan Password
				</div>
				<div class="card-body">
					<form action=""  method="post">
						<div class="form-group">
							<label for="password">Password Baru</label>
							<input type="password" class="form-control" id="password" name="password">
							<small class="form-text text-danger" ><?= form_error('password'); ?></small>
						</div>
						<div class="form-group">
							<label for="confrimpassword">Konfirmasi Password</label>
							<input type="password" class="form-control" id="confrimpassword" name="confrimpassword">
							<small class="form-text text-danger" ><?= form_error('confrimpassword'); ?></small>
						</div>
						<button type="submit" name="newPassword" class="btn btn-primary">Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>