<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<head>
		<title>Poster | Welcome...</title>

		<!-- Meta -->
		<meta charset="utf-8">
		<script src="/js/angular-1.3.14.min.js"></script>
		<script src="/js/jquery-2.1.1.js"></script>
		<script src="/js/ajax.js"></script>

		<link href="/css/styles.css" rel="stylesheet">
		<link href="/css/font-awesome/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/headers/header1.css">
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/animate.css" rel="stylesheet">
		<!-- Datepicker -->
		<link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
		<!-- Toastr style -->
		<link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">		
	</head>

	<body >		
		<!--=== Top ===-->
		<div class="top">
			<div >
				<i class="fa fa-phone" style="margin-left: 50px"></i><font> 전 화 번 호 053 - 22 - 1567</font>
				<ul class="loginbar pull-right" style="margin-right: 30px">
					<li>
						<input id="user_id" class="btn btn-outline btn-default" type="text" placeholder="식 별 자 입 력" style="border: 1px solid; font-size: 12px;" >
					<li class="devider"></li>
					<input id="user_pw" class="btn btn-outline btn-default" type="password" placeholder="암 호 입 력" style="border: 1px solid;  font-size: 12px ">
					</li>

					<li>
						<input type="hidden" class="login_infor" />
						<a class="btn btn-outline btn-info add" style="width: 70px" >
							<font face="청봉" color="white">가  입</font>
						</a>
						<a class="btn btn-outline btn-warning" style="width: 70px" href="/dashboard/reg" >
							<font face="청봉" color="white">등  록</font>
						</a>
					</li>
				</ul>
			</div>
		</div><!--/top-->
		<!--=== End Top ===-->
		

		<!--=== Header ===-->
		<div class="header">
			<div class="navbar navbar-default" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<a class="navbar-brand" href="/home"> <img id="logo-header" src="assets/img/logo1-default.png" alt="Logo"> </a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-responsive-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li <?php echo isset($active) && $active == "first" ? "class='active'" : ""?>>
								<a href="/home" > 첫페지 <i class="fa fa-home"></i> </a>
							</li>
							<li <?php echo isset($active) && $active == "goods" ? "class='active'" : ""?>>
								<a href="/goods" > 제  품 <i class="fa fa-cubes"></i> </a>

							</li >
							<li <?php echo isset($active) && $active == "talk" ? "class='active'" : ""?>>
								<a href="/talk"> 토론마당 <i class="fa fa-angellist"></i> </a>

							</li>
							<li <?php echo isset($active) && $active == "notice" ? "class='active'" : ""?>>
								<a href="/notice" > 알림말 <i class="fa fa-bullhorn"></i> </a>

							</li>
							<li <?php echo isset($active) && $active == "intro" ? "class='active'" : ""?>>
								<a href="/intro" > 소 개 <i class="fa fa-male"></i> </a>
							</li>
							<li class="hidden-sm">
								<a class="search"><i class="icon-search search-btn"></i></a>
							</li>
						</ul>
						<div class="search-open">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search">
								<span class="input-group-btn">
									<button class="btn-u" type="button">
										Go
									</button> </span>
							</div><!-- /input-group -->
						</div>
					</div><!-- /navbar-collapse -->
				</div>
			</div>
		</div>

		@yield('content')		
		<!--/copyright-->
		<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
	</body>
</html>