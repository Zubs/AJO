<div class="container">
	<div class="row my-5 justify-content-center">
		<div class="col-md-8 my-5">
			<div class="card o-hidden border-0 shadow-lg my-5" style="background: pink;">
				<div class="card-body p-0">
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<img src="images/profile.png" alt="Testing the logo" width="100%" height="100%">
						</div>
						<div class="col-lg-6">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
								</div>
								<form action="/login" method="POST">
									<div class="form-group">
										<input type="email" class="form-control bg-pink" placeholder="Enter Email Address..." name="email">
									</div>
									<div class="form-group">
										<input type="password" class="form-control bg-pink" placeholder="Password" name="password">
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit">Login</button>
									</div>
								</form>
								<hr>
								<div class="text-center">
									<a href="/forgot-password" class="small">Forgot Password?</a>
								</div>
								<div class="text-center">
									<a href="/register" class="small">Create An Account</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>