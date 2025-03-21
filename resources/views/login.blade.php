<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>後端管理系統</title>

	<!-- ================= Favicon ================== -->
	<!-- Standard -->
	<link rel="shortcut icon" href="logo/fav.png">
	<!-- Retina iPad Touch Icon-->
	<link rel="apple-touch-icon" sizes="144x144" href="logo/fav.png">
	<!-- Retina iPhone Touch Icon-->
	<link rel="apple-touch-icon" sizes="114x114" href="logo/fav.png">
	<!-- Standard iPad Touch Icon-->
	<link rel="apple-touch-icon" sizes="72x72" href="logo/fav.png">
	<!-- Standard iPhone Touch Icon-->
	<link rel="apple-touch-icon" sizes="57x57" href="logo/fav.png">

	<!-- Styles -->
	<link href="assets/fontAwesome/css/fontawesome-all.min.css" rel="stylesheet">
	<link href="assets/css/lib/themify-icons.css" rel="stylesheet">
	<link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/lib/nixon.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-primary">

	<div class="Nixon-login">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3">
					<div class="login-content">
						<div class="login-logo">
							<h2><img id="" src="logo/logoSmall.png" style="width:50px;height:43px;" />後端管理系統</h2>
						</div>
						<div class="login-form">
							<h4>帳號登錄</h4>
							<form method="post" action="{{route('checkId')}}">
								@csrf
								<div class="form-group">
									<label>帳號</label>
									<input type="text" name="usrAccount" class="form-control" placeholder="帳號" value="{{old('usrAccount')}}">
								</div>
								<div class="form-group">
									<label>密碼</label>
									<input type="password" name="usrPassword" class="form-control" placeholder="密碼" value="{{old('usrPassword')}}">
								</div>
								<div>
									<label>
										@if($errors->any())
											{{$errors->first()}}
										@endif
									</label>
									<label class="pull-right">
										<a href="send-password.html">忘記密碼？</a>
									</label>

								</div>
								<button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">登入</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>