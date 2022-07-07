			<button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!--/.navbar-header-->
			<div id="main-nav" class="collapse navbar-collapse">
				<nav>
					<ul class="nav navbar-nav">
						<li><a href="#top">Home</a></li>
						<li><a href="#featured">Agenda</a></li>
						<li><a href="#contact">Kontak</a></li>
					</ul>
				</nav>
				<div class="login-panel panel panel-default">
					<div class="panel-heading">Login Kader</div>
					<div class="panel-body">
						<form role="form" method="post" action="proseslogin.php">
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="Username" name="username" type="text" autofocus required autocomplete="off" />
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" name="password" type="password" required autocomplete="off" />
								</div>
								<div class="row text-center">
									<div class="col-xs-6">
										<button name="reset" type="reset" class="btn btn-md btn-block"><i class="fa fa-refresh"></i> Clear</button>
									</div>
									<div class="col-xs-6">
										<button name="submit" type="submit" class="btn btn-md btn-block btn-success"><i class="fa fa-sign-in"></i> Login</button>
									</div>
								</div>
							</fieldset>
							<hr>
							<div class="text-center">
								<span class="small">
									Belum punya akun? Daftar <a href="register.php">disini.</a>
								</span>
							</div>
							<br>
							<div class="text-center">Untuk Login Pengurus Admin <a href="administrator.php">Klik Disini</a>
							</div>
						</form>
						<br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br><br><br>
					</div>
				</div>
			</div>