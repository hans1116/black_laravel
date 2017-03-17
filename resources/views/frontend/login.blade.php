<!DOCTYPE html>
<!-- saved from url=(0031)https://localhost/login/ -->
<html lang="en" class="height-100 html-login">
	<!--<![endif]-->
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta charset="utf-8">
		<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
		<meta name="author" content="Reservio, s.r.o. [reservio.com]">
		<meta name="keywords" content="">
		<meta name="description" content="Online booking and appointment scheduling software for free, which allows easy booking management and 24/7 online booking.">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=1">
		<title> Login - Reservio </title>

		<!-- Fonts -->
		<link href="./css/font.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="./css/homepage.min.css?v=13032017" media="screen, projection">
		<link rel="shortcut icon" href="favicon.ico">
		<!-- Google Analytics tracking code -->

		<script type="text/javascript" async="" src="./js/vvvxqg7a"></script>
		<script type="text/javascript" async="" src="./js/js"></script>
		<script async="" src="./js/analytics.js"></script>
		<script>
			(function(i, s, o, g, r, a, m) {
				i['GoogleAnalyticsObject'] = r;
				i[r] = i[r] ||
				function() {
					(i[r].q = i[r].q || []).push(arguments)
				}, i[r].l = 1 * new Date();
				a = s.createElement(o), m = s.getElementsByTagName(o)[0];
				a.async = 1;
				a.src = g;
				m.parentNode.insertBefore(a, m)
			})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

			ga('create', 'UA-31696359-1', 'reservio.com');
			ga('require', 'GTM-MMT2NTX');
			ga('send', 'pageview');
		</script>
		<script>
			/* Replace 'APP_ID' with your app ID */
			window.intercomSettings = {
				"app_id" : "vvvxqg7a",
				"language_override" : "en"
			};
			/* Replace 'APP_ID' with your app ID */
			(function() {
				var w = window;
				var ic = w.Intercom;
				if ( typeof ic === "function") {
					ic('reattach_activator');
					ic('update', intercomSettings);
				} else {
					var d = document;
					var i = function() {
						i.c(arguments)
					};
					i.q = [];
					i.c = function(args) {
						i.q.push(args)
					};
					w.Intercom = i;
					function l() {
						var s = d.createElement('script');
						s.type = 'text/javascript';
						s.async = true;
						s.src = 'https://widget.intercom.io/widget/vvvxqg7a';
						var x = d.getElementsByTagName('script')[0];
						x.parentNode.insertBefore(s, x);
					}

					if (w.attachEvent) {
						w.attachEvent('onload', l);
					} else {
						w.addEventListener('load', l, false);
					}
				}
			})()
		</script>

		<!-- Styles -->

	</head>
	<body class="body-main-gray height-100 page-homepage">
		<div class="body-main body-sign-content height-100">

			<div class="header header-signup">

				<div class="header-inner">
					<p class="header-logo">
						<a href="https://localhost/"> <img src="./img/reservio-logo.png" alt="Reservio" width="183" height="38"> </a>
					</p>

					<div class="header-text">
						<p class="header-text-item">
							<a href="./Login - Reservio_files/Login - Reservio.htm" class="btn btn-white btn-uppercase header-login">Login</a>
						</p>
						<div class="header-text-item menu-main">
							<button class="menu-main-btn">
								Menu
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="menu-main-wrapper" style="display: none;">
				<div class="menu-main-overlay js-fade"></div>
				<div class="menu-main-box">
					<a href="/login" class="menu-main-login">Login</a>
					<ul class="reset menu-main-box-list">

						<li class="menu-main-item">
							<a href="https://localhost/" class="menu-main-link">Home</a>
						</li>

						<li class="menu-main-item">
							<a href="https://localhost/pricing/" class="menu-main-link">Pricing</a>
						</li>

						<li class="menu-main-item">
							<a href="https://localhost/guides/" class="menu-main-link">Guides</a>
						</li>

						<li class="menu-main-item">
							<a href="https://localhost/faq/" class="menu-main-link">FAQ</a>
						</li>

						<li class="menu-main-item">
							<a href="https://localhost/plus/" class="menu-main-link">Reservio Plus</a>
						</li>

						<li class="menu-main-item">
							<a href="https://localhost/customer-care/" class="menu-main-link">Customer care</a>
						</li>

						<li class="menu-main-item">
							<a href="https://localhost/affiliate/" class="menu-main-link">Affiliate &amp; Partnerships</a>
						</li>

						<li class="menu-main-item">
							<a href="https://localhost/terms-and-conditions/" class="menu-main-link">Terms and Conditions</a>
						</li>

						<li class="menu-main-item">
							<a href="https://localhost/privacy-policy/" class="menu-main-link">Privacy Policy</a>
						</li>

					</ul>
					<button class="menu-main-close">
						Close
					</button>
				</div>
			</div>
			<div class="box-login">
				<div class="box-login-inner">
					<div class="box-login-content">
						<h1 class="box-login-title">Login to your account</h1>

						{!! Form::open(array('url' => '/login', 'name' => 'login_form', 'method' => 'post')) !!}

						<div class="form-group">
							{!! Form::label('EMAIL', '', array('class' => 'form-label', 'for' => 'email')) !!}
							{!! Form::text('email', '', array('class' => 'form-text',  'required' => '')) !!}
						</div>
						<div class="form-group">
							{!! Form::label('PASSWORD', '', array('class' => 'form-label', 'for' => 'password')) !!}
							{!! Form::password('password', array('class' => 'form-text','id'=>'password', 'required' => '')) !!}
						</div>
						<div class="form-group">
							{!! Form::submit("Login", ['class' => 'btn btn-all']) !!}
						</div>
						<div class="box-login-text-footer box-login-text-footer-links">
							<p class="l reset">
								<a href="https://localhost/forgot-password/">Forgotten password</a>
							</p>
							<p class="r reset">
								<a href="https://localhost/sign-up/">Sign up</a>
							</p>
						</div>
						{!! Form::close() !!}

					</div>
					<p class="footer-copyright text-center">
						Copyright 2012 - 2017 Reservio. All rights reserved.
					</p>
				</div>
			</div>

		</div>

		<script type="text/javascript" src="./js/portal.en.js"></script>
		<script src="./js/homepage.min.js"></script>

		<iframe id="intercom-frame" style="display: none;"></iframe>
		<div id="intercom-container" style="position: fixed; width: 0px; height: 0px; bottom: 0px; right: 0px; z-index: 2147483647;">
			<div data-reactroot="" class="intercom-app intercom-app-launcher-enabled">
				<span></span>
				<iframe allowfullscreen="" class="intercom-launcher-frame"></iframe>
				<span></span>
				<!-- react-empty: 5 -->
				<span></span>
			</div>
		</div>
	</body>
</html>

