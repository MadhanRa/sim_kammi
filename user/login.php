<?php
session_destroy();
?>
<div class="logo">
	<a href="#"><em>Agenda</em> KAMMI</a>
</div>
<br><br><br><br><br>
<div class="sidebar-wrapper">
	<div class="login-panel panel panel-default">
		<div class="panel-heading">Login Kader</div>
		<div class="panel-body">
			<form class="form-signin" role="form" method="post" action="">
				<fieldset>
					<div class="form-group">
						<input class="form-control" placeholder="Username" name="username" type="text" autofocus required autocomplete="off" />
					</div>
					<div class="form-group">
						<input class="form-control" placeholder="Password" name="password" type="password" required autocomplete="off" />
					</div>
					<div class="row text-center">
						<div class="col-sm-6">
							<button name="reset" type="reset" class="btn btn-md btn-block"><i class="fa fa-refresh"></i> Clear</button>
						</div>
						<div class="col-sm-6">
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
			</form>
			<br><br><br>
			<br><br><br>
			<b class="small text-danger">Untuk Login Pengurus Admin <a href="administrator.php">Klik Disini</a></b>
		</div>
	</div>
</div>