<div class="container">
	<div class="row my-4 justify-content-center">
		<div class="col-md-8 my-4">
			<div class="card o-hidden border-0 shadow-lg my-4" style="background: pink;">
				<div class="card-body p-0">
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<img src="images/profile.png" alt="Testing the logo" width="100%" height="100%">
						</div>
						<div class="col-lg-6">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Welcome</h1>
								</div>
								<form action="/login" method="POST">
									<div class="form-group">
										<input type="name" class="form-control bg-pink" placeholder="What name should we call you?" name="email">
									</div>
									<div class="form-group">
										<input type="email" class="form-control bg-pink" placeholder="Enter Your Email Address..." name="password">
									</div>
									<div class="form-group">
										<input type="password" class="form-control bg-pink" placeholder="Password" name="password">
									</div>
									<div class="form-group">
										<input type="password" class="form-control bg-pink" placeholder="Enter Password Again" name="cpassword">
									</div>
									<input type="checkbox" name="terms"> You've read and accept all the <a href="#">terms and conditions</a>.
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit">Register</button>
									</div>
								</form>
								<hr>
								<div class="text-center">
									<a href="/login" class="small">Have An Account?</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>